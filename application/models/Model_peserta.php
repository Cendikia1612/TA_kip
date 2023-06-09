<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_peserta extends CI_Model{
	public function cekkodependaftaran(){
		$tahun = $this->Model_pendaftaran->ambilTahun();
        $this->db->select('RIGHT(tbl_peserta.kode_pendaftaran,4) as kode', FALSE);
		$this->db->order_by('kode_pendaftaran','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tbl_peserta');
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}
		else {      
			//jika kode belum ada      
			$kode = 1;    
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kode_pendaftaran = "KIP".$tahun->tahun_pendaftaran.$kodemax;
        return $kode_pendaftaran;
    }

	//Ambil data peserta
	public function getPeserta($email){
		return $this->db->get_where('tbl_peserta', ['email' => $email])->row();
	}

	//Ambil data peserta
	public function getIdPeserta($id){
		return $this->db->get_where('tbl_peserta', ['id_peserta' => $id])->row();
	}

	public function getAllPeserta(){
		return $this->db->get('tbl_peserta')->result();
	}

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

	public function getNomorPendaftaran($no){
		return $this->db->get_where('tbl_peserta', ['nomor_pendaftaran' => $no])->row();
	}

	public function getPesertaTahun($tahun){
		return $this->db->get_where('tbl_peserta', ['tahun_pendaftaran' => $tahun])->result();
	}

	public function tahun_min(){
		$this->db->select_min('tahun_pendaftaran');
		$query = $this->db->get('tbl_peserta')->row();
		return $query;
	}

	public function tahun_max(){
		$this->db->select_max('tahun_pendaftaran');
		$query = $this->db->get('tbl_peserta')->row();
		return $query;
	}

	public function trash(){
		return $this->db->empty_table('tbl_peserta');
	}

	public function tambahPendaftar(){
		$kode_pendaftaran = $this->cekkodependaftaran();
        $tahun = $this->Model_pendaftaran->ambilTahun();
		$data  = [
			'kode_pendaftaran'  => $kode_pendaftaran,
			'nama_lengkap'      => $this->input->post('nama_lengkap', true),
			'email' 	        => $this->input->post('email', true),
			'password'          => password_hash($this->input->post('password2', true), PASSWORD_DEFAULT),
			'poto'				=> 'default.png',
			"gambar_sktm"		=> 'default.png',
			"poto_keluarga"		=> 'default.png',
			"poto_rumah_tampak_depan"	=> 'default.png',
			"poto_ruang_keluarga"		=> 'default.png',
			"bukti_prestasi"		=> 'default.png',
			'tahun_pendaftaran' => $tahun->tahun_pendaftaran,
			'level'				=> 'peserta',
        	'status_peserta'	=> 'aktif'
		];
		$this->db->insert('tbl_peserta', $data);
		$session = [
			'email' 		=> $this->input->post('email', true),
			'level' 		=> 'peserta',
			'status_login' 	=> 'loginPeserta'
		];
		$this->session->set_userdata($session);
	}


	public function tambah()
	{
		$nama_lengkap = str_replace(" ", "-", strtolower($this->input->post('nama_lengkap', true)));

		//upload poto peserta
		$upload_poto = $_FILES['poto']['name'];
		if($upload_poto){
	    	$nama_file_poto = "img-".time()."-".$nama_lengkap.".".pathinfo($upload_poto, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/user/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $nama_file_poto;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto')) {
	            $poto = $this->upload->data('file_name');
	        } else {
	            $this->session->set_flashdata('pesan', 
	            '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
	            redirect('admin/peserta/tambah');
	        }
	    }else{
	    	$poto = "default.png";
	    }

	    //upload poto keluarga
	    $upload_poto_keluarga = $_FILES['poto_keluarga']['name'];
		if($upload_poto_keluarga){
	    	$nama_file_poto_keluarga = "img-".time()."-".$nama_lengkap."-keluarga.".pathinfo($upload_poto_keluarga, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/poto_keluarga/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $nama_file_poto_keluarga;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto_keluarga')) {
	            $poto_keluarga = $this->upload->data('file_name');
	        } else {
	            $this->session->set_flashdata('pesan', 
	            '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
	            redirect('admin/peserta/tambah');
	        }
	    }else{
	    	$poto_keluarga = "default.png";
	    }

	    //upload poto rumah tampak depan
	    $upload_poto_rumah = $_FILES['poto_rumah_tampak_depan']['name'];
		if($upload_poto_keluarga){
	    	$upload_poto_rumah = "img-".time()."-".$nama_lengkap."-rumah-tampak-depan.".pathinfo($upload_poto_rumah, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/rumah/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $upload_poto_rumah;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto_rumah_tampak_depan')) {
	            $poto_rumah_tampak_depan = $this->upload->data('file_name');
	        } else {
	            $this->session->set_flashdata('pesan', 
	            '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
	            redirect('admin/peserta/tambah');
	        }
	    }else{
	    	$poto_rumah_tampak_depan = "default.png";
	    }

	    //upload poto ruang keluarga
	    $upload_ruang_keluarga = $_FILES['poto_ruang_keluarga']['name'];
		if($upload_poto_keluarga){
	    	$upload_ruang_keluarga = "img-".time()."-".$nama_lengkap."-ruang-keluarga.".pathinfo($upload_ruang_keluarga, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/rumah/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $upload_ruang_keluarga;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto_ruang_keluarga')) {
	            $poto_ruang_keluarga = $this->upload->data('file_name');
	        } else {
	            $this->session->set_flashdata('pesan', 
	            '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
	            redirect('admin/peserta/tambah');
	        }
	    }else{
	    	$poto_ruang_keluarga = "default.png";
	    }

		//upload prestasi
		$upload_prestasi_siswa = $_FILES['bukti_prestasi']['name'];
		if($upload_prestasi_siswa){
	    	$hasil_prestasi_siswa = "img-".time()."-".$nama_lengkap.".".pathinfo($upload_prestasi_siswa, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/bukti/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $hasil_prestasi_siswa;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('bukti_prestasi')) {
	            $bukti_prestasi = $this->upload->data('file_name');
	        } else {
	            $this->session->set_flashdata('pesan', 
	            '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
	            redirect('admin/peserta/tambah');
	        }
	    }else{
	    	$bukti_prestasi = "default.png";
	    }

	    $data = [
			"nisn"			=> $this->input->post('nisn', true),
			"nama_lengkap"	=> $this->input->post('nama_lengkap', true),
			"nomor_nik"		=> $this->input->post('nomor_nik', true),
			"nomor_kip"		=> $this->input->post('nomor_kip', true),
			"nomor_kks"		=> $this->input->post('nomor_kks', true),
			"sekolah_asal"	=> $this->input->post('sekolah_asal', true),
			"alamat_sekolah"=> $this->input->post('alamat_sekolah', true),
			"tahun_lulus"	=> $this->input->post('tahun_lulus', true),
			"tempat_lahir"	=> $this->input->post('tempat_lahir', true),
			"tanggal_lahir"	=> $this->input->post('tanggal_lahir', true),
			"agama"			=> $this->input->post('agama', true),
			"alamat_peserta"=> $this->input->post('alamat_peserta', true),
			"provinsi"		=> $this->input->post('provinsi', true),
			"kabupaten"		=> $this->input->post('kabupaten', true),
			"kode_pos"		=> $this->input->post('kode_pos', true),
			"email"			=> $this->input->post('email', true),
			"password"		=> password_hash($this->input->post('email', true), PASSWORD_DEFAULT),
			"nomor_hp"		=> $this->input->post('nomor_hp', true),
			"poto"			=> $poto,
			"poto_keluarga"	=> $poto_keluarga,
			"poto_rumah_tampak_depan"	=> $poto_rumah_tampak_depan,
			"poto_ruang_keluarga"		=> $poto_ruang_keluarga,
			"bukti_prestasi"		=> $bukti_prestasi
		];
		$this->db->insert('tbl_peserta', $data);
	}





	public function ubah($id){
		$peserta = $this->getIdPeserta($id);
		$nama_lengkap = str_replace(" ", "-", strtolower($this->input->post('nama_lengkap', true)));

		//upload poto peserta
		$upload_poto = $_FILES['poto']['name'];
		if($upload_poto){
	    	$nama_file_poto = "img-".time()."-".$nama_lengkap.".".pathinfo($upload_poto, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/user/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $nama_file_poto;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto')) {
	        	$poto_lama = $peserta->poto;
                if ($poto_lama != "default.png") {
                    if (!empty($poto_lama)) {
                        unlink(FCPATH.'assets/images/user/'.$poto_lama);
                    }
                }
                $this->db->set('poto', $this->upload->data('file_name'));
            }
	    }

	    //upload poto keluarga
	    $upload_poto_keluarga = $_FILES['poto_keluarga']['name'];
		if($upload_poto_keluarga){
	    	$nama_file_poto_keluarga = "img-".time()."-".$nama_lengkap."-keluarga.".pathinfo($upload_poto_keluarga, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/poto_keluarga/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $nama_file_poto_keluarga;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto_keluarga')) {
	            $poto_keluarga_lama = $peserta->poto_keluarga;
                if ($poto_keluarga_lama != "default.png") {
                    if (!empty($poto_keluarga_lama)) {
                        unlink(FCPATH.'assets/images/poto_keluarga/'.$poto_keluarga_lama);
                    }
                }
                $this->db->set('poto_keluarga', $this->upload->data('file_name'));
            }
	    }

	    //upload gambar sktm
	    $upload_sktm = $_FILES['gambar_sktm']['name'];
		if($upload_sktm){
	    	$sktm = "img-".time()."-".$nama_lengkap."-sktm.".pathinfo($upload_sktm, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/sktm/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $sktm;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('gambar_sktm')) {
	            $gambar_sktm_lama = $peserta->gambar_sktm;
                if ($gambar_sktm_lama != "default.png") {
                    if (!empty($gambar_sktm_lama)) {
                        unlink(FCPATH.'assets/images/sktm/'.$gambar_sktm_lama);
                    }
                }
                $this->db->set('gambar_sktm', $this->upload->data('file_name'));
            }
	    }

	    //upload poto rumah tampak depan
	    $upload_poto_rumah = $_FILES['poto_rumah_tampak_depan']['name'];

	    
		if($upload_poto_rumah){
	    	$poto_rumah = "img-".time()."-".$nama_lengkap."-rumah-tampak-depan.".pathinfo($upload_poto_rumah, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/rumah/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $poto_rumah;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto_rumah_tampak_depan')) {
	            $poto_rumah_tampak_depan_lama = $peserta->poto_rumah_tampak_depan;
                if ($poto_rumah_tampak_depan_lama != "default.png") {
                    if (!empty($poto_rumah_tampak_depan_lama)) {
                        unlink(FCPATH.'assets/images/rumah/'.$poto_rumah_tampak_depan_lama);
                    }
                }
                $this->db->set('poto_rumah_tampak_depan', $this->upload->data('file_name'));
            }
	    }

	    //upload poto ruang keluarga
	    $upload_ruang_keluarga = $_FILES['poto_ruang_keluarga']['name'];
		if($upload_ruang_keluarga){
	    	$ruang_keluarga = "img-".time()."-".$nama_lengkap."-ruang-keluarga.".pathinfo($upload_ruang_keluarga, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/rumah/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $ruang_keluarga;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('poto_ruang_keluarga')) {
	            $poto_ruang_keluarga_lama = $peserta->poto_ruang_keluarga;
                if ($poto_ruang_keluarga_lama != "default.png") {
                    if (!empty($poto_ruang_keluarga_lama)) {
                        unlink(FCPATH.'assets/images/rumah/'.$poto_ruang_keluarga_lama);
                    }
                }
                $this->db->set('poto_ruang_keluarga', $this->upload->data('file_name'));
            }
	    }

		//upload prestasi
	    $upload_prestasi_siswa = $_FILES['bukti_prestasi']['name'];
		if($upload_prestasi_siswa){
	    	$hasil_prestasi_siswa = "img-".time()."-".$nama_lengkap.".".pathinfo($upload_prestasi_siswa, PATHINFO_EXTENSION);
	        $config['upload_path']        = FCPATH.'assets/images/bukti/';
	        $config['allowed_types']      = 'png|jpg|jpeg';
	        $config['max_size']           = '2048';
	        $config['file_name']          = $hasil_prestasi_siswa;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ($this->upload->do_upload('bukti_prestasi')) {
	            $upload_prestasi_lama = $peserta->bukti_prestasi;
                if ($upload_prestasi_lama != "default.png") {
                    if (!empty($upload_prestasi_lama)) {
                        unlink(FCPATH.'assets/images/bukti/'.$upload_prestasi_lama);
                    }
                }
                $this->db->set('bukti_prestasi', $this->upload->data('file_name'));
            }
	    }		

	    $data = [
	    	"nomor_pendaftaran"=> $this->input->post('nomor_pendaftaran', true),
			"nisn"			=> $this->input->post('nisn', true),
			"nama_lengkap"	=> $this->input->post('nama_lengkap', true),
			"jenis_kelamin"	=> $this->input->post('jenis_kelamin', true),
			"nomor_nik"		=> $this->input->post('nomor_nik', true),
			"nomor_kip"		=> $this->input->post('nomor_kip', true),
			"nomor_kks"		=> $this->input->post('nomor_kks', true),
			"sekolah_asal"	=> $this->input->post('sekolah_asal', true),
			"alamat_sekolah"=> $this->input->post('alamat_sekolah', true),
			"tahun_lulus"	=> $this->input->post('tahun_lulus', true),
			"tempat_lahir"	=> $this->input->post('tempat_lahir', true),
			"tanggal_lahir"	=> $this->input->post('tanggal_lahir', true),
			"agama"			=> $this->input->post('agama', true),
			"alamat_peserta"=> $this->input->post('alamat_peserta', true),
			"provinsi"		=> $this->input->post('provinsi', true),
			"kabupaten"		=> $this->input->post('kabupaten', true),
			"kode_pos"		=> $this->input->post('kode_pos', true),
			"nomor_hp"		=> $this->input->post('nomor_hp', true),

			"nomor_kk"		=> $this->input->post('nomor_kk', true),
			"nik_kepala_keluarga" => $this->input->post('nik_kepala_keluarga', true),
			"nama_ayah"		=> $this->input->post('nama_ayah', true),
			"status_ayah"	=> $this->input->post('status_ayah', true),
			"hubungan_ayah"	=> $this->input->post('hubungan_ayah', true),
			"pendidikan_ayah"	  => $this->input->post('pendidikan_ayah', true),
			"detail_ayah"	=> $this->input->post('detail_ayah', true),
			"nama_ibu"		=> $this->input->post('nama_ibu', true),
			"status_ibu"	=> $this->input->post('status_ibu', true),
			"pendidikan_ibu"=> $this->input->post('pendidikan_ibu', true),
			"detail_ibu"	=> $this->input->post('detail_ibu', true),
			"jumlah_tanggungan"	  => $this->input->post('jumlah_tanggungan', true),

			"pekerjaan_ayah"   => $this->input->post('pekerjaan_ayah', true),
			"penghasilan_ayah" => $this->input->post('penghasilan_ayah', true),
			"pekerjaan_ibu"	   => $this->input->post('pekerjaan_ibu', true),
			"penghasilan_ibu"  => $this->input->post('penghasilan_ibu', true),

			"kepemilikan_rumah"=> $this->input->post('kepemilikan_rumah', true),
			"sumber_listrik"   => $this->input->post('sumber_listrik', true),
			"sumber_air"  	   => $this->input->post('sumber_air', true),
			"luas_tanah"       => $this->input->post('luas_tanah', true),
			"luas_bangunan"    => $this->input->post('luas_bangunan', true),
			"predikat_ujian"   => $this->input->post('predikat_ujian', true),

			"prestasi"  	   => $this->input->post('prestasi', true),
			"minat_ps"  	   => $this->input->post('minat_ps', true),
			"wawasan_ict"  	   => $this->input->post('wawasan_ict', true),
			"tingkat_prestasi" => $this->input->post('tingkat_prestasi', true)
		];
		$this->db->where('id_peserta', $id);
		$this->db->update('tbl_peserta', $data);
	}
    
    //Hapus data peserta sesuai Id
	public function hapus($id)
	{
		$this->db->where('id_peserta', $id);
		$this->db->delete('tbl_peserta');
	}
}