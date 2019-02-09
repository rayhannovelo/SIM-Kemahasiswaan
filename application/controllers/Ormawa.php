<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ormawa extends CI_Controller {

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
		$data['title'] = "Daftar Ormawa";
		$data['active'] = "ormawa";
		$data['ormawa'] = $this->m_ormawa->ambil_ormawa();

		$this->compose_view('ormawa/daftar_ormawa', $data);
	}

	public function tambah_ormawa()
	{
		$data['title'] = "Form Tambah Ormawa";
		$data['active'] = "ormawa";

		$this->compose_view('ormawa/tambah_ormawa', $data);
	}

	public function tambah_ormawa_form() {
	 	$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => 2
		);
		$id_pengguna = $this->m_pengguna->tambah_pengguna($data);

        $data = array(
        	'id_pengguna' => $id_pengguna,
			'nama_ormawa' => $this->input->post('nama_ormawa'),
            'ketua_organisasi' => $this->input->post('ketua_organisasi'),
            'wakil_ketua' => $this->input->post('wakil_ketua'),
            'profil_organisasi' => $this->input->post('profil_organisasi'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp')
		);
		$this->m_ormawa->tambah_ormawa($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Ormawa Berhasil Ditambahkan!</div>');

		redirect('ormawa');
	}

	public function profil($id_ormawa)
	{
		$data['title'] = "Profil Ormawa";
		$data['active'] = "ormawa";
		$data['ormawa'] = $this->m_ormawa->ambil_ormawa_byid($id_ormawa);
		
		$this->compose_view('ormawa/profil', $data);
	}

	public function edit_profil_form($id_ormawa) {
		date_default_timezone_set('Asia/Jakarta');

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
		$this->m_ormawa->edit_ormawa($id_ormawa, $data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Ormawa Berhasil Diperbarui!</div>');

		redirect('ormawa/profil/'.$id_ormawa);
	}

	public function hapus_ormawa($id_pengguna)
	{
		$this->m_pengguna->hapus_pengguna($id_pengguna);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Ormawa Berhasil Dihapus!</div>');
		redirect('ormawa');
	}

	public function proposal() {
		$data['title'] = "Profil Ormawa";
		$data['active'] = "ormawa/proposal";
		$data['proposal'] = $this->m_proposal->ambil_proposal_belum_valid();
		$data['proposal_valid'] = $this->m_proposal->ambil_proposal_valid();
		
		$this->compose_view('ormawa/request_proposal', $data);
	}

	public function validasi_proposal($id_kegiatan) {
		$data['title'] = "Profil Ormawa";
		$data['active'] = "ormawa/proposal";
		$data['proposal'] = $this->m_proposal->ambil_proposal_byid($id_kegiatan);
		
		$this->compose_view('ormawa/validasi_proposal', $data);
	}

	public function validasi_proposal_form($id_kegiatan) {
		if($this->input->post('validasi') == 'Valid') {
	        $data = array(
				'status_proposal' => 'Valid'
			);
	   	}elseif($this->input->post('validasi') == 'Ditolak') {
	   		$data = array(
				'status_proposal' => 'Ditolak'
			);
	   	}else {
	   		$data = array(
				'status_proposal' => 'Perlu Diperbaiki',
				'keterangan_kesalahan' => $this->input->post('keterangan_kesalahan')
			);
	   	}
		$this->m_proposal->edit_proposal($id_kegiatan, $data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Ormawa Berhasil Diperbarui!</div>');

		redirect('ormawa/proposal');
	}

	public function riwayat_kegiatan($id_ormawa) {
		$data['title'] = "Daftar Ormawa";
		$data['active'] = "ormawa";
		$data['proposal'] = $this->m_proposal->ambil_proposal_byidormawa($id_ormawa);
		$data['proposal_valid'] = $this->m_proposal->ambil_proposal_valid_byid($id_ormawa);
		$data['nama_ormawa'] = $this->m_ormawa->ambil_nama_byid($id_ormawa);

		$this->compose_view('ormawa/daftar_kegiatan', $data);
	}

	public function perbarui_proposal($id_kegiatan) {
		$data['title'] = "Daftar Ormawa";
		$data['active'] = "ormawa/proposal";
		$data['kegiatan'] = $this->m_proposal->ambil_proposal_byid($id_kegiatan);

		$this->compose_view('ormawa/perbarui_kegiatan', $data);
	}

	public function perbarui_proposal_form($id_kegiatan) {
   		$data = array(
			'keterangan_kegiatan' => $this->input->post('keterangan_kegiatan'),
			'tanggal_pelaksanaan' => $this->input->post('tanggal_pelaksanaan'),
			'biaya_dari_keuangan' => $this->input->post('biaya_dari_keuangan')
		);
		$this->m_proposal->edit_proposal($id_kegiatan, $data);

		redirect('ormawa/proposal');
	}
}
