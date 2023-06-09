<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        login_peserta();
    }

	public function index()
	{
		$data = [
			'judul' 	=>	'Hasil Pengumuman',
			'nav'		=>	'Hasil Pengumuman',
			'peserta'	=>	$this->Model_peserta->getPeserta($this->session->userdata('email')),
			'tahun_min' =>  $this->Model_peserta->tahun_min(),
			'tahun_max'	=>  $this->Model_peserta->tahun_max()
		];
		$this->load->view('peserta/templates/header', $data);
		$this->load->view('peserta/laporan/laporan', $data);
		$this->load->view('peserta/templates/footer');
	}

	public function cetak(){
		$data = [
			'judul' 	=>	'Cetak Hasil Pengumuman',
			'peserta'	=>	$this->Model_peserta->getPeserta($this->session->userdata('email')),
		];
		$this->load->view('peserta/laporan/cetak', $data);
	}
}