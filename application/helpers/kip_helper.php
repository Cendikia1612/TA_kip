<?php

//security untuk administrator
function login_admin(){
	$ci = get_instance();
	if (!$ci->session->userdata('status_login')) {
		redirect('admin');
	}
}

//security untuk peserta
function login_peserta(){
	$ci = get_instance();
	if (!$ci->session->userdata('status_login')) {
		redirect('login');
	}
}

// function status_ujian(){
// 	$ci = get_instance();
// 	$email   = $ci->session->userdata('email');
// 	$peserta = $ci->db->get_where('tbl_peserta', ['email' => $email])->row();
// 	$ujian   = $ci->db->get_where('tbl_ujian', ['tahun', $peserta->tahun_pendaftaran])->result();

// 	$selesai = $ci->db->query('SELECT a.email, a.nama_lengkap FROM tbl_peserta AS a JOIN tbl_ujian_kirim AS b ON a.id_peserta = b.id_peserta JOIN tbl_ujian AS c ON a.tahun_pendaftaran = c.tahun WHERE a.email = "'.$email.'" && b.status_terkirim = "Y"')->result();

// 	$tahun_ujian = $ci->db->query('SELECT a.email, a.nama_lengkap FROM tbl_peserta AS a JOIN tbl_ujian AS b ON a.tahun_pendaftaran != b.tahun WHERE a.email = "'.$email.'"')->result();

// 	//cek tahun ujian
// 	if ($tahun_ujian) {
// 		redirect('ujian');
// 		//echo "Bukan ujian kamu <br>";
// 	}

// 	//cek udah belum mengerjakan ujian
// 	if ($selesai) {
// 		redirect('ujian');
// 		echo "Ujian telah selesai dilaksanakan!";
// 	}

// 	//cek level
// 	if ($ci->session->userdata('level') == 'administrator') {
// 		redirect('admin');
// 	}
// }

// function waktu_ujian($id){
// 	$ci = get_instance();
// 	$waktu_ujian = $ci->db->get_where('tbl_ujian', ['id_ujian' => $id])->row();
// 	$sekarang = date('Y-m-d H:i:s');
    
//     if (($sekarang < $waktu_ujian->tanggal_mulai)) {
//     	redirect('ujian');
//     }elseif (($sekarang > $waktu_ujian->tanggal_mulai) && ($sekarang < $waktu_ujian->tanggal_selesai)){
//     }else{
//         redirect('ujian');
//     }   
// }