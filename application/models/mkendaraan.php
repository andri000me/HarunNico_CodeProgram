<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mkendaraan extends CI_Model
{
    public function maxmkendaraanid()
    {
        $this->db->select('RIGHT(merk_kendaraan.id_merk_kendaraan,3)as kode', FALSE);
        $this->db->order_by('id_merk_kendaraan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('merk_kendaraan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "MRKT" . $kodemax;
        return $kodejadi;
    }

    public function data_mkendaraan()
    {
        return $this->db->get('merk_kendaraan')->result_array();
    }

    public function insert_mkendaraan($data)
    {
        $this->db->insert('merk_kendaraan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Merk Kendaraan", "Menambah Merk kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function get1mkendaraan($id)
    {
        return $this->db->get_where('merk_kendaraan', ['id_merk_kendaraan' => $id])->result_array();
    }

    public function ubahmkendaraan($id, $data)
    {
        $this->db->where('id_merk_kendaraan', $id);
        $this->db->update('merk_kendaraan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Merk Kendaraan", "Mengubah Merk kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_mkendaraan($id)
    {
        $this->db->delete('merk_kendaraan', ['id_merk_kendaraan' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Merk Kendaraan", "Menghapus Merk kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
