<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        if (! $this->session->userdata('npsn')) {
            redirect('login');
        } else {
            $user = $this->m_data->user_login();
            /* data jumlah pendaftar */
            $tb = 'tb_'.$this->session->userdata('npsn');
            $data = $this->db->get($tb)->num_rows();
            /* data jumlah kuota */
            $kuota = $this->db->get('tb_sekolah', ['npsn' => $this->session->userdata('npsn')])->result_array();
            /* jadwal pendaftaran */
            $this->db->select('*');
            $this->db->from('tb_jadwal');
            $this->db->like('kegiatan', 'tutup');
            $jadwal = $this->db->get()->result_array();
            
            $this->load->view('user/meta');
            $this->load->view('user/header',['user' => $user, 'data' => $data, 'kuota' => $kuota , 'jadwal' => $jadwal]);
            $this->load->view('user/sidebar');
            $this->load->view('user/content');
            $this->load->view('user/footer');
            $this->load->view('user/script');
            
        }
    }

    public function daftar()
    {
        if (! $this->session->userdata('npsn')) {
            redirect('login');
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nisn', 'NISN', 'trim|required|max_length[10]',[
                'required' => 'NISN tidak boleh kosong',
                'max_length' => 'NISN tidak boleh lebih dari 10 karekter'
                ]);
            
            
            if ($this->form_validation->run() == FALSE) {
                $user = $this->m_data->user_login();
                $this->load->view('user/meta');
                $this->load->view('user/header',['user' => $user]);
                $this->load->view('user/sidebar');
                $this->load->view('user/daftar');
                $this->load->view('user/footer');
                $this->load->view('user/script');
            } else {
                $nisn = $this->input->post('nisn');
                $siswa = $this->db->get_where('tb_datasiswa', ['nisn' => $nisn])->row_array();
                
                if ($siswa) {
                    $user = $this->m_data->user_login();
                    $sekolah = $this->m_data->sekolah();
                    
                    $this->load->view('user/meta');
                    $this->load->view('user/header',['user' => $user]);
                    $this->load->view('user/sidebar');
                    $this->load->view('user/hasil_cari',['siswa' => $siswa, 'skl' => $sekolah, 'skl1' => $sekolah]);
                    $this->load->view('user/footer');
                    $this->load->view('user/script');
                } else {
                    $user = $this->m_data->user_login();
                    $this->load->view('user/meta');
                    $this->load->view('user/header',['user' => $user]);
                    $this->load->view('user/sidebar');
                    $this->load->view('user/hasil_kosong', ['nisn' => $nisn]);
                    $this->load->view('user/footer');
                    $this->load->view('user/script');
                }
            }
        }
    }

    public function prosesdaftar()
    {
        if ($this->input->post('npsn1') == $this->input->post('npsn2')) {
            $this->session->set_flashdata('pesan', 'Input data tidak berhasil. Pilihan sekolah pertama dan kedua tidak boleh sama');
            redirect('user/daftar','refresh');
        } else {
            $data1 = [
                'nisn' => $this->input->post('nisn'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'alamat' => $this->input->post('alamat'),
                'jarak' => $this->input->post('jarak1'),
                'pilihan_ke' => '1',
                'sekolah_asal' => $this->input->post('sekolah_asal')
            ];
            $data2 = [
                'nisn' => $this->input->post('nisn'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'alamat' => $this->input->post('alamat'),
                'jarak' => $this->input->post('jarak2'),
                'pilihan_ke' => '2',
                'sekolah_asal' => $this->input->post('sekolah_asal'),
            ];
            $table1 = 'tb_'.$this->input->post('npsn1');
            $table2 = 'tb_'.$this->input->post('npsn2');

            if ($this->input->post('npsn2')) {
                // jika ada pilihan ke 2
              
                $input1 = $this->db->insert($table1, $data1);
                $input2 = $this->db->insert($table2, $data2);
                $ubahstatus = [
                    'status' => '1'
                ];
                $this->db->where('nisn', $this->input->post('nisn'));
                $ubah = $this->db->update('tb_datasiswa', $ubahstatus);

                if ($input1 && $input2 && $ubah) {
                    $this->session->set_flashdata('pesan', 'Pendaftaran berhasil');
                    redirect('user/daftar');
                } else {
                    $this->session->set_flashdata('pesan', 'Pendaftaran tidak berhasil');
                    redirect('user/daftar');
                }
                
            } else {
                $input1 = $this->db->insert($table1, $data1);
                $ubahstatus = [
                    'status' => '1'
                ];
                $this->db->where('nisn', $this->input->post('nisn'));
                $ubah = $this->db->update('tb_datasiswa', $ubahstatus);

                if ($input1 && $ubah) {
                    $this->session->set_flashdata('pesan', 'Pendaftaran atas nama '.$this->input->post('nama_siswa').' berhasil');
                    redirect('user/daftar');
                } else {
                    $this->session->set_flashdata('pesan', 'Pendaftaran tidak berhasil');
                    redirect('user/daftar');
                }
            }
        }    
    }

    public function pendaftar()
    {
        if (! $this->session->userdata('npsn')) {
            redirect('login');
        } else {
            $user = $this->m_data->user_login();
            $tb = "tb_".$this->session->userdata('npsn');
            $pendaftar = $this->db->get($tb)->result_array();
            $this->load->view('user/meta');
            $this->load->view('user/header',['user' => $user]);
            $this->load->view('user/sidebar');
            $this->load->view('user/pendaftar',['pendaftar' => $pendaftar]);
            $this->load->view('user/footer');
            $this->load->view('user/script');
        }
    }

    public function prosesubah()
    {
        $alamat = $this->input->post('alamat');
        $jarak = $this->input->post('jarak');
        $no = $this->input->post('no');
        
        $data = array (
            'alamat'    => htmlspecialchars($alamat),
            'jarak'    => htmlspecialchars($jarak),
        );

        $ubah = $this->m_data->ubahdatasiswa($no,$data);
        if ($ubah) {
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            
            redirect('user/pendaftar','refresh');
            
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal diubah');
            
            redirect('user/pendaftar','refresh');
        }
        
    }

    public function proseshapuspendaftar($no)
    {
        $no = $no;
        $hapus = $this->m_data->hapuspendaftar($no);
        if ($hapus) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            
            redirect('user/pendaftar','refresh');
            
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal dihapus');
            
            redirect('user/pendaftar','refresh');
        }
    }


}

/* End of file User.php */
