<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {     
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required',[
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
           $this->_login();
        }
    }

    private function _login()
    {
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $user = $this->db->get_where('tb_pengguna', ['email' => $email])->row_array();
       
       if ($user) {
           if ($user['status'] == '1') {
               if (password_verify($password, $user['pass'])) {
                    $data = [
                        'email' => $user['email'],
                        'npsn' => $user['npsn'],
                        'level' => $user['level'],
                    ];
                    $this->session->set_userdata( $data );
                    redirect('user');
                    
               } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password salah</div>');
                    redirect('login');
               }
               
           } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email belum diaktifkan!</div>');
            redirect('login');
           }
           
       } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
          redirect('login');
          
       }
       
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('npsn');
        $this->session->unset_userdata('level');
        redirect('login','refresh');
        
    }

    public function superuser()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required',[
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('loginsuperuser');
        } else {
           $this->_loginsuperuser();
        }
    }

    private function _loginsuperuser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_pengguna', ['email' => $email, 'level' => '1'])->row_array();
        
        if ($user) {
            if ($user['status'] == '1' && $user['level'] == '1') {
                if (password_verify($password, $user['pass'])) {
                     $data = [
                         'email' => $user['email'],
                         'level' => $user['level'],
                     ];
                     $this->session->set_userdata( $data );
                     redirect('superuser');
                     
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Login gagal!</div>');
                     redirect('login/superuser');
                }
                
            } else {
             $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Login gagal!</div>');
             redirect('login/superuser');
            }
            
        } else {
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki hak akses</div>');
           redirect('login/superuser');
           
        }
        
    }

}

/* End of file Login.php */
