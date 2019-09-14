<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    public function dataprov()
    {
        return $this->db->get('tb_provinsi')->result_array();
    }

    public function informasi()
    {
        return $this->db->get('tb_informasi')->result_array();
    }

    public function sekolah()
    {
        return $this->db->get('tb_sekolah')->result_array();
    }

    public function hasil_cari($npsn)
    {
        $table = "tb_".$npsn;
        $querylimit = $this->db->get_where('tb_sekolah', ['npsn' => $npsn])->row_array();
        $limit = $querylimit['kuota'];
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }

    public function user_login()
    {
        $this->db->select('*');
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->where('level', $this->session->userdata('level'));
        $this->db->from('tb_pengguna');
        return $this->db->get()->row_array();
        
    }

    public function prosesdaftar($data)
    {
        return $this->db->insert('tb_sementara', $data);
    }

    public function ubahstatus($q)
    {
        $status = $this->db->get_where('tb_pengguna', ['no' => $q])->result();
        foreach ($status as $status);
        if ($status->status == '1') {
            $object = [
                'status' => '0',
            ];
            $this->db->where('no', $q);
            $sukses = $this->db->update('tb_pengguna', $object);
            
        } else {
            $object = [
                'status' => '1',
            ];
            $this->db->where('no', $q);
            $sukses = $this->db->update('tb_pengguna', $object);
        }
        if ($sukses) {
           return 1;
        } else {
            return FALSE;
        }
    }

    public function ubahdatapengguna($no,$data)
    {
        $this->db->where('no', $no);
        $ubah = $this->db->update('tb_pengguna', $data);
        if ($ubah) {
            return 1;
         } else {
             return FALSE;
         }
    }

    public function tambahdatapengguna($data)
    {
        $tambah = $this->db->insert('tb_pengguna', $data);
        if ($tambah) {
            return 1;
        } else {
            return FALSE;
        }
    }

    public function tambahdatasekolah($data)
    {
        $tambah = $this->db->insert('tb_sekolah', $data);
        if ($tambah) {
            return 1;
        } else {
            return FALSE;
        }
    }

    public function ubahdatasekolah($no,$data)
    {
        $this->db->where('no', $no);        
        $ubah = $this->db->update('tb_sekolah', $data);
        if ($ubah) {
            return 1;
        } else {
            return FALSE;
        }
    }

    public function ubahdatasiswa($no,$data)
    {   
        $table = "tb_".$this->session->userdata('npsn');
        $this->db->where('no', $no);
        $ubah = $this->db->update($table, $data);
        if ($ubah) {
            return 1;
        } else {
            return FALSE;
        }
    }

    public function hapuspendaftar($no)
    {
        $table = "tb_".$this->session->userdata('npsn');
        $this->db->where('no', $no);
        $hapus = $this->db->delete($table);
        if ($hapus) {
            return 1;
        } else {
            return FALSE;
        }
    }

    public function simpaninformasi($data)
    {
        $simpan = $this->db->update('tb_informasi', $data);
        if ($simpan) {
            return 1;
        } else {
            return FALSE;
        }
        
    }
}

/* End of file M_data.php */

