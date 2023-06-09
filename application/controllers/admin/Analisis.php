<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {

	public function __construct(){
        parent::__construct();
        login_admin();
    }

	public function index(){
		$data = [
			'judul' 	=>	'Analisis Penerima Bantuan KIP Kuliah',
			'nav'		=>	'Analisis Penerima Bantuan KIP Kuliah',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'kriteria'	=>	$this->Model_kriteria->getAllKriteria(),
			'kategori'	=>	array('Pekerjaan Ayah', 'Penghasilan Ayah', 'Status Ayah', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Status Ibu', 'Jumlah Tanggungan', 'Kepemilikan Rumah', 'Sumber Listrik', 'Sumber Air', 'Luas Tanah', 'Luas Bangunan', 'Prestasi', 'Predikat Ujian', 'Minat Program Studi', 'Wawasan ICT'),
			'TotalData' =>  $this->Model_analisis->getDataTraining(),
			'dataTes'	=>  $this->Model_analisis->getDataTesting()
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/analisis/analisis', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tetapkan(){
		$id_peserta 	 = $this->input->post('id_peserta', true);
		$label 		 	 = $this->input->post('label', true);
		// $ujian 		 	 = $this->input->post('ujian', true);
		$jml_peserta	 = sizeof($id_peserta);

	    for ($i=0; $i < $jml_peserta ; $i++) { 
	        // $this->db->set('ujian', $ujian[$i]);
	    	$this->db->set('label', $label[$i]);
			$this->db->where('id_peserta', $id_peserta[$i]);
			$this->db->update('tbl_peserta');
	    }
	    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Peserta telah ditetapkan, silahkan dicek pada halaman laporan berikut ini!</div>');
		redirect('admin/laporan');
	}

	public function cetak(){
		$data = [
			'judul' 	=>	'Cetak Analisis Proses Seleksi',
			'nav'		=>	'Cetak Analisis Proses Seleksi',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'kriteria'	=>	$this->Model_kriteria->getAllKriteria(),
			'kategori'	=>	array('Pekerjaan Ayah', 'Penghasilan Ayah', 'Status Ayah', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Status Ibu', 'Jumlah Tanggungan', 'Kepemilikan Rumah', 'Sumber Listrik', 'Sumber Air', 'Luas Tanah', 'Luas Bangunan', 'Prestasi', 'Predikat Ujian', 'Minat Program Studi', 'Wawasan ICT'),
			'TotalData' =>  $this->Model_analisis->getDataTraining(),
			'dataTes'	=>  $this->Model_analisis->getDataTesting()
		];

		$this->load->view('admin/analisis/cetak', $data);
	}
}