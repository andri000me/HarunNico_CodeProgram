<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengguna extends CI_Model
{
    public function insert_pengguna($data)
    {
        $this->db->insert('pengguna', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pengguna", "Menambah Pengguna", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    public function tampil_pengguna()
    {
        return $this->db->get('detail_pengguna')->result_array();
    }

    public function get1_pengguna($id)
    {
        return $this->db->get_where('detail_pengguna', ['id_pengguna' => $id])->result_array();
    }

    public function update_pengguna($id, $data)
    {
        $this->db->where($id);
        $this->db->update('pengguna', $data);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pengguna", "Mengubah Pengguna", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }

    function hapus_pengguna($id)
    {
        $this->db->delete('pengguna', ['id_pengguna' => $id]);
        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            log_activity("Pengguna", "Menghapus Pengguna", "", $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }
    }
}
