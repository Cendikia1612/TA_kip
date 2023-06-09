<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        login_admin();
    }

	public function index()
	{
		$data = [
			'judul' 	=>	'Laporan Penerima Bantuan KIP Kuliah',
			'nav'		=>	'Laporan Penerima Bantuan KIP Kuliah',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'tahun_min' =>  $this->Model_peserta->tahun_min(),
			'tahun_max'	=>  $this->Model_peserta->tahun_max()
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/laporan/laporan', $data);
		$this->load->view('admin/templates/footer');

		if (isset($_POST['cari'])) {
			$this->Model_laporan->getLaporan();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pendaftaran berhasil diperbaharui.</div>');
			redirect('admin/peserta');
		}
	}

	public function tampil(){

		if (isset($_POST['cari'])) {
			$tahun_awal  = $this->input->post('tahun_awal', true);
			$tahun_akhir = $this->input->post('tahun_akhir', true);
			$label 		 = $this->input->post('label', true);
		}	
		//$data['laporan'] 	= $this->Model_laporan->getLaporan($tahun_awal, $tahun_akhir, $status_kelayakan);

		$data = [
			'judul' 	=>	'Laporan Penerima Bantuan KIP Kuliah',
			'nav'		=>	'Laporan Penerima Bantuan KIP Kuliah',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'tahun_min' =>  $this->Model_peserta->tahun_min(),
			'tahun_max'	=>  $this->Model_peserta->tahun_max(),
			'laporan'	=>  $this->Model_laporan->getLaporan($tahun_awal, $tahun_akhir, $label),
			't_awal'	=>  $tahun_awal,
			't_akhir'	=>  $tahun_akhir,
			'label'		=>  $label
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/laporan/cari', $data);
		$this->load->view('admin/templates/footer');
	}

	public function cetak($a, $b, $c = ""){
		$label = str_replace("_", " ", $c);
		$data = [
			'judul' 	=>	'Cetak Laporan Penerima Bantuan KIP Kuliah',
			'nav'		=>	'Cetak Laporan Penerima Bantuan KIP Kuliah',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'laporan'	=>  $this->Model_laporan->getLaporan($a, $b, $label),
			't_awal'	=>  $a,
			't_akhir'	=>  $b,
			'label'		=>  $label
		];

		$this->load->view('admin/laporan/cetak', $data);
	}
}