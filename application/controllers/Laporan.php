<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->simple_login->is_login(TRUE);
        $this->load->model('m_ormawa');
        $this->load->model('m_alumni');
        $this->load->model('m_pengguna');
        $this->load->model('m_proposal');
    }

    public function compose_view($main_view, $data)
    {
        $this->load->view('template/header', $data);
        $this->load->view($main_view, $data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $data['title'] = "Laporan Legalisir";
        $data['active'] = "laporan";

        if($this->session->userdata('level') == 4) {
            $data['legalisir'] = $this->m_alumni->ambil_legalisir_selesai();
        } else {
            $nama = $this->session->userdata('nama');
            if($nama == 'Ketua Jurusan SI') {
                $data['legalisir'] = $this->m_alumni->ambil_legalisir_si();
            } elseif ($nama == 'Ketua Jurusan SK') {
                $data['legalisir'] = $this->m_alumni->ambil_legalisir_sk();
            }elseif ($nama == 'Ketua Jurusan TI') {
                $data['legalisir'] = $this->m_alumni->ambil_legalisir_ti();
            } else {
                $data['legalisir'] = $this->m_alumni->ambil_legalisir_d3();
            }
        }

        $this->compose_view('laporan/laporan_legalisir', $data);
    }

    public function kegiatan()
    {
        $data['title'] = "Laporan Kegiatan";
        $data['active'] = "laporan";
        $data['tahun'] = $this->m_proposal->ambil_tahun_proposal();
        $data['proposal'] = $this->m_proposal->ambil_proposal_full_valid();

        $this->compose_view('laporan/laporan_kegiatan', $data);
    }

    public function cari()
    {
        $data['title'] = "Laporan Kegiatan";
        $data['active'] = "laporan";
        $data['tahun'] = $this->m_proposal->ambil_tahun_proposal();
        $data['proposal'] = $this->m_proposal->cari_proposal($this->input->post('tahun'));

        $this->compose_view('laporan/laporan_kegiatan', $data);
    }
}
