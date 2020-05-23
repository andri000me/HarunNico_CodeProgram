<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_stok extends CI_Model
{
    public function tbs($data)
    {
        $this->db->insert('stok_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Stok Barang", "Menambah Stok Barang", $data['id_barang'], $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function tampilbs()
    {
        return $this->db->get('detail_stok')->result_array();
    }

    public function tampilstok()
    {
        return $this->db->get_where('stok_barang')->result_array();
    }

    public function get1barang($id)
    {
        return $this->db->get_where('detail_stok', $id)->result_array();
    }

    public function get1barangkhusus($id)
    {
        return $this->db->get_where('detail_stok_khusus', $id)->result_array();
    }

    public function update_bs($id, $data)
    {
        $this->db->where($id);
        $this->db->update('stok_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Stok Barang", "Mengubah Stok Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
