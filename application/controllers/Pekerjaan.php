<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(3);
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
		$data['title'] = "Data pekerjaan";
		$data['active'] = "pekerjaan";
		$data['id_alumni'] = $this->session->userdata('id_alumni');
		$data['pekerjaan'] = $this->m_alumni->ambil_pekerjaan_byid($this->session->userdata('id_alumni'));
		
		$this->compose_view('alumni/riwayat_pekerjaan', $data);
	}

	public function hapus_pekerjaan($id_pekerjaan, $id_alumni)
	{
		$this->m_alumni->hapus_pekerjaan($id_pekerjaan);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data pekerjaan berhasil dihapus!</div>');

		if($this->session->userdata('level') == 1) {
			redirect('alumni/riwayat_pekerjaan/'.$id_alumni);
		}else {
			redirect('pekerjaan');
		}
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

		if($this->session->userdata('level') == 1) {
			redirect('alumni/riwayat_pekerjaan/'.$id_alumni);
		}else {
			redirect('pekerjaan');
		}
	}
}
