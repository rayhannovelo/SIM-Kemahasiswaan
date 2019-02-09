<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alumni extends CI_Model{

    // alumni

    public function ambil_alumni() {
        return $this->db->get('alumni')->result_array();
    }

    public function jumlah_alumni() {
        return $this->db->get('alumni')->num_rows();
    }

    public function jumlah_alumni_bekerja() {
        $this->db->select('*');
        $this->db->select('alumni.waktu_buat as waktu_buat');
        $this->db->select('count(riwayat_pekerjaan.id_pekerjaan) as jumlah_pekerjaan');
        $this->db->join('riwayat_pekerjaan', 'riwayat_pekerjaan.id_alumni = alumni.id_alumni', 'left');
        $this->db->group_by('alumni.id_alumni');
        $this->db->where('id_pekerjaan !=', NULL);
        return $this->db->get('alumni')->num_rows();
    }

    public function jumlah_alumni_belum_bekerja() {
        $this->db->select('*');
        $this->db->select('alumni.waktu_buat as waktu_buat');
        $this->db->select('count(riwayat_pekerjaan.id_pekerjaan) as jumlah_pekerjaan');
        $this->db->join('riwayat_pekerjaan', 'riwayat_pekerjaan.id_alumni = alumni.id_alumni', 'left');
        $this->db->group_by('alumni.id_alumni');
        $this->db->where('id_pekerjaan =', NULL);
        return $this->db->get('alumni')->num_rows();
    }

    public function ambil_alumni_bekerja() {
        $this->db->select('*');
        $this->db->select('alumni.id_alumni');
        $this->db->select('alumni.waktu_buat as waktu_buat');
        $this->db->select('count(riwayat_pekerjaan.id_pekerjaan) as jumlah_pekerjaan');
        $this->db->join('riwayat_pekerjaan', 'riwayat_pekerjaan.id_alumni = alumni.id_alumni', 'left');
        $this->db->group_by('alumni.id_alumni');
        $this->db->where('id_pekerjaan !=', NULL);
        return $this->db->get('alumni')->result_array();
    }

    public function ambil_alumni_belum_bekerja() {
        $this->db->select('*');
        $this->db->select('alumni.id_alumni');
        $this->db->select('alumni.waktu_buat as waktu_buat');
        $this->db->select('count(riwayat_pekerjaan.id_pekerjaan) as jumlah_pekerjaan');
        $this->db->join('riwayat_pekerjaan', 'riwayat_pekerjaan.id_alumni = alumni.id_alumni', 'left');
        $this->db->group_by('alumni.id_alumni');
        $this->db->where('id_pekerjaan =', NULL);
        return $this->db->get('alumni')->result_array();
    }

    public function ambil_alumni_byid($id_alumni) {
        $this->db->where('id_alumni', $id_alumni);
        return $this->db->get('alumni')->result_array();
    }

    public function ambil_nama_byid($id_alumni) {
        $this->db->where('id_alumni', $id_alumni);
        return $this->db->get('alumni')->row('nama_mahasiswa');
    }

    public function ambil_nim_byid($id_alumni) {
        $this->db->where('id_alumni', $id_alumni);
        return $this->db->get('alumni')->row('nim');
    }

    public function tambah_alumni($data) {
        $this->db->insert('alumni', $data);
        return $this->db->insert_id();
    }

    public function edit_alumni($id_alumni, $data) {
        $this->db->where('id_alumni', $id_alumni);
        $this->db->update('alumni', $data);
    }

    public function hapus_alumni($id_alumni) {
        $this->db->where('id_alumni', $id_alumni);
        $this->db->delete('alumni');
    }   

    public function ambil_profil_byid($id_pengguna) {
        $this->db->join('alumni', 'alumni.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.id_pengguna', $id_pengguna);
        return $this->db->get('pengguna')->result_array();
    }

    // riwayat legalisir

    public function ambil_legalisir() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function ambil_jumlah_legalisir() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        $this->db->where('riwayat_legalisir.status_legalisir <>', 'Selesai');
        return $this->db->get('riwayat_legalisir')->num_rows();
    }

    public function ambil_legalisir_selesai() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        $this->db->where('riwayat_legalisir.status_legalisir', 'Selesai');
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function ambil_legalisir_si() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        $this->db->where('riwayat_legalisir.status_legalisir', 'Selesai');
        $this->db->like('prodi', 'Sistem Informasi', 'both');
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function ambil_legalisir_sk() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        $this->db->where('riwayat_legalisir.status_legalisir', 'Selesai');
        $this->db->like('prodi', 'Sistem Komputer', 'both');
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function ambil_legalisir_ti() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        $this->db->where('riwayat_legalisir.status_legalisir', 'Selesai');
        $this->db->like('prodi', 'Teknik Informatika', 'both');
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function ambil_legalisir_d3() {
        $this->db->join('alumni', 'alumni.id_alumni = riwayat_legalisir.id_alumni');
        $this->db->where('riwayat_legalisir.status_legalisir', 'Selesai');
        $this->db->like('prodi', 'D3', 'both');
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function ambil_legalisir_byid($id_alumni) {
        $this->db->where('id_alumni', $id_alumni);
        return $this->db->get('riwayat_legalisir')->result_array();
    }

    public function tambah_legalisir($data) {
        $this->db->insert('riwayat_legalisir', $data);
        return $this->db->insert_id();
    }

    public function edit_legalisir($id_legalisir, $data) {
        $this->db->where('id_legalisir', $id_legalisir);
        $this->db->update('riwayat_legalisir', $data);
    }

    public function hapus_legalisir($id_legalisir) {
        $this->db->where('id_legalisir', $id_legalisir);
        $this->db->delete('riwayat_legalisir');
    } 

    // riwayat pekerjaan

    public function ambil_pekerjaan() {
        return $this->db->get('riwayat_pekerjaan')->result_array();
    }

    public function ambil_pekerjaan_byid($id_alumni) {
        $this->db->where('id_alumni', $id_alumni);
        return $this->db->get('riwayat_pekerjaan')->result_array();
    }

    public function tambah_pekerjaan($data) {
        $this->db->insert('riwayat_pekerjaan', $data);
        return $this->db->insert_id();
    }

    public function edit_pekerjaan($id_pekerjaan, $data) {
        $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->update('riwayat_pekerjaan', $data);
    }

    public function hapus_pekerjaan($id_pekerjaan) {
        $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->delete('riwayat_pekerjaan');
    }   
}