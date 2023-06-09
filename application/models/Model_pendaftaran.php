<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pendaftaran extends CI_Model
{
	//Ambil satu data kriteria
	public function ambilTahun(){
		return $this->db->order_by('id_pendaftaran',"desc")->limit(1)->get('tbl_pendaftaran')->row();
	}

	public function perbaharui(){
		$data = [
			"tanggal_mulai_pendaftaran"		=> $this->input->post('tanggal_mulai', true),
			"tanggal_selesai_pendaftaran" 	=> $this->input->post('tanggal_selesai', true),
			"tahun_pendaftaran"			 	=> $this->input->post('tahun_pendaftaran', true)
		];

		$this->db->where('id_pendaftaran', $this->input->post('id', true));
		$this->db->update('tbl_pendaftaran', $data);
	}
}