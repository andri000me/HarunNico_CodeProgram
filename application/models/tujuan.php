<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tujuan extends CI_Model
{
    public function maxtujuanid()
    {
        $this->db->select('RIGHT(tujuan.id_tujuan,3)as kode', FALSE);
        $this->db->order_by('id_tujuan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tujuan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "LCT" . $kodemax;
        return $kodejadi;
    }

    public function data_tujuan()
    {
        return $this->db->get('tujuan')->result_array();
    }

    public function insert_tujuan($data)
    {
        $this->db->insert('tujuan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Tujuan", "Menambah Tujuan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function get1tujuan($id)
    {
        return $this->db->get_where('tujuan', ['id_tujuan' => $id])->result_array();
    }

    public function ubahtujuan($id, $data)
    {
        $this->db->where('id_tujuan', $id);
        $this->db->update('tujuan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Tujuan", "Mengubah Tujuan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_tujuan($id)
    {
        $this->db->delete('tujuan', ['id_tujuan' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Tujuan", "Menghapus Tujuan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
