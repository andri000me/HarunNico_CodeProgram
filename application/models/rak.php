<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rak extends CI_Model
{
    public function maxrakid()
    {
        $this->db->select('RIGHT(rak_barang.id_rak,3)as kode', FALSE);
        $this->db->order_by('id_rak', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('rak_barang');
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

    public function data_rak()
    {
        return $this->db->get('detail_rak')->result_array();
    }

    public function insert_rak($data)
    {
        $this->db->insert('rak_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Rak", "Menambah Rak", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1rak($id)
    {
        return $this->db->get_where('rak_barang', ['id_rak' => $id])->result_array();
    }

    public function ubahrak($id, $data)
    {
        $this->db->where('id_rak', $id);
        $this->db->update('rak_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Rak", "Mengubah Rak", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_rak($id)
    {
        $this->db->delete('rak_barang', ['id_rak' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Rak", "Menghapus Rak", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
