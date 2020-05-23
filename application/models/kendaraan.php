<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kendaraan extends CI_Model
{
    public function maxkendaraanid()
    {
        $this->db->select('RIGHT(kendaraan.id_kendaraan,3)as kode', FALSE);
        $this->db->order_by('id_kendaraan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('kendaraan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "TNPS" . $kodemax;
        return $kodejadi;
    }

    public function data_kendaraan()
    {
        $this->db->order_by('kapasitas', 'desc');
        return $this->db->get('detail_kendaraan')->result_array();
    }

    public function insert_kendaraan($data)
    {
        $this->db->insert('kendaraan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Kendaraan", "Menambah Kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function get1kendaraan($id)
    {
        return $this->db->get_where('kendaraan', ['id_kendaraan' => $id])->result_array();
    }

    public function ubahkendaraan($id, $data)
    {
        $this->db->where($id);
        $this->db->update('kendaraan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Kendaraan", "Mengubah Kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_kendaraan($id)
    {
        $this->db->delete('kendaraan', ['id_kendaraan' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Kendaraan", "Menghapus Kendaraan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
