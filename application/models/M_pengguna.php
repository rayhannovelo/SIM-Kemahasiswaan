<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model{

    // pengguna

    public function ambil_pengguna() {
        return $this->db->get('pengguna')->result_array();
    }

    public function ambil_pengguna_byid($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('pengguna')->result_array();
    }

    public function tambah_pengguna($data) {
        $this->db->insert('pengguna', $data);
        return $this->db->insert_id();
    }

    public function edit_pengguna($id_pengguna, $data) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);
    }

    public function hapus_pengguna($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->delete('pengguna');
    }   
}