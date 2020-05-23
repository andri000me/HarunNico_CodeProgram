<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Model
{
    function cek_user($data)
    {
        return $this->db->get_where('detail_pengguna', $data)->row_array();
    }

    function insert_data_akun($data)
    {
        $this->db->insert('akun_pengguna', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("user", "Menambah User", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
        return $this->db->insert_id();
    }

    public function update_data_akun($id, $data)
    {
        $this->db->where($id);
        $this->db->update('akun_pengguna', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("User", "Mengubah User", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    function lastid()
    {
        $this->db->select('RIGHT(akun_pengguna.id_pengguna,3)as kode', FALSE);
        $this->db->order_by('id_pengguna', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('akun_pengguna');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "USER" . $kodemax;
        return $kodejadi;
    }
}
