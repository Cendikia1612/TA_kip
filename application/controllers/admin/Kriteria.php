<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct(){
        parent::__construct();
        login_admin();
    }

	public function index()
	{
		$data = [
			'judul' 	=>	'Kelola Kriteria',
			'nav'		=>	'Kelola Kriteria',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'kriteria'	=>	$this->Model_kriteria->getAllKriteria(),
			'kategori'	=>	array('Pekerjaan Ayah', 'Penghasilan Ayah', 'Status Ayah', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Status Ibu', 'Jumlah Tanggungan', 'Kepemilikan Rumah', 'Sumber Listrik', 'Sumber Air', 'Luas Tanah', 'Luas Bangunan', 'Prestasi', 'Predikat Ujian','Minat Program Studi', 'Wawasan ICT')
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kriteria/tampil', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$data = [
			'judul' 	=>	'Tambah Kriteria',
			'nav'		=>	'Tambah Kriteria',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'kategori'	=>	array('Pekerjaan Ayah', 'Penghasilan Ayah', 'Status Ayah', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Status Ibu', 'Jumlah Tanggungan', 'Kepemilikan Rumah', 'Sumber Listrik', 'Sumber Air', 'Luas Tanah', 'Luas Bangunan', 'Prestasi', 'Predikat Ujian', 'Minat Program Studi','Wawasan ICT')
			
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kriteria/tambah', $data);
		$this->load->view('admin/templates/footer');

		if (isset($_POST['simpan'])) {
			$this->Model_kriteria->tambah();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah.</div>');
			redirect('admin/kriteria');
		}
	}

	public function ubah($id)
	{
		$data = [
			'judul' 	=>	'Ubah Kriteria',
			'nav'		=>	'Ubah Kriteria',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'kategori'	=>	array('Pekerjaan Ayah', 'Penghasilan Ayah', 'Status Ayah', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Status Ibu', 'Jumlah Tanggungan', 'Kepemilikan Rumah', 'Sumber Listrik', 'Sumber Air', 'Luas Tanah', 'Luas Bangunan', 'Prestasi', 'Predikat Ujian' , 'Minat Program Studi','Wawasan ICT'),
			'kriteria'	=>	$this->Model_kriteria->getIdKriteria($id)

		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kriteria/ubah', $data);
		$this->load->view('admin/templates/footer');

		if (isset($_POST['simpan'])) {
			$this->Model_kriteria->ubah($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah.</div>');
			redirect('admin/kriteria');
		}
	}

	public function hapus($id)
	{		
		$this->Model_kriteria->hapus($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
		redirect('admin/kriteria');
	}

}