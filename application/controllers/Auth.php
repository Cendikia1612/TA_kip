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
		if ($this->session->userdata('status_login') == "loginPeserta") {
			$email = $this->session->userdata('email');
			redirect('dashboard');
		}

		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$data = [
				'judul' => 'Login Peserta'
			];
			$this->load->view('peserta/auth/login', $data);
		}else{
			$email		= $this->input->post('email');
			$password 	= $this->input->post('password');
			$user 		= $this->db->get_where('tbl_peserta', ['email' => $email])->row_array();
			//cek data user ada atau tidak
			if($user){
				//cek level
				if($user['level'] === "peserta"){
					//cek password
					if(password_verify($password, $user['password'])){
						$data = [
							'email' 		=> $user['email'],
							'level' 		=> $user['level'],
							'status_login' 	=> 'loginPeserta'
						];
						$this->session->set_userdata($data);
						redirect('dashboard');
					}else{
						//password salah
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
						redirect('login');	
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda tidak memiliki akses!</div>');
					redirect('login');	
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email yang anda masukan tidak terdaftar!</div>');
				redirect('login');
			}
		}
	}

	public function validasi_email(){
		$email = $_POST['email'] ? $_POST['email'] : '';
 		$cek   = $this->db->get_where('tbl_peserta', ['email' => $email])->row_array();
 		($cek) ? $hasil = '1' : $hasil = '0';
		echo $hasil;
	}

	public function daftar(){
		$data = [
			'judul' 		=> 'Daftar KIP Kuliah',
			'pendaftaran'	=>	$this->Model_pendaftaran->ambilTahun()
		];

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]');

		if($this->form_validation->run() == false){
			$this->load->view('peserta/auth/registrasi', $data);
		}else{
			$this->Model_peserta->tambahPendaftar();
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Pendaftaran berhasil!</h4>
					<h5>Selamat proses pendaftaran akun seleksi KIP Kuliah telah selesai, silahkan lengkapi berkas persyaratan pada menu <b>Kelola Berkas</b></h5>
				</div>');
			redirect('dashboard');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status_login');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah berhasil logout!</div>');
		redirect('login');
	}
}