<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        login_peserta();
    }

	public function index()
	{
		$data = [
			'judul'   =>	'Halaman Dashboard',
			'nav'	  =>	'Halaman Dashboard',
			'peserta' =>	$this->Model_peserta->getPeserta($this->session->userdata('email'))
		];

		$this->load->view('peserta/templates/header', $data);
		$this->load->view('peserta/dashboard/dashboard', $data);
		$this->load->view('peserta/templates/footer');

	}

}