<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	/* 
		Level User :
		1. Admin
		2. Ormawa
		3. Alumni
		4. Kasubag
	*/

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Fungsi login
	public function login($username, $password) {
		$query = $this->CI->db->get_where('pengguna', array('username' => $username));
		if($query->num_rows() == 1) {
			if(password_verify($password, $query->row()->password)) {
				$pengguna = $this->CI->db->query('SELECT * FROM pengguna where username = "'.$username.'"')->row();
				$this->CI->session->set_userdata('id_pengguna', $pengguna->id_pengguna);
				$this->CI->session->set_userdata('foto', $pengguna->foto);
				$this->CI->session->set_userdata('thumbnail', $pengguna->thumbnail);
				$this->CI->session->set_userdata('level', $pengguna->level);
				$this->CI->session->set_userdata('login', TRUE);
				if($pengguna->level == 1) {
					$this->CI->session->set_userdata('nama', 'Admin');
					redirect('dashboard');
				}elseif($pengguna->level == 2) {
					$ormawa = $this->CI->db->query('SELECT * FROM ormawa where id_pengguna = "'.$pengguna->id_pengguna.'"')->row();
					$this->CI->session->set_userdata('id_ormawa', $ormawa->id_ormawa);
					$this->CI->session->set_userdata('nama', $ormawa->nama_ormawa);
					redirect('dashboard');
				}elseif($pengguna->level == 3) {
					$alumni = $this->CI->db->query('SELECT * FROM alumni where id_pengguna = "'.$pengguna->id_pengguna.'"')->row();
					$this->CI->session->set_userdata('id_alumni', $alumni->id_alumni);
					$this->CI->session->set_userdata('nim', $alumni->nim);
					$this->CI->session->set_userdata('nama', $alumni->nama_mahasiswa);
					redirect('legalisir');
				}elseif($pengguna->level == 4) {
					if($pengguna->username == 'kasubbag') {
						$this->CI->session->set_userdata('nama', 'Kasubbag');
					} elseif ($pengguna->username == 'wd3') {
						$this->CI->session->set_userdata('nama', 'Wakil Dekan 3');
					} 
					redirect('laporan');
				}elseif($pengguna->level == 5) {
					if($pengguna->username == 'kajur_si') {
						$this->CI->session->set_userdata('nama', 'Ketua Jurusan SI');
					}elseif ($pengguna->username == 'kajur_ti') {
						$this->CI->session->set_userdata('nama', 'Ketua Jurusan TI');
					}elseif ($pengguna->username == 'kajur_sk') {
						$this->CI->session->set_userdata('nama', 'Ketua Jurusan SK');
					}
					redirect('laporan');
				}else {
					$this->CI->session->set_userdata('nama', 'Kasubbag');
					redirect('laporan');
				}
			}else{
				$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center" style="font-size: 11px">Maaf password/username yang Anda masukkan salah!</div>');
			}
		}else{                
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center" style="font-size: 11px">Maaf password/username yang Anda masukkan salah!</div>');
			redirect('login');
		}
	}

	// Proteksi halaman
	public function cek_login($level) {
		if($this->CI->session->userdata('level') != $level) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	public function login_super($level1,$level2) {
		if($this->CI->session->userdata('level') != $level1 && $this->CI->session->userdata('level') != $level2){
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center" align="center">Anda Belum Log In!</div>');
			redirect('login');
		}else{
			return $this->CI->session->userdata('level');
		}
	}

	public function is_login($login) {
		if($this->CI->session->userdata('login') != $login) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('id_pengguna');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('login');
		$this->CI->session->unset_userdata('id_ormawa');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('foto');
		$this->CI->session->unset_userdata('thumbnail');
		$this->CI->session->set_flashdata('sukses','<div class="alert alert-success text-center">Anda Berhasil Log Out!</div>');
		redirect('login');
	}
}