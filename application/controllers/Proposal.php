<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
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
		$data['title'] = "Daftar proposal";
		$data['active'] = "proposal";
		$data['proposal'] = $this->m_proposal->ambil_proposal_byidormawa($this->session->userdata('id_ormawa'));
		$data['proposal_valid'] = $this->m_proposal->ambil_proposal_valid_byidormawa($this->session->userdata('id_ormawa'));

		$this->compose_view('proposal/daftar_proposal', $data);
	}

	public function tambah_proposal()
	{
		$data['title'] = "Form Tambah proposal";
		$data['active'] = "proposal";

		$this->compose_view('proposal/tambah_proposal', $data);
	}

	public function tambah_proposal_form() {
		date_default_timezone_set('Asia/Jakarta');

		$config['upload_path'] = './assets/lampiran/';
		$config['allowed_types'] = '*';
		$config['remove_spaces']  = TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('lampiran'))
		{
			echo $config['upload_path'];
			echo $this->upload->display_errors();
		}else {
			$upload = $this->upload->data();
			$data = array(
	        	'id_ormawa' => $this->session->userdata('id_ormawa'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'lokasi_kegiatan' => $this->input->post('lokasi_kegiatan'),
				'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
				'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'jumlah_dana' => $this->input->post('jumlah_dana'),
				'lampiran' => $upload['file_name'],
				'status_proposal' => 'Belum Divalidasi',
				'status_spjlpj' => 'Belum Diupload',
				'waktu_buat' => date("Y-m-d H:i:s")
			);
			$this->m_proposal->tambah_proposal($data);
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Proposal Berhasil Ditambahkan!</div>');

		redirect('proposal');
	}

	public function perbaiki_proposal($id_proposal)
	{
		$data['title'] = "Perbaiki Proposal";
		$data['active'] = "proposal";
		$data['proposal'] = $this->m_proposal->ambil_proposal_byid($id_proposal);
		
		$this->compose_view('proposal/perbaiki_proposal', $data);
	}

	public function perbaiki_proposal_form($id_kegiatan) {
		$config['upload_path'] = './assets/lampiran/';
		$config['allowed_types'] = '*';
		$config['remove_spaces']  = TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('lampiran'))
		{
			echo $config['upload_path'];
			echo $this->upload->display_errors();
		}else {
			$upload = $this->upload->data();
	        $data = array(
	        	'lampiran' => $upload['file_name'],
				'status_proposal' => 'Sudah Diperbaiki'
			);
			$this->m_proposal->edit_proposal($id_kegiatan, $data);
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Proposal Berhasil Diperbaiki!</div>');

		redirect('proposal');
	}

	public function hapus_proposal($id_kegiatan, $lampiran)
	{
		if (file_exists("./assets/lampiran/" . $lampiran))
        	unlink("./assets/lampiran/" . $lampiran); 

		$this->m_proposal->hapus_proposal($id_kegiatan);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data proposal Berhasil Dihapus!</div>');

		redirect('proposal');
	}
}
