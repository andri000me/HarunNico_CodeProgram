<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_keluar extends CI_Model
{
    public function maxbkid()
    {
        $this->db->select('RIGHT(barang_keluar.id_barang_keluar,3)as kode', FALSE);
        $this->db->order_by('id_barang_keluar', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('barang_keluar');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "ITOU" . $kodemax;
        return $kodejadi;
    }

    public function bk()
    {
        return $this->db->get_where('barang_keluar')->result_array();
    }

    public function insertbk($data)
    {
        $this->db->insert('barang_keluar', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Barang Keluar", "Menambah Barang Keluar", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1bk($id)
    {
        return $this->db->get_where('barang_keluar', $id)->result_array();
    }

    public function updatebk($id, $data)
    {
        $this->db->where($id);
        $this->db->update('barang_keluar', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Barang Keluar", "Mengubah Barang Keluar", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function insertpengeluaran($data)
    {
        $this->db->insert('pengeluaran', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Barang Keluar", "Menambah Detail Barang Keluar", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function tampil_bk()
    {
        $this->db->order_by('id_barang_keluar', 'desc');
        return $this->db->get('detail_barang_keluar')->result_array();
    }

    public function button_keluar($id)
    {
        $this->db->order_by('id_barang_keluar', 'desc');
        return $this->db->get_where('barang_keluar', $id)->result_array();
    }

    public function tampilpengeluaran($id)
    {
        return $this->db->get_where('detail_pengeluaran', $id)->result_array();
    }

    public function get1dp($id)
    {
        return $this->db->get_where('data_pengeluaran', $id)->result_array();
    }
}
