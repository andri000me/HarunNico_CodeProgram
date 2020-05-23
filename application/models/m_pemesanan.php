<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pemesanan extends CI_Model
{
    public function maxpemesananid()
    {
        $this->db->select('RIGHT(pemesanan.id_pemesanan,3)as kode', FALSE);
        $this->db->order_by('id_pemesanan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('pemesanan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        date_default_timezone_set("Asia/Jakarta");
        $order   = date("Ymd");
        $kodejadi = $order . $kodemax;
        return $kodejadi;
    }

    public function insertpemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pemesanan", "Menambah Pemesanan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function insertpemesanantoko($data)
    {
        $this->db->insert('pemesanan_toko', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Detail Pemesanan", "Menambah Detail Pemesanan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function pemesanan()
    {
        return $this->db->get('detail_data_pemesanan')->result_array();
    }

    public function getpemesanan($id)
    {
        return $this->db->get_where('pemesanan', $id)->result_array();
    }

    public function getpemesanantoko($id)
    {
        return $this->db->get_where('detail_pemesanan', $id)->result_array();
    }

    public function getdetailpemesanan($id)
    {
        return $this->db->get_where('detail_data_pemesanan', $id)->result_array();
    }

    public function updatepemesanan($id, $data)
    {
        $this->db->where($id);
        $this->db->update('pemesanan', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pemesanan", "Mengubah Pemesanan", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
