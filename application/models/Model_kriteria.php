<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kriteria extends CI_Model
{
	//Ambil semua data kriteria
	public function getAllKriteria()
	{
		return $this->db->get('tbl_kriteria')->result();
	}

	//Ambil satu data kriteria
	public function getIdKriteria($id)
	{
		return $this->db->get_where('tbl_kriteria', ['id_kriteria' => $id])->row();
	}

	//Ambil satu kode kriteria
	public function getKodeKriteria($kode)
	{
		return $this->db->get_where('tbl_kriteria', ['kode_kriteria' => $kode])->row();
	}



	//Ambil kriteria berdasarkan kategori
	public function getKriteria($kategori)
	{
		return $this->db->get_where('tbl_kriteria', ['kategori' => $kategori])->result();
	}


	//Membuat array agama
	public function getAgama()
	{
		return $data = array('Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha');
	}


	
	public function tambah()
	{
		$kategori		= $this->input->post('kategori', true);
		$kode_kriteria	= $this->input->post('kode_kriteria', true);
		$nama_kriteria	= $this->input->post('nama_kriteria', true);

		$data['kriteria'] = $this->getKodeKriteria($kode_kriteria);

		if (empty($kategori) || empty($kode_kriteria) || empty($nama_kriteria)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Field tidak boleh kosong!</div>');
			redirect('admin/kriteria/tambah');
		}else if ($data['kriteria'] > 0) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kode kriteria yang anda masukan sudah terdaftar!</div>');
			redirect('admin/kriteria/tambah');
		}else{
			$data = [
				"kategori"		=> $kategori,
				"kode_kriteria" => $kode_kriteria,
				"nama_kriteria" => $nama_kriteria
			];
			$this->db->insert('tbl_kriteria', $data);
		}
	}

	public function ubah($id)
	{
		$kategori		= $this->input->post('kategori', true);
		$kode_kriteria	= $this->input->post('kode_kriteria', true);
		$nama_kriteria	= $this->input->post('nama_kriteria', true);

		$data['kriteria'] = $this->getKodeKriteria($kode_kriteria);

		if (empty($kategori) || empty($kode_kriteria) || empty($nama_kriteria)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Field tidak boleh kosong!</div>');
			redirect('admin/kriteria/ubah/'.$id);
		}else{
			$data = [
				"kategori"		=> $kategori,
				"kode_kriteria" => $kode_kriteria,
				"nama_kriteria" => $nama_kriteria
			];
			$this->db->where('id_kriteria', $id);
			$this->db->update('tbl_kriteria', $data);
		}
	}

	//Hapus data kriteria sesuai Id
	public function hapus($id)
	{
		$this->db->where('id_kriteria', $id);
		$this->db->delete('tbl_kriteria');
	}
}