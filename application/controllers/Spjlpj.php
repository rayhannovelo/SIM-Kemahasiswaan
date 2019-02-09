<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class spjlpj extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->is_login(TRUE);
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
		$data['title'] = "Daftar SPJ & LPJ";
		$data['active'] = "spjlpj";

		if($this->session->userdata('level') == 1) {
			$data['spjlpj'] = $this->m_proposal->ambil_spjlpj();
			$data['spjlpj_valid'] = $this->m_proposal->ambil_spjlpj_valid();
			$this->compose_view('ormawa/daftar_spjlpj', $data);
		} else {
			$data['spjlpj'] = $this->m_proposal->ambil_spjlpj_byidormawa($this->session->userdata('id_ormawa'));
			$data['spjlpj_valid'] = $this->m_proposal->ambil_spjlpj_valid_byidormawa($this->session->userdata('id_ormawa'));
			$this->compose_view('spjlpj/daftar_spjlpj', $data);
		}
	}

	public function tambah_spjlpj()
	{
		$data['title'] = "Form Tambah SPJ & LPJ";
		$data['active'] = "spjlpj";

		$this->compose_view('spjlpj/tambah_spjlpj', $data);
	}

	public function tambah_spjlpj_form() {
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
            if (file_exists("./assets/lampiran/" . $this->input->post('nama_file')))
            	unlink("./assets/lampiran/" . $this->input->post('nama_file'));  

			$upload = $this->upload->data();
			$data = array(
				'file_spjlpj' => $upload['file_name'],
				'status_spjlpj' => 'Belum Divalidasi'
			);
			$this->m_proposal->edit_proposal($this->input->post('id_kegiatan'), $data);
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data spjlpj Berhasil Ditambahkan!</div>');

		redirect('spjlpj');
	}

	public function perbaiki_spjlpj($id_spjlpj)
	{
		$data['title'] = "Perbaiki SPJ & LPJ";
		$data['active'] = "spjlpj";
		$data['spjlpj'] = $this->m_proposal->ambil_spjlpj_byid($id_spjlpj);
		
		$this->compose_view('spjlpj/perbaiki_spjlpj', $data);
	}

	public function perbaiki_spjlpj_form($id_kegiatan) {
		$config['upload_path'] = './assets/lampiran/';
		$config['allowed_types'] = '*';
		$config['remove_spaces']  = TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('lampiran'))
		{
			echo $config['upload_path'];
			echo $this->upload->display_errors();
		}else {
            if (file_exists("./assets/lampiran/" . $this->input->post('nama_file')))
            	unlink("./assets/lampiran/" . $this->input->post('nama_file'));  

			$upload = $this->upload->data();
			$data = array(
				'file_spjlpj' => $upload['file_name'],
				'status_spjlpj' => 'Sudah Diperbaiki'
			);
			$this->m_proposal->edit_proposal($this->input->post('id_kegiatan'), $data);
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data spjlpj Berhasil Diperbaiki!</div>');

		redirect('spjlpj');
	}

	public function hapus_spjlpj($id_kegiatan)
	{
		$this->m_proposal->hapus_spjlpj($id_kegiatan);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data spjlpj Berhasil Dihapus!</div>');

		redirect('spjlpj');
	}

	public function valid($id_kegiatan) {
		$data = array(
            'status_spjlpj' => 'Valid'
		);
		$this->m_proposal->edit_proposal($id_kegiatan, $data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data berhasil divalidasi!</div>');

		redirect('spjlpj');
	}

	public function perbaiki() {
		$data = array(
			'kesalahan_spjlpj' => $this->input->post('kesalahan_spjlpj'),
            'status_spjlpj' => 'Perlu Diperbaiki'
		);
		$this->m_proposal->edit_proposal($this->input->post('id_kegiatan'), $data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data berhasil diperbarui!</div>');

		redirect('spjlpj');
	}

}
