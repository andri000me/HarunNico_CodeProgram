<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lorong extends CI_Model
{
    public function maxlorongid()
    {
        $this->db->select('RIGHT(lorong.id_lorong,3)as kode', FALSE);
        $this->db->order_by('id_lorong', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('lorong');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "LANE" . $kodemax;
        return $kodejadi;
    }

    public function data_lorong()
    {
        return $this->db->get('lorong')->result_array();
    }

    public function insert_lorong($data)
    {
        $this->db->insert('lorong', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Lorong", "Menambah Lorong", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1lorong($id)
    {
        return $this->db->get_where('lorong', ['id_lorong' => $id])->result_array();
    }

    public function get1lorongbarang($id)
    {
        return $this->db->get_where('detail_barang_masuk', $id)->result_array();
    }

    public function ubahlorong($id, $data)
    {
        $this->db->where('id_lorong', $id);
        $this->db->update('lorong', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Lorong", "Mengubah Lorong", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_lorong($id)
    {
        $this->db->delete('lorong', ['id_lorong' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Lorong", "Menghapus Lorong", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
