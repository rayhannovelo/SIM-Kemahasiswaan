<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ormawa extends CI_Model{

    // ormawa

    public function ambil_ormawa() {
        $this->db->join('pengguna', 'pengguna.id_pengguna = ormawa.id_pengguna');
        return $this->db->get('ormawa')->result_array();
    }

    public function jumlah_ormawa() {
        return $this->db->get('ormawa')->num_rows();
    }

    public function ambil_ormawa_byid($id_pengguna) {
        $this->db->join('pengguna', 'pengguna.id_pengguna = ormawa.id_pengguna');
        $this->db->where('pengguna.id_pengguna', $id_pengguna);
        return $this->db->get('ormawa')->result_array();
    }

    public function ambil_nama_byid($id_ormawa) {
        $this->db->where('id_ormawa', $id_ormawa);
        return $this->db->get('ormawa')->row('nama_ormawa');
    }

    public function tambah_ormawa($data) {
        $this->db->insert('ormawa', $data);
        return $this->db->insert_id();
    }

    public function edit_ormawa($id_ormawa, $data) {
        $this->db->where('id_ormawa', $id_ormawa);
        $this->db->update('ormawa', $data);
    }

    public function hapus_ormawa($id_ormawa) {
        $this->db->where('id_ormawa', $id_ormawa);
        $this->db->delete('ormawa');
    }   
}