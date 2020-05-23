<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_masuk extends CI_Model
{
    public function maxbrgid()
    {
        $this->db->select('RIGHT(stok_barang.id_barang,3)as kode', FALSE);
        $this->db->order_by('id_barang', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('stok_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "ITEM" . $kodemax;
        return $kodejadi;
    }

    public function tbm($data)
    {
        $this->db->insert('barang_masuk', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Barang Masuk", "Menambah Barang Masuk", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function lihatbm()
    {
        return $this->db->get('detail_barang_masuk')->result_array();
    }

    public function get1barang($id)
    {
        return $this->db->get_where('barang_masuk',$id)->result_array();
    }

    public function updatebm($id,$data)
    {
        $this->db->where($id);
        $this->db->update('barang_masuk',$data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Barang Masuk", "Mengubah Barang Masuk", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
