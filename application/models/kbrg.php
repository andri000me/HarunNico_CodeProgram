<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kbrg extends CI_Model
{
    public function maxkbrgid()
    {
        $this->db->select('RIGHT(kategori_barang.id_ktgr_brg,3)as kode', FALSE);
        $this->db->order_by('id_ktgr_brg', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('kategori_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "RCK" . $kodemax;
        return $kodejadi;
    }

    public function data_kbrg()
    {
        return $this->db->get('kategori_barang')->result_array();
    }

    public function insert_kbrg($data)
    {
        $this->db->insert('kategori_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Kategori Barang", "Menambah Kategori Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1kbrg($id)
    {
        return $this->db->get_where('kategori_barang', ['id_ktgr_brg' => $id])->result_array();
    }

    public function ubahkbrg($id, $data)
    {
        $this->db->where('id_ktgr_brg', $id);
        $this->db->update('kategori_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Kategori Barang", "Mengubah Kategori Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_kbrg($id)
    {
        $this->db->delete('kategori_barang', ['id_ktgr_brg' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Kategori Barang", "Menghapus Kategori Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
