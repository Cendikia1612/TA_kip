<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Peserta extends CI_Controller {
	

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        login_admin();
    }

	public function index(){
		$data = [
			'judul' 		=>	'Kelola Pendaftar',
			'nav'			=>	'Kelola Pendaftar',
			'admin'			=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'pendaftaran'	=>	$this->Model_pendaftaran->ambilTahun(),
			'daftar'		=>	$this->Model_peserta->getDataTesting(),
			'ditetapkan'	=>	$this->Model_peserta->getDataTraining(),
			'peserta'		=>	$this->Model_peserta->getAllPeserta()
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/peserta/tampil', $data);
		$this->load->view('admin/templates/footer');

		if (isset($_POST['simpan_perubahan'])) {
			$this->Model_pendaftaran->perbaharui();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pendaftaran berhasil diperbaharui.</div>');
			redirect('admin/peserta');
		}
	}

	public function detail($id){
		$data = [
			'judul' 		=>	'Detail Peserta',
			'nav'			=>	'Detail Peserta',
			'admin'			=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'peserta'		=>	$this->Model_peserta->getIdPeserta($id)
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/peserta/detail', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah(){
		$data = [
			'judul' 	=>	'Tambah Pendaftar',
			'nav'		=>	'Tambah Pendaftar',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'agama'		=>	$this->Model_kriteria->getAgama()
		];

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		if($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/peserta/tambah', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$this->Model_peserta->tambah();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah.</div>');
			redirect('admin/peserta');
		}
	}

	public function trash(){
		$this->Model_peserta->trash();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dikosongkan.</div>');
			redirect('admin/peserta');
	}

	public function ubah($id)
	{
		$data = [
			'judul' 	=>	'Ubah Data Pendaftar',
			'nav'		=>	'Ubah Data Pendaftar',
			'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
			'peserta'	=>	$this->Model_peserta->getIdPeserta($id),
			'agama'		=>	$this->Model_kriteria->getAgama()
		];

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/peserta/ubah', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$id = $this->input->post('id', true);
			$this->Model_peserta->ubah($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diperbaharui.</div>');
			redirect('admin/peserta');
		}
	}

	// public function import(){
	// 	$data = [
	// 		'judul' 	=>	'Import Pendaftar',
	// 		'nav'		=>	'Import Pendaftar',
	// 		'admin'		=>	$this->Model_admin->getAdmin($this->session->userdata('email')),
	// 		'tahun'		=>	$this->Model_pendaftaran->ambilTahun()
	// 	];

	// 	$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
	// 	if($this->form_validation->run() == false){
	// 		$this->load->view('admin/templates/header', $data);
	// 		$this->load->view('admin/peserta/import', $data);
	// 		$this->load->view('admin/templates/footer');
	// 	}else{
	// 		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
	//         if(isset($_FILES['fileURL']['name']) && in_array($_FILES['fileURL']['type'], $file_mimes)) {
	//             $arr_file = explode('.', $_FILES['fileURL']['name']);
	//             $extension = end($arr_file);
	//             if('csv' == $extension){
	//                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
	//             }elseif('xls' == $extension){
	//                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
	//             }else {
	//                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	//             }
	//             $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
	//             $sheetData = $spreadsheet->getActiveSheet()->toArray();
	//             if (!empty($sheetData)) {

	// 	            for ($i=2; $i<count($sheetData); $i++) {
	// 	                //fungsi insert database disini
	// 	                $nama_lengkap	= strtolower($sheetData[$i][2]);
	// 	            	$nama_ayah		= strtolower($sheetData[$i][19]);
	// 	            	$nama_ibu		= strtolower($sheetData[$i][23]);
	// 	            	$luasTanah 		= str_replace("<", "kurang ",$sheetData[$i][31]);
	// 					$luasBangunan	= str_replace("<", "kurang ",$sheetData[$i][32]);
	// 	            	$pass 			= "12345"; //password default

	// 	            	$prestasi 		= $sheetData[$i][38];
	// 					if(preg_match("/Tidak Ada/i", $prestasi)) {
	// 						$tingkat_prestasi = "Tidak ada";
	// 					} else if(preg_match("/nasional/i", $prestasi)) {
	// 						$tingkat_prestasi = "Nasional";
	// 					} else if(preg_match("/provinsi/i", $prestasi)) {
	// 						$tingkat_prestasi = "Provinsi";
	// 					} else if((preg_match("/kabupaten/i", $prestasi)) || (preg_match("/kota/i", $prestasi))) {
	// 						$tingkat_prestasi = "Kabupaten/Kota";
	// 					}else{
	// 						$tingkat_prestasi = "Tidak Ada";
	// 					}

	// 					$ujian 			= $sheetData[$i][46];
	// 					if($ujian == ""){
	// 						$hasil_ujian = "0";
	// 					}else{
	// 						$hasil_ujian = $ujian;
	// 					}

	// 					$kode_pendaftaran = $this->Model_peserta->cekkodependaftaran();
	// 	                $insert = [
	// 	                	'kode_pendaftaran'  => $kode_pendaftaran,
	//                     	'nomor_pendaftaran' => $sheetData[$i][1], 
	//                     	'nama_lengkap' 		=> ucwords($nama_lengkap),
	//                     	'nomor_nik' 		=> $sheetData[$i][3],
	//                     	'nomor_kk' 			=> $sheetData[$i][4],
	//                     	'nik_kepala_keluarga' => $sheetData[$i][5],
	//                     	'nisn' 				=> $sheetData[$i][6],
	//                     	'persentil_dtks'	=> $sheetData[$i][7],
	//                     	'nomor_kip' 		=> str_replace("-","",$sheetData[$i][8]),
	//                     	'nomor_kks' 		=> str_replace("-","",$sheetData[$i][9]),
	//                     	'sekolah_asal' 		=> substr($sheetData[$i][10], 11),
	//                     	'kabupaten_sekolah' => $sheetData[$i][11],
	//                     	'provinsi_sekolah' 	=> $sheetData[$i][12],
	//                     	'tempat_lahir' 		=> $sheetData[$i][13],
	//                     	'tanggal_lahir'		=> $sheetData[$i][14],
	//                     	'jenis_kelamin' 	=> $sheetData[$i][15],
	//                     	'alamat_peserta'	=> $sheetData[$i][16],
	//                     	'nomor_hp'	 		=> $sheetData[$i][17],
	//                     	'email'		 		=> $sheetData[$i][18],
	//                     	'nama_ayah' 		=> ucwords($nama_ayah),
	//                     	'pekerjaan_ayah'	=> str_replace("-","",$sheetData[$i][20]),
	//                     	'penghasilan_ayah'	=> $sheetData[$i][21],
	//                     	'status_ayah' 		=> str_replace("-","",$sheetData[$i][22]),
	//                     	'nama_ibu'	 		=> ucwords($nama_ibu),
	//                     	'pekerjaan_ibu'		=> str_replace("-","",$sheetData[$i][24]),
	//                     	'penghasilan_ibu'	=> $sheetData[$i][25],
	//                     	'status_ibu' 		=> str_replace("-","",$sheetData[$i][26]),
	//                     	'jumlah_tanggungan'	=> str_replace("-","",$sheetData[$i][27]),
	//                     	'kepemilikan_rumah'	=> str_replace("-","",$sheetData[$i][28]),
	//                     	'tahun_perolehan' 	=> str_replace("-","",$sheetData[$i][29]),
	//                     	'sumber_listrik'	=> str_replace("-","",$sheetData[$i][30]),
	//                     	'luas_tanah' 		=> str_replace(">", "lebih ",$luasTanah),
	//                     	'luas_bangunan'		=> str_replace(">", "lebih ",$luasBangunan),
	//                     	'sumber_air' 		=> str_replace("-","",$sheetData[$i][33]),
	//                     	// 'mck'		 		=> str_replace("-","",$sheetData[$i][34]),
	//                     	'jarak_pusat_kota'	=> str_replace("-","",$sheetData[$i][34]),
	//                     	'prestasi'			=> $prestasi,
	//                     	'tingkat_prestasi'	=> $tingkat_prestasi,
	//                     	'tahun_pendaftaran'	=> $data['tahun']->tahun_pendaftaran,

	//                     	'poto'				=> "default.png",
	//                     	'poto_keluarga'	    => "default.png",
	//                     	'gambar_sktm'		=> "default.png",
	//                     	'poto_rumah_tampak_depan'=> "default.png",
	//                     	'poto_ruang_keluarga'	 => "default.png",
	// 						'bukti_prestasi'	=> "default.png",

	//                     	'password'	 		=> password_hash($pass, PASSWORD_DEFAULT),
	//                     	'level'				=> "peserta",
	//                     	'label'	 			=> str_replace("-","",$sheetData[$i][45]),
	//                     	'ujian'	 			=> $hasil_ujian,
	//                     	'status_peserta'	=> "aktif"
	//                 	];
	//                 	$this->db->insert('tbl_peserta', $insert);
	//                 	//echo $nama_lengkap . " - " . $insert['luas_tanah'] . " - " . $tingkat_prestasi . "<br>";
	//                 }
	// 	            $this->session->set_flashdata('pesan', 
	// 	            '<div class="alert alert-success" role="alert">Data berhasil di import!</div>');
	// 	            redirect('admin/peserta');
	// 	        }
	//         }
	// 	}
	// }


    // // checkFileValidation
    // public function checkFileValidation($string) {
    //   $file_mimes = array('text/x-comma-separated-values', 
    //     'text/comma-separated-values', 
    //     'application/octet-stream', 
    //     'application/vnd.ms-excel', 
    //     'application/x-csv', 
    //     'text/x-csv', 
    //     'text/csv', 
    //     'application/csv', 
    //     'application/excel', 
    //     'application/vnd.msexcel', 
    //     'text/plain', 
    //     'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    //   );
    //   if(isset($_FILES['fileURL']['name'])) {
    //         $arr_file = explode('.', $_FILES['fileURL']['name']);
    //         $extension = end($arr_file);
    //         if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
    //             return true;
    //         }else{
    //             $this->form_validation->set_message('checkFileValidation', 'Silakan pilih file yang benar.');
    //             return false;
    //         }
    //     }else{
    //         $this->form_validation->set_message('checkFileValidation', 'Silakan pilih file.');
    //         return false;
    //     }
    // }


    public function hapus($id){
    	$this->Model_peserta->hapus($id);
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
		redirect('admin/peserta');
    }

}