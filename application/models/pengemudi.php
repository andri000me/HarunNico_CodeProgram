<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengemudi extends CI_Model
{
    public function maxapengemudiid()
    {
        $this->db->select('RIGHT(pengemudi.id_pengemudi,3)as kode', FALSE);
        $this->db->order_by('id_pengemudi', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('pengemudi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "DRV" . $kodemax;
        return $kodejadi;
    }

    public function data_pengemudi()
    {
        return $this->db->get('detail_pengemudi')->result_array();
    }

    public function pengguna_pengemudi($data)
    {
        return $this->db->get_where('detail_pengguna', $data)->result_array();
    }

    public function insert_pengemudi($data)
    {
        $this->db->insert('pengemudi', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pengemudi", "Menambah Pengemudi", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function get1pengemudi($id)
    {
        return $this->db->get_where('pengemudi', ['id_pengemudi' => $id])->result_array();
    }

    public function get1pengemudikosong($id)
    {
        return $this->db->get_where('detail_pengemudi', $id)->result_array();
    }

    public function ubahpengemudi($id, $data)
    {
        $this->db->where('id_pengemudi', $id);
        $this->db->update('pengemudi', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pengemudi", "Mengubah Pengemudi", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function hapus_pengemudi($id)
    {
        $this->db->delete('pengemudi', ['id_pengemudi' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pengemudi", "Menghapus Pengemudi", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
