<?php
defined('BASEPATH') or exit('No direct script access allowed');

class token extends CI_Model
{
    function insert_token($data)
    {
        $this->db->insert('token',$data);
    }
}