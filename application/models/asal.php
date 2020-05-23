<?php
defined('BASEPATH') or exit('No direct script access allowed');

class asal extends CI_Model
{
    public function maxasalid()
    {
        $this->db->select('RIGHT(asal_barang.id_asal,3)as kode', FALSE);
        $this->db->order_by('id_asal', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('asal_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "FRM" . $kodemax;
        return $kodejadi;
    }

    public function data_asal()
    {
        return $this->db->get('asal_barang')->result_array();
    }

    public function insert_asal($data)
    {
        $this->db->insert('asal_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Asal", "Menambah Asal Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1asal($id)
    {
        return $this->db->get_where('asal_barang', ['id_asal' => $id])->result_array();
    }

    public function ubahasal($id, $data)
    {
        $this->db->where('id_asal', $id);
        $this->db->update('asal_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Asal", "Mengubah Asal Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_asal($id)
    {
        $this->db->delete('asal_barang', ['id_asal' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Asal", "Menghapus Asal Barang", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
