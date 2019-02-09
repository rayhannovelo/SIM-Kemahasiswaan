<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_ormawa');
		$this->load->model('m_alumni');
		$this->load->model('m_pengguna');
		$this->load->model('m_proposal');
	}

	public function compose_view($main_view, $data)
	{
		$data['jumlah_request'] = $this->m_proposal->jumlah_request();
		$data['jumlah_spjlpj'] = $this->m_proposal->ambil_jumlah_spjlpj();
		$data['jumlah_legalisir'] = $this->m_alumni->ambil_jumlah_legalisir();
		$this->load->view('template/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Alumni Belum Bekerja";
		$data['active'] = "alumni";
		$data['alumni'] = $this->m_alumni->ambil_alumni_belum_bekerja();

		$this->compose_view('alumni/daftar_alumni', $data);
	}

	public function bekerja()
	{
		$data['title'] = "Daftar Alumni Bekerja";
		$data['active'] = "alumni";
		$data['alumni'] = $this->m_alumni->ambil_alumni_bekerja();

		$this->compose_view('alumni/daftar_alumni', $data);
	}

	public function seluruh()
	{
		$data['title'] = "Daftar Seluruh Alumni";
		$data['active'] = "alumni";
		$data['alumni'] = $this->m_alumni->ambil_alumni();

		$this->compose_view('alumni/daftar_alumni', $data);
	}

	public function tambah_alumni()
	{
		$data['title'] = "Form Tambah Alumni";
		$data['active'] = "alumni";

		$this->compose_view('alumni/tambah_alumni', $data);
	}

	public function tambah_alumni_form() {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
        	'username' => $this->input->post('nim'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => 3
		);
		$id_pengguna = $this->m_pengguna->tambah_pengguna($data);

        $data = array(
        	'id_pengguna' => $id_pengguna,
			'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'prodi' => $this->input->post('prodi'),
            'strata' => $this->input->post('strata'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'yudisium_ke' => $this->input->post('yudisium_ke'),
            'no_seri_transkrip' => $this->input->post('no_seri_transkrip'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'waktu_buat' => date("Y-m-d H:i:s")
		);
		$id_alumni = $this->m_alumni->tambah_alumni($data);

		if($this->input->post('legalisir') == 'Ya') {
			$data = array(
				'id_alumni' => $id_alumni,
	            'jumlah_ijazah' => $this->input->post('jumlah_ijazah'),
	            'jumlah_transkrip' => $this->input->post('jumlah_transkrip'),
	            'total_bayar' => $this->input->post('total_bayar'),
	            'waktu_buat' => date("Y-m-d H:i:s")
			);
			$this->m_alumni->tambah_legalisir($data);
		}

		if($this->input->post('pekerjaan') == 'Ya') {
			$data = array(
				'id_alumni' => $id_alumni,
	            'bulan_bekerja' => $this->input->post('bulan_bekerja'),
	            'tahun_bekerja' => $this->input->post('tahun_bekerja'),
	            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	            'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
	            'unit_kerja' => $this->input->post('unit_kerja'),
	            'jabatan' => $this->input->post('jabatan'),
	            'jumlah_gaji' => $this->input->post('jumlah_gaji'),
	            'waktu_buat' => date("Y-m-d H:i:s")
			);
			$this->m_alumni->tambah_pekerjaan($data);
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Alumni Berhasil Ditambahkan!</div>');

		redirect('alumni');
	}

	public function profil($id_alumni)
	{
		$data['title'] = "Profil Alumni";
		$data['active'] = "alumni";
		$data['alumni'] = $this->m_alumni->ambil_alumni_byid($id_alumni);
		
		$this->compose_view('alumni/profil', $data);
	}

	public function edit_profil_form($id_alumni) {
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->library('image_lib');
	    $this->load->library('upload');

		if(file_exists($_FILES['file_ijazah']['tmp_name']) || is_uploaded_file($_FILES['file_ijazah']['tmp_name'])) {
			$config['upload_path'] = './assets/lampiran/';
			$config['allowed_types'] = '*';
			$config['remove_spaces']  = TRUE;
        	$this->upload->initialize($config);

			if(!$this->upload->do_upload('file_ijazah'))
			{
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}else {
	            if (file_exists("./assets/lampiran/" . $this->input->post('ijazah')))
                	unlink("./assets/lampiran/" . $this->input->post('ijazah'));   
	            if (file_exists("./assets/lampiran/" . $this->input->post('ijazah'))) 
	                unlink("./assets/lampiran/" . $this->input->post('ijazah'));

				$upload = $this->upload->data();
				$data = array(
					'file_ijazah' => $upload['file_name']
				);
				$this->m_alumni->edit_alumni($this->session->userdata('id_alumni'), $data);
			}
		}

		if(file_exists($_FILES['file_transkrip']['tmp_name']) || is_uploaded_file($_FILES['file_transkrip']['tmp_name'])) {
			$config['upload_path'] = './assets/lampiran/';
			$config['allowed_types'] = '*';
			$config['remove_spaces']  = TRUE;
        	$this->upload->initialize($config);

			if(!$this->upload->do_upload('file_transkrip'))
			{
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}else {
				if (file_exists("./assets/lampiran/" . $this->input->post('transkrip')))
                	unlink("./assets/lampiran/" . $this->input->post('transkrip'));   
	            if (file_exists("./assets/lampiran/" . $this->input->post('transkrip'))) 
	                unlink("./assets/lampiran/" . $this->input->post('transkrip'));

				$upload = $this->upload->data();
				$data = array(
					'file_transkrip' => $upload['file_name']
				);
				$this->m_alumni->edit_alumni($this->session->userdata('id_alumni'), $data);
			}
		}

        $data = array(
			'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'prodi' => $this->input->post('prodi'),
            'strata' => $this->input->post('strata'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'yudisium_ke' => $this->input->post('yudisium_ke'),
            'no_ijazah' => $this->input->post('no_ijazah'),
            'no_seri_transkrip' => $this->input->post('no_seri_transkrip'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
		);
		$this->m_alumni->edit_alumni($id_alumni, $data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Alumni Berhasil Diperbarui!</div>');

		redirect('alumni/profil/'.$id_alumni);
	}

	public function hapus_alumni($id_alumni)
	{
		$this->m_alumni->hapus_alumni($id_alumni);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data alumni Berhasil Dihapus!</div>');
		redirect('alumni');
	}

	public function riwayat_legalisir($id_alumni)
	{
		$data['title'] = "Data Legalisir (".$this->m_alumni->ambil_nim_byid($id_alumni).' - '.$this->m_alumni->ambil_nama_byid($id_alumni).')';
		$data['active'] = "alumni";
		$data['id_alumni'] = $id_alumni;
		$data['legalisir'] = $this->m_alumni->ambil_legalisir_byid($id_alumni);
		
		$this->compose_view('alumni/riwayat_legalisir', $data);
	}

	public function hapus_legalisir($id_legalisir, $id_alumni)
	{
		$this->m_alumni->hapus_legalisir($id_legalisir);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data legalisir berhasil dihapus!</div>');
		redirect('alumni/riwayat_legalisir/'.$id_alumni);
	}

	public function tambah_legalisir_form($id_alumni) {
		$data = array(
			'id_alumni' => $id_alumni,
            'jumlah_ijazah' => $this->input->post('jumlah_ijazah'),
            'jumlah_transkrip' => $this->input->post('jumlah_transkrip'),
            'waktu_buat' => date("Y-m-d H:i:s")
		);
		$this->m_alumni->tambah_legalisir($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Legalisir Berhasil Ditambahkan!</div>');

		redirect('alumni/riwayat_legalisir/'.$id_alumni);
	}

	public function riwayat_pekerjaan($id_alumni)
	{
		$data['title'] = "Data pekerjaan (".$this->m_alumni->ambil_nim_byid($id_alumni).' - '.$this->m_alumni->ambil_nama_byid($id_alumni).')';
		$data['active'] = "alumni";
		$data['id_alumni'] = $id_alumni;
		$data['pekerjaan'] = $this->m_alumni->ambil_pekerjaan_byid($id_alumni);
		
		$this->compose_view('alumni/riwayat_pekerjaan', $data);
	}

	public function hapus_pekerjaan($id_pekerjaan, $id_alumni)
	{
		$this->m_alumni->hapus_pekerjaan($id_pekerjaan);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data pekerjaan berhasil dihapus!</div>');
		redirect('alumni/riwayat_pekerjaan/'.$id_alumni);
	}

	public function tambah_pekerjaan_form($id_alumni) {
		$data = array(
			'id_alumni' => $id_alumni,
            'bulan_bekerja' => $this->input->post('bulan_bekerja'),
            'tahun_bekerja' => $this->input->post('tahun_bekerja'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
            'unit_kerja' => $this->input->post('unit_kerja'),
            'jabatan' => $this->input->post('jabatan'),
            'jumlah_gaji' => $this->input->post('jumlah_gaji'),
            'waktu_buat' => date("Y-m-d H:i:s")
		);
		$this->m_alumni->tambah_pekerjaan($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data pekerjaan Berhasil Ditambahkan!</div>');

		redirect('alumni/riwayat_pekerjaan/'.$id_alumni);
	}
}
