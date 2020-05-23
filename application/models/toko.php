<?php
defined('BASEPATH') or exit('No direct script access allowed');

class toko extends CI_Model
{
    public function maxtokoid()
    {
        $this->db->select('RIGHT(toko.id_toko,3)as kode', FALSE);
        $this->db->order_by('id_toko', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('toko');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "STORE" . $kodemax;
        return $kodejadi;
    }

    public function inserttoko($data)
    {
        $this->db->insert('toko', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Toko", "Menambah Toko", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function pengguna_toko($data)
    {
        return $this->db->get_where('detail_pengguna', $data)->result_array();
    }

    public function gettoko()
    {
        return $this->db->get('detail_toko')->result_array();
    }

    public function get1toko($id)
    {
        return $this->db->get_where('detail_toko', $id)->result_array();
    }

    public function updatetoko($id, $data)
    {
        $this->db->where($id);
        $this->db->update('toko', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Toko", "Mengubah Toko", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function deletetoko($id)
    {
        $this->db->delete('toko', $id);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Toko", "Menghapus Toko", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
