<?php
defined('BASEPATH') or exit('No direct script access allowed');

class nkendaraan extends CI_Model
{
    public function maxnkendaraanid()
    {
        $this->db->select('RIGHT(nama_kendaraan.id_nama_kendaraan,3)as kode', FALSE);
        $this->db->order_by('id_nama_kendaraan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('nama_kendaraan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "TNAME" . $kodemax;
        return $kodejadi;
    }

    public function data_nkendaraan()
    {
        return $this->db->get('detail_nama_kendaraan')->result_array();
    }

    public function insert_nkendaraan($data)
    {
        $this->db->insert('nama_kendaraan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Nama Kendaraan", "Menambah Nama kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function get1mkendaraan($id)
    {
        return $this->db->get_where('nama_kendaraan', ['id_merk_kendaraan' => $id])->result_array();
    }

    public function get1nkendaraan($id)
    {
        return $this->db->get_where('nama_kendaraan', ['id_nama_kendaraan' => $id])->result_array();
    }

    public function ubahnkendaraan($id, $data)
    {
        $this->db->where('id_nama_kendaraan', $id);
        $this->db->update('nama_kendaraan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Nama Kendaraan", "Mengubah Nama kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_nkendaraan($id)
    {
        $this->db->delete('nama_kendaraan', ['id_nama_kendaraan' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Nama Kendaraan", "Menghapus Nama kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
