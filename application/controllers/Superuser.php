<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller {

    public function index()
    {
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
            $this->db->select('*');
            $this->db->where('status', '1');
            $this->db->from('tb_datasiswa');
            $data['jml_siswadaftar'] = $this->db->get()->num_rows();
            $data['jml_siswa'] = $this->db->get('tb_datasiswa')->num_rows();
            $data['jml_user'] = $this->db->get('tb_pengguna')->num_rows();
            $data['jml_skl'] = $this->db->get('tb_sekolah')->num_rows();
            $user = $this->m_data->user_login();
            $this->load->view('superuser/meta');
            $this->load->view('superuser/header', ['user' => $user]);
            $this->load->view('superuser/sidebar');
            $this->load->view('superuser/content', $data);
            $this->load->view('superuser/footer');
            $this->load->view('superuser/script');
        }
    }

    public function daftarpengguna()
    {
        
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
            $data['sekolah'] = $this->db->get('tb_sekolah')->result();
            $data['pengguna'] = $this->db->get('tb_pengguna')->result();
            $user = $this->m_data->user_login();
            $this->load->view('superuser/meta');
            $this->load->view('superuser/header', ['user' => $user]);
            $this->load->view('superuser/sidebar');
            $this->load->view('superuser/daftarpengguna', $data);
            $this->load->view('superuser/footer');
            $this->load->view('superuser/script');
        }
    }

    public function ubahstatus($q)
    {
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
            
            $ubah = $this->m_data->ubahstatus($q);
            if ($ubah) {
                $this->session->set_flashdata('pesan_sukses', 'Ubah status pengguna berhasil');
                redirect('superuser/daftarpengguna','refresh');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Ubah status pengguna gagal');
                redirect('superuser/daftarpengguna','refresh');
            }
         }
    }

    public function ubahdatapengguna()
    {
        $no = $this->input->post('q');
        $nama_pengguna = $this->input->post('nama_pengguna');
        $email = $this->input->post('email');
        $npsn = $this->input->post('npsn');
        $nama_sekolah = $this->input->post('nama_sekolah');
        $level = $this->input->post('level');
        $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        
        $data = [
            'nama_pengguna' => $nama_pengguna,
            'email' => $email,
            'npsn' => $npsn,
            'nama_sekolah' => $nama_sekolah,
            'level' => $level,
            'pass' => $pass,
        ];

        $ubah = $this->m_data->ubahdatapengguna($no,$data);
        if ($ubah) {
            $this->session->set_flashdata('pesan_sukses', 'Data berhasil diubah');
            redirect('superuser/daftarpengguna','refresh');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal diubah');
            redirect('superuser/daftarpengguna','refresh');
        }
    }

    public function hapuspengguna($no)
    {
        $this->db->where('no', $no);
        $hapus = $this->db->delete('tb_pengguna');
        if ($hapus) {
            $this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus');
            redirect('superuser/daftarpengguna','refresh');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal dihapus');
            redirect('superuser/daftarpengguna','refresh');
        }
    }

    public function tambahdatapengguna()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_pengguna.email]');
        
        
        if ($this->form_validation->run() == FALSE) {
            echo "<script>alert('Data pengguna gagal ditambah. Email sudah terdaftar');document.location='daftarpengguna';</script>";
        } else {
            $nama_pengguna = $this->input->post('nama_pengguna');
            $email = $this->input->post('email');
            $level = $this->input->post('level');
            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $status = '0';
            if ($level == '1') {
                $npsn = '';
                $nama_sekolah = 'Dinas Pendidikan';
            } else {
                $npsn = $this->input->post('npsn');
                $query_sekolah = $this->db->get_where('tb_sekolah', ['npsn' => $npsn])->result();
                foreach ($query_sekolah as $kunci);
                $nama_sekolah = $kunci->nama_sekolah;
            }
            
            $data = [
                'nama_pengguna' => $nama_pengguna,
                'email' => $email,
                'pass' => $pass,
                'npsn' => $npsn,
                'nama_sekolah' => $nama_sekolah,
            ];
            
            $tambah = $this->m_data->tambahdatapengguna($data);
            if ($tambah) {
                $this->session->set_flashdata('pesan_sukses', 'Tambah data pengguna berhasil');
                
                redirect('superuser/daftarpengguna','refresh');
                
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Tambah data pengguna gagal');
                
                redirect('superuser/daftarpengguna','refresh');
            }
        }
        


    }

    public function daftarsekolah()
    {
        
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
            $data['sekolah'] = $this->db->get('tb_sekolah')->result();
            $data['pengguna'] = $this->db->get('tb_pengguna')->result();
            $user = $this->m_data->user_login();
            $this->load->view('superuser/meta');
            $this->load->view('superuser/header', ['user' => $user]);
            $this->load->view('superuser/sidebar');
            $this->load->view('superuser/daftarsekolah', $data);
            $this->load->view('superuser/footer');
            $this->load->view('superuser/script');
        }
    }

    public function tambahdatasekolah()
    {
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
            $npsn = $this->input->post('npsn');
            $cek = $this->db->get_where('tb_sekolah', ['npsn' => $npsn])->row_array();

            if ($cek) {
                echo "<script>alert('NPSN sudah terdaftar');document.location='daftarsekolah';</script>";
            } else {
                $data = [
                    'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
                    'npsn' => htmlspecialchars($this->input->post('npsn', true)),
                    'nama_sekolah' => htmlspecialchars($this->input->post('nama_sekolah', true)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                    'kuota' => htmlspecialchars($this->input->post('kuota', true)),
                    'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                ];
    
                $this->load->dbforge();
                $fields = array(
                    'no' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'auto_increment' => TRUE
                    ),
                    'nisn' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '10',
                    ),
                    'nama_siswa' => array(
                            'type' =>'VARCHAR',
                            'constraint' => '100',
                    ),
                    'sekolah_asal' => array(
                        'type' =>'VARCHAR',
                        'constraint' => '100',
                    ),
                    'alamat' => array(
                        'type' =>'TEXT',
                    ),
                    'pilihan_ke' => array(
                        'type' =>'VARCHAR',
                        'constraint' => '1',
                    ),
                    'jarak' => array(
                        'type' =>'VARCHAR',
                        'constraint' => '10',
                    ),
                    
                );
                $this->dbforge->add_key('no', TRUE);
                $this->dbforge->add_field($fields);
                $table = 'tb_'.$npsn;
                $this->dbforge->create_table($table,true);
    
                $tambah = $this->m_data->tambahdatasekolah($data);
                if ($tambah) {
                    $this->session->set_flashdata('pesan_sukses', 'Tambah data sekolah berhasil');
                    
                    redirect('superuser/daftarsekolah','refresh');
                    
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Tambah data sekolah gagal');
                    
                    redirect('superuser/daftarsekolah','refresh');
                }
            }              
        }
    }

    public function hapussekolah($no)
    {
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
        
        $query = $this->db->get_where('tb_sekolah', ['no' => $no])->result();
        foreach ($query as $key );
        $table = "tb_".$key->npsn;

        $this->load->dbforge();
        $hapus_db = $this->dbforge->drop_table($table, TRUE);

        $this->db->where('no', $no);
        $hapus_data = $this->db->delete('tb_sekolah');
        if ($hapus_db && $hapus_data) {
            $this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus');
            redirect('superuser/daftarsekolah','refresh');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal dihapus');
            redirect('superuser/daftarsekolah','refresh');
        }
    }
    }

    public function ubahdatasekolah()
    {
        $no = $this->input->post('q');
        
        $data = [
            'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
            'npsn' => htmlspecialchars($this->input->post('npsn', true)),
            'nama_sekolah' => htmlspecialchars($this->input->post('nama_sekolah', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'kuota' => htmlspecialchars($this->input->post('kuota', true)),
            'kontak' => htmlspecialchars($this->input->post('kontak', true)),
        ];

        $ubah = $this->m_data->ubahdatasekolah($no,$data);
        if ($ubah) {
            $this->session->set_flashdata('pesan_sukses', 'Data berhasil diubah');
            redirect('superuser/daftarsekolah','refresh');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal diubah');
            redirect('superuser/daftarsekolah','refresh');
        }
    }

    public function backupdb()
    {
        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/db/mybackup.zip', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.zip', $backup);
    }

    public function informasi()
    {
        if ( $this->session->userdata('level')!= '1' ) {
            
            redirect('','refresh');
            
        } else {
            $data = $this->db->get('tb_informasi')->result();
            $user = $this->m_data->user_login();
            $this->load->view('superuser/meta');
            $this->load->view('superuser/header', ['user' => $user]);
            $this->load->view('superuser/sidebar');
            $this->load->view('superuser/informasi', array('data' => $data));
            $this->load->view('superuser/footer');
            $this->load->view('superuser/script');
        }
    }

    public function simpaninformasi()
    {
        $tujuan = $this->input->post('tujuan');
        $dasar_hukum = $this->input->post('dasar_hukum');
        $sambutan_dinas = $this->input->post('sambutan_dinas');

        $data = array (
            'tujuan' => $tujuan,
            'dasar_hukum' => $dasar_hukum,
            'sambutan_dinas' => $sambutan_dinas,
        );

        $simpan = $this->m_data->simpaninformasi($data);
        if ($simpan) {
            $this->session->set_flashdata('pesan_sukses', 'Data berhasil disimpan');
            
            redirect('superuser/informasi','refresh');

        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan');
            
            redirect('superuser/informasi','refresh');
        }
    }
}

/* End of file Superuser.php */
