<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        login_admin();
    }

	public function index()
	{
		$data = [
			'judul' =>	'Dashboard Administrator',
			'nav'	=>	'Dashboard',
			'admin'	=>	$this->Model_admin->getAdmin($this->session->userdata('email'))
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/dashboard/dashboard', $data);
		$this->load->view('admin/templates/footer');

	}

}