<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datadiri extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        login_peserta();
    }

	public function index(){
		$data = [
			'judul' 		=>	'Data Diri',
			'nav'			=>	'Data Diri',
			'peserta'		=>	$this->Model_peserta->getPeserta($this->session->userdata('email'))
		];

		$this->load->view('peserta/templates/header', $data);
		$this->load->view('peserta/profil/tampil', $data);
		$this->load->view('peserta/templates/footer');
	}

	public function perbaharuidata(){

		$data = [
			'judul' 		=>	'Perbaharui Data Diri',
			'nav'			=>	'Perbaharui Data Diri',
			'peserta'		=>	$this->Model_peserta->getPeserta($this->session->userdata('email')),
			'agama'			=>	$this->Model_kriteria->getAgama()
		];

		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required', ['required' => 'nama ayah/ wali tidak boleh kosong!']);
		$this->form_validation->set_rules('status_ayah', 'Status Ayah', 'trim|required', ['required' => 'silahkan pilih status ayah!']);
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required', ['required' => 'nama ibu tidak boleh kosong!']);
		$this->form_validation->set_rules('status_ibu', 'Status Ibu', 'trim|required', ['required' => 'silahkan pilih status ibu!']);
		$this->form_validation->set_rules('jumlah_tanggungan', 'jumlah tanggungan', 'trim|required', ['required' => 'silahkan pilih jumlah tanggungan!']);

		$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim|required', ['required' => 'silahkan pilih pekerjaan ayah!']);
		$this->form_validation->set_rules('penghasilan_ayah', 'penghasilan ayah', 'trim|required', ['required' => 'silahkan pilih penghasilan ayah!']);
		$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim|required', ['required' => 'silahkan pilih pekerjaan ibu!']);
		$this->form_validation->set_rules('penghasilan_ibu', 'pengasilan ibu', 'trim|required', ['required' => 'silahkan pilih penghasilan ibu!']);
		
		$this->form_validation->set_rules('kepemilikan_rumah', 'kepemilikan rumah', 'trim|required', ['required' => 'silahkan pilih kepemilikan rumah!']);
		$this->form_validation->set_rules('sumber_listrik', 'sumber listrik', 'trim|required', ['required' => 'silahkan pilih sumber listrik!']);
		$this->form_validation->set_rules('sumber_air', 'sumber air', 'trim|required', ['required' => 'silahkan pilih sumber air!']);
		$this->form_validation->set_rules('luas_tanah', 'luas tanah', 'trim|required', ['required' => 'silahkan pilih luas tanah!']);
		$this->form_validation->set_rules('luas_bangunan', 'luas bangunan', 'trim|required', ['required' => 'silahkan pilih luas bangunan!']);

		if($this->form_validation->run() == false){
			$this->load->view('peserta/templates/header', $data);
			$this->load->view('peserta/profil/ubah', $data);
			$this->load->view('peserta/templates/footer');
		}else{
			$id = $this->input->post('id', true);
			$this->Model_peserta->ubah($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui.</div>');
			redirect('datadiri');
		}
	}
}