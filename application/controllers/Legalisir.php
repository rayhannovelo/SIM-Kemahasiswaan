<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class legalisir extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->is_login(TRUE);
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
		$data['title'] = "Daftar legalisir";
		$data['active'] = "legalisir";

		if($this->session->userdata('level') == 1) {
			$data['legalisir'] = $this->m_alumni->ambil_legalisir();
			$this->compose_view('alumni/daftar_legalisir', $data);
		} else {
			$data['legalisir'] = $this->m_alumni->ambil_legalisir_byid($this->session->userdata('id_alumni'));
			$this->compose_view('legalisir/daftar_legalisir', $data);
		}
	}

	public function tambah_legalisir()
	{
		$data['title'] = "Form Tambah legalisir";
		$data['active'] = "legalisir";

		$this->compose_view('legalisir/tambah_legalisir', $data);
	}

	public function tambah_legalisir_form() {
		date_default_timezone_set('Asia/Jakarta');

        $data = array(
			'id_alumni' => $this->session->userdata('id_alumni'),
            'jumlah_ijazah' => $this->input->post('jumlah_ijazah'),
            'jumlah_transkrip' => $this->input->post('jumlah_transkrip'),
            'status_legalisir' => 'Menunggu Konfirmasi',
            'waktu_buat' => date("Y-m-d H:i:s")
		);
		$this->m_alumni->tambah_legalisir($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data legalisir Berhasil Ditambahkan!</div>');

		redirect('legalisir');
	}

	public function create_thumbnail($file_name, $upload_path) {
		// thumbnail config
		$this->image_lib->clear();
		$config=array();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $upload_path . $file_name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
	}

	public function hapus_legalisir($id_legalisir)
	{
		$this->m_alumni->hapus_legalisir($id_legalisir);
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data legalisir Berhasil Dihapus!</div>');

		redirect('legalisir');
	}

	public function proses($id_legalisir) {
		$data = array(
            'status_legalisir' => 'Legalisir Sudah Bisa Diambil'
		);
		$this->m_alumni->edit_legalisir($id_legalisir, $data);
		redirect('legalisir');
	}

	public function tolak($id_legalisir) {
		$data = array(
            'status_legalisir' => 'Tidak Memenuhi Syarat'
		);
		$this->m_alumni->edit_legalisir($id_legalisir, $data);
		redirect('legalisir');
	}

	public function selesai($id_legalisir) {
		$data = array(
            'status_legalisir' => 'Selesai'
		);
		$this->m_alumni->edit_legalisir($id_legalisir, $data);
		redirect('legalisir');
	}
}
