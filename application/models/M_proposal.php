<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_proposal extends CI_Model{

    // proposal

    public function ambil_proposal() {
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_proposal_byidormawa($id_ormawa) {
        return $this->db->query('SELECT * FROM `kegiatan_ormawa` JOIN `ormawa` ON `ormawa`.`id_ormawa` = `kegiatan_ormawa`.`id_ormawa` WHERE `ormawa`.`id_ormawa` ='. $id_ormawa . ' AND `kegiatan_ormawa`.`status_proposal` <> "Valid"')->result_array();
    }

    public function ambil_proposal_byid($id_kegiatan) {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_proposal_full_valid() {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('status_spjlpj', 'Valid');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_tahun_proposal() {
        $this->db->distinct();
        $this->db->select('YEAR(tanggal_pelaksanaan) as tanggal_pelaksanaan');
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('status_spjlpj', 'Valid');
        $this->db->group_by('tanggal_pelaksanaan');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function cari_proposal($tahun) {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('status_spjlpj', 'Valid');
        $this->db->where('YEAR(tanggal_pelaksanaan)', $tahun);
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_proposal_valid_byidormawa($id_ormawa) {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('ormawa.id_ormawa', $id_ormawa);
        $this->db->where('status_proposal', 'Valid');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_proposal_valid() {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Valid');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_proposal_belum_valid() {
        /*
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Belum Divalidasi');
        $this->db->or_where('status_proposal', 'Perlu Diperbaiki');
        $this->db->or_where('status_proposal', 'Sudah Diperbaiki');
        $this->db->or_where('status_proposal', 'Ditolak');
        return $this->db->get('kegiatan_ormawa')->result_array();
        */
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal <>', 'Valid');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_proposal_valid_byid($id_ormawa) {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('ormawa.id_ormawa', $id_ormawa);
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    /*
    public function ambil_proposal_belum_valid_byid($id_ormawa) {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Belum Divalidasi');
        $this->db->or_where('status_proposal', 'Perlu Diperbaiki');
        $this->db->or_where('status_proposal', 'Sudah Diperbaiki');
        $this->db->where('ormawa.id_ormawa', $id_ormawa);
        return $this->db->get('kegiatan_ormawa')->result_array();
    }
    */

    public function jumlah_request() {
        $this->db->where('status_proposal', 'Belum Divalidasi');
        $this->db->or_where('status_proposal', 'Perlu Diperbaiki');
        $this->db->or_where('status_proposal', 'Sudah Diperbaiki');
        return $this->db->get('kegiatan_ormawa')->num_rows();
    }

    public function jumlah_request_byid($id_ormawa) {
        return $this->db->query('SELECT * FROM `kegiatan_ormawa` JOIN `ormawa` ON `ormawa`.`id_ormawa` = `kegiatan_ormawa`.`id_ormawa` WHERE `ormawa`.`id_ormawa` ='. $id_ormawa . ' AND `kegiatan_ormawa`.`status_proposal` <> "Valid"')->num_rows();
    }

    public function jumlah_kegiatan_byid($id_ormawa) {
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('kegiatan_ormawa.id_ormawa', $id_ormawa);
        return $this->db->get('kegiatan_ormawa')->num_rows();
    }

    public function tambah_proposal($data) {
        $this->db->insert('kegiatan_ormawa', $data);
        return $this->db->insert_id();
    }

    public function edit_proposal($id_kegiatan, $data) {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('kegiatan_ormawa', $data);
    }

    public function hapus_proposal($id_kegiatan) {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->delete('kegiatan_ormawa');
    }   

    // SPJLPJ

    public function ambil_spjlpj() {
        return $this->db->query('SELECT * FROM `kegiatan_ormawa` JOIN `ormawa` ON `ormawa`.`id_ormawa` = `kegiatan_ormawa`.`id_ormawa` WHERE `kegiatan_ormawa`.`status_spjlpj` <> "Valid" AND `kegiatan_ormawa`.`status_spjlpj` <> "Belum Diupload" AND `kegiatan_ormawa`.`status_proposal` = "Valid"')->result_array();
    }

    public function ambil_jumlah_spjlpj() {
        return $this->db->query('SELECT * FROM `kegiatan_ormawa` JOIN `ormawa` ON `ormawa`.`id_ormawa` = `kegiatan_ormawa`.`id_ormawa` WHERE `kegiatan_ormawa`.`status_spjlpj` <> "Valid" AND `kegiatan_ormawa`.`status_spjlpj` <> "Belum Diupload" AND `kegiatan_ormawa`.`status_proposal` = "Valid"')->num_rows();
    }

    public function ambil_spjlpj_valid() {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('status_spjlpj', 'Valid');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }

    public function ambil_spjlpj_byidormawa($id_ormawa) {
        return $this->db->query('SELECT * FROM `kegiatan_ormawa` JOIN `ormawa` ON `ormawa`.`id_ormawa` = `kegiatan_ormawa`.`id_ormawa` WHERE `ormawa`.`id_ormawa` ='. $id_ormawa . ' AND `kegiatan_ormawa`.`status_spjlpj` <> "Valid" AND `kegiatan_ormawa`.`status_proposal` = "Valid"')->result_array();
    }

    public function ambil_spjlpj_valid_byidormawa($id_ormawa) {
        $this->db->join('ormawa', 'ormawa.id_ormawa = kegiatan_ormawa.id_ormawa');
        $this->db->where('ormawa.id_ormawa', $id_ormawa);
        $this->db->where('status_proposal', 'Valid');
        $this->db->where('status_spjlpj', 'Valid');
        return $this->db->get('kegiatan_ormawa')->result_array();
    }
}