<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['title'] = "Dashboard";
		$data['active'] = "dashboard";

		if($this->session->userdata('level') == 1) {
			$data['jumlah_alumni'] = $this->m_alumni->jumlah_alumni();
			$data['jumlah_alumni_bekerja'] = $this->m_alumni->jumlah_alumni_bekerja();
			$data['jumlah_alumni_belum_bekerja'] = $this->m_alumni->jumlah_alumni_belum_bekerja();
			$data['jumlah_ormawa'] = $this->m_ormawa->jumlah_ormawa();
			$this->compose_view('dashboard/dashboard_admin', $data);
		}else {
			$data['jumlah_proposal'] = $this->m_proposal->jumlah_request_byid($this->session->userdata('id_ormawa'));
			$data['jumlah_kegiatan'] = $this->m_proposal->jumlah_kegiatan_byid($this->session->userdata('id_ormawa'));
			$this->compose_view('dashboard/dashboard_ormawa', $data);
		}
		
	}
}
