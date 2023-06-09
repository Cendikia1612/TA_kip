<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_laporan extends CI_Model
{
	//Ambil jumlah data training
	public function getLaporan($a, $b, $c){
		$d = $b + 1;
		$this->db->select('*');
	    $this->db->from('tbl_peserta');
	    $this->db->where('tahun_pendaftaran >=', $a);
	    $this->db->where('tahun_pendaftaran <', $d);
	    if ($c == '') {
	    	$this->db->where('label !=', $c);	
	    }else{
	    	$this->db->where('label =', $c);
	    }
	    return $this->db->get()->result();
	}

}