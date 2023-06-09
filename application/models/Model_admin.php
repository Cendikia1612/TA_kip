<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
	//Ambil data admin
	public function getAdmin($email)
	{
		return $this->db->get_where('tbl_admin', ['email' => $email])->row();
	}

	//Ubah data admin
	public function ubahData()
	{
		$data['admin'] = $this->getAdmin($this->session->userdata('email'));
        $poto = $_FILES['poto']['name'];
        if($poto){
        	$nama_lengkap = str_replace(" ", "-", strtolower($data['admin']->nama_lengkap));
        	$file_nama = "img-".time()."-".$nama_lengkap.".".pathinfo($poto, PATHINFO_EXTENSION);
            $config['upload_path']        = FCPATH.'assets/images/user/';
            $config['allowed_types']      = 'png|jpg|jpeg';
            $config['max_size']           = '2048';
            $config['file_name']          = $file_nama;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('poto')) {

                //cari photo lama untuk dihapus
                $poto_lama = $data['admin']->poto;
                if ($poto_lama != "default.png") {
                	unlink(FCPATH.'assets/images/user/'.$poto_lama);
                }
                $poto = $this->upload->data('file_name');
                $this->db->set('poto', $file_nama);
            } else {
                $this->session->set_flashdata('pesan', 
                '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('admin/profil');
            }
        }
        $data = [
			"nama_lengkap"	=> $this->input->post('nama_lengkap', true),
			"alamat"		=> $this->input->post('alamat', true),
			"tempat_lahir"	=> $this->input->post('tempat_lahir', true),
			"tanggal_lahir"	=> $this->input->post('tanggal_lahir', true),
			"nomor_hp"		=> $this->input->post('nomor_hp', true)
		];
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('tbl_admin', $data);
	}

	public function ubahpassword()
	{
		$data['admin'] = $this->getAdmin($this->session->userdata('email'));
		$password_lama = $this->input->post('password_lama', true);
		$password_baru = $this->input->post('password_baru', true);
		$ulangi_password_baru = $this->input->post('ulangi_password_baru', true);

		if (empty($password_lama) || empty($password_baru) || empty($ulangi_password_baru)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Field Password tidak boleh kosong!</div>');
			redirect('admin/profil/ubahpassword');
		}else if($password_baru != $ulangi_password_baru){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru tidak sama!</div>');
			redirect('admin/profil/ubahpassword');
		}else if($password_lama == $ulangi_password_baru){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
			redirect('admin/profil/ubahpassword');
		}else if (password_verify($password_lama, $data['admin']->password)) {
			$this->db->set('password', password_hash($ulangi_password_baru, PASSWORD_DEFAULT));
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('tbl_admin');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
			redirect('admin/profil');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password lama yang anda masukkan salah!</div>');
			redirect('admin/profil/ubahpassword');
		}
	}
}