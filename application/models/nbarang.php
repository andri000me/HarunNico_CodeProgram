<?php
defined('BASEPATH') or exit('No direct script access allowed');

class nbarang extends CI_Model
{
    public function maxnbrgid()
    {
        $this->db->select('RIGHT(nama_barang.id_nama_barang,3)as kode', FALSE);
        $this->db->order_by('id_nama_barang', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('nama_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "ITMN" . $kodemax;
        return $kodejadi;
    }

    public function data_nbrg()
    {
        return $this->db->get('detail_nama_barang')->result_array();
    }

    public function insert_nbrg($data)
    {
        $this->db->insert('nama_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Nama Barang", "Menambah Nama Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1nbrg($id)
    {
        return $this->db->get_where('nama_barang', $id)->result_array();
    }

    public function ubahnbrg($id, $data)
    {
        $this->db->where('id_nama_barang', $id);
        $this->db->update('nama_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Nama Barang", "Mengubah Nama Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_nbrg($id)
    {
        $this->db->delete('nama_barang', ['id_nama_barang' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Nama Barang", "Menghapus Nama Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
