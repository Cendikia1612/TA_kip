<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        login_admin();
    }

	public function index()
	{
		$data = [
			'judul' =>	'Profil Administrator',
			'nav'	=>	'Profil',
			'admin'	=>	$this->Model_admin->getAdmin($this->session->userdata('email'))
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/profil/tampil', $data);
		$this->load->view('admin/templates/footer');
	}

	public function ubahdata()
	{
		$data = [
			'judul' =>	'Ubah Profil Administrator',
			'nav'	=>	'Ubah Profil',
			'admin'	=>	$this->Model_admin->getAdmin($this->session->userdata('email'))
		];

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/profil/ubah', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$this->Model_admin->ubahData();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data telah berhasil diperbaharui!</div>');
			redirect('admin/profil');
		}
	}

	public function ubahpassword()
	{
		$data = [
			'judul' =>	'Ubah Password Administrator',
			'nav'	=>	'Ubah Password',
			'admin'	=>	$this->Model_admin->getAdmin($this->session->userdata('email'))
		];
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/profil/ubahpassword', $data);
		$this->load->view('admin/templates/footer');

		if (isset($_POST['simpan'])) {
			$this->Model_admin->ubahPassword();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diperbaharui!</div>');
			redirect('admin/profil');
		}

	}
}