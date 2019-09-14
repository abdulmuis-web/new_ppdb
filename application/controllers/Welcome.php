<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['provinsi'] = $this->m_data->dataprov();
		$data['informasi'] = $this->m_data->informasi();
		$this->load->view('front/meta');
		$this->load->view('front/header');
		$this->load->view('front/content', $data);
		$this->load->view('front/footer');
		$this->load->view('front/script');

	}

	public function petunjuk()
	{
		$this->load->view('front/meta');
		$this->load->view('front/header');
		$this->load->view('front/petunjuk');
		$this->load->view('front/footer');
		$this->load->view('front/script');

	}

	public function sekolah()
	{
		$data['sekolah'] = $this->m_data->sekolah();
		$this->load->view('front/meta');
		$this->load->view('front/header');
		$this->load->view('front/sekolah',$data);
		$this->load->view('front/footer');
		$this->load->view('front/script');

	}

	public function hasil()
	{
		$this->load->library('form_validation');
		$data['sekolah'] = $this->m_data->sekolah();
		
		$this->form_validation->set_rules('npsn', 'Nama Sekolah', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			
		$this->load->view('front/meta');
		$this->load->view('front/header');
		$this->load->view('front/hasil', $data);
		$this->load->view('front/footer');
		$this->load->view('front/script');
		} else {
			$npsn = $this->input->post('npsn');
			$data['cari'] = $this->m_data->hasil_cari($npsn);
			$data['nama_sekolah'] = $this->db->get_where('tb_sekolah', ['npsn' => $npsn])->result();						
			$this->load->view('front/meta');
			$this->load->view('front/header');
			$this->load->view('front/hasil_cari', $data);
			$this->load->view('front/footer');
			$this->load->view('front/script');
		}
		

		

	}
}
