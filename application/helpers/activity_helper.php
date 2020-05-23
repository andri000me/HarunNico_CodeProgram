<?php

function log_activity($tipe, $aksi, $item, $assign_to, $assign_type)
{
    $ci = &get_instance();

    $param['id_pengguna']   = $ci->session->userdata('id_pengguna');
    $param['log_tipe']      = $tipe;
    $param['log_aksi']      = $aksi;
    $param['log_item']      = $item;
    $param['log_assign_to'] = $assign_to;
    $param['log_assign_type'] = $assign_type;

    $ci->load->model('Log_pengguna');
    $ci->Log_pengguna->insert_log($param);
}
