<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mbarang extends CI_Model
{
    public function maxmbrgid()
    {
        $this->db->select('RIGHT(merk_barang.id_merk_barang,3)as kode', FALSE);
        $this->db->order_by('id_merk_barang', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('merk_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "MRKB" . $kodemax;
        return $kodejadi;
    }

    public function data_mbrg()
    {
        return $this->db->get('detail_merk_barang')->result_array();
    }

    public function insert_mbrg($data)
    {
        $this->db->insert('merk_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Merk Barang", "Menambah Merk Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1mbrg($id)
    {
        return $this->db->get_where('merk_barang',$id)->result_array();
    }

    public function ubahmbrg($id, $data)
    {
        $this->db->where('id_merk_barang', $id);
        $this->db->update('merk_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Merk Barang", "Mengubah Merk Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_mbrg($id)
    {
        $this->db->delete('merk_barang', ['id_merk_barang' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Merk Barang", "Menghapus Merk Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
