<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_pengguna extends CI_Model
{
    function insert_log($data)
    {
        $exec = $this->db->insert('log_pengguna', $data);
        return $this->db->affected_rows($exec);
    }
}
