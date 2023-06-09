<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('status_login') == "Ya") {
			$email = $this->session->userdata('email');
			redirect('admin/dashboard');
		}
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$data = [
				'judul' => 'Halaman Login Administrator'
			];
			$this->load->view('admin/auth/login', $data);
		}else{
			$email		= $this->input->post('email');
			$password 	= $this->input->post('password');

			$user = $this->db->get_where('tbl_admin', ['email' => $email])->row_array();
			//cek data user ada atau tidak
			if($user){

				//cek level
				if($user['level'] === "administrator"){
					//cek password
					if(password_verify($password, $user['password'])){
						$data = [
							'email' 		=> $user['email'],
							'level' 		=> $user['level'],
							'status_login' 	=> 'Ya'
						];
						$this->session->set_userdata($data);
						redirect('admin/dashboard');
					}else{
						//password salah
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
						redirect('admin/');	
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda tidak memiliki akses!</div>');
					redirect('admin');	
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email yang anda masukan tidak terdaftar!</div>');
				redirect('admin');
			}
		}
		
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status_login');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah berhasil logout!</div>');
				redirect('admin');
	}
}