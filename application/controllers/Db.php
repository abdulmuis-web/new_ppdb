<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Controller {

    public function index()
    {
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
        $table = 'tb_30300703';
        $this->dbforge->create_table($table,true);
    }

}

/* End of file Db.php */
