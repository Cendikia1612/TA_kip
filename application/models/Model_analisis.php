<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_analisis extends CI_Model
{
	//Ambil jumlah data training
	public function getDataTraining(){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('label !=', "");
	    return $this->db->get()->result();
	}

	//Ambil data testing
	public function getDataTesting(){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('label', "");
	    return $this->db->get()->result();
	}


	//Ambil jumlah nilai layak dan tidak layak sesuai dengan kriteria tertentu
	public function getLabel($a){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('label', $a);
	    return $this->db->get()->result();
	}

	//Ambil total kriteria sesuai kategori
	public function getTotalKriteria($a){
		$this->db->select('*');
	    $this->db->from('tbl_kriteria');
	    $this->db->where('kategori', $a);
	    return $this->db->get()->result();
	}



	//Ambil jumlah nilai kriteria pekerjaan ayah dan label
	public function getPekerjaanAyah($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('pekerjaan_ayah', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria penghasilan ayah dan label
	public function getPenghasilanAyah($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('penghasilan_ayah', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria status ayah dan label
	public function getStatusAyah($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('status_ayah', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}


	//Ambil jumlah nilai kriteria pekerjaan ibu dan label
	public function getPekerjaanIbu($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('pekerjaan_ibu', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria penghasilan ibu dan label
	public function getPenghasilanIbu($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('penghasilan_ibu', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria status ibu dan label
	public function getStatusIbu($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('status_ibu', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria jumlah tanggungan dan label
	//Jumlah Tanggungan 0 - 5
	public function getJumlahTanggungan($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('jumlah_tanggungan', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}
	//Jumlah Tanggungan >= 6
	public function getJumlahTanggungan2($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('jumlah_tanggungan', $a);
	    $this->db->where('label', $b);
	    $this->db->where('jumlah_tanggungan', '6 Orang');
	    $this->db->where('jumlah_tanggungan', '7 Orang');
	    $this->db->where('jumlah_tanggungan', '8 Orang');
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria kepemilikan rumah dan label
	public function getKepemilikanRumah($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('kepemilikan_rumah', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria sumber listrik dan label
	public function getSumberlistrik($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('sumber_listrik', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria luas tanah dan label
	public function getLuasTanah($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('luas_tanah', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria luas bangunan dan label
	public function getLuasBangunan($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('luas_bangunan', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria sumber air dan label
	public function getSumberAir($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('sumber_air', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria prestasi dan label
	public function getPrestasi($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('tingkat_prestasi', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

		//Ambil jumlah nilai kriteria ujian baik dan label
		public function getPredikatUjian($a, $b){
			$this->db->select('*');
			$this->db->from('tbl_peserta');
			$this->db->where('predikat_ujian', $a);
			$this->db->where('label', $b);
			return $this->db->get()->result();
	}
	

	//Ambil jumlah nilai kriteria Minat Program Studi
	public function getMinatProgramStudi($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('minat_ps', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

	//Ambil jumlah nilai kriteria Wawasan ICT
	public function getWawasanICT($a, $b){
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('wawasan_ict', $a);
	    $this->db->where('label', $b);
	    return $this->db->get()->result();
	}

}