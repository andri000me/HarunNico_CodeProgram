<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_halaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jumlah');
    }

    function index()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'pengguna'      => $this->Jumlah->hitung_pengguna(),
            'toko'          => $this->Jumlah->hitung_toko(),
            'pengemudi'     => $this->Jumlah->hitung_pengemudi(),
            'kbrg'          => $this->Jumlah->hitung_kbrg(),
            'nbrg'          => $this->Jumlah->hitung_nbrg(),
            'mbrg'          => $this->Jumlah->hitung_mbrg(),
            'mkendaraan'    => $this->Jumlah->hitung_mkendaraan(),
            'nkendaraan'    => $this->Jumlah->hitung_nkendaraan(),
            'kendaraan'     => $this->Jumlah->hitung_kendaraan(),
            'lorong'        => $this->Jumlah->hitung_lorong(),
            'rak'           => $this->Jumlah->hitung_rak(),
            'tujuan'        => $this->Jumlah->hitung_tujuan(),
            'asal'          => $this->Jumlah->hitung_asal(),

        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/index', $d);
        $this->load->view('layouts/sa/footer');
    }
}
