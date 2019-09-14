<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {

    public function index()
    {
        $this->load->view('front/meta');
        $this->load->view('front/error_404');
        $this->load->view('front/script');
        
    }

}

/* End of file Error_404.php */
