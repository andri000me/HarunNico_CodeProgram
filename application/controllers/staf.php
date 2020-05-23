<?php
defined('BASEPATH') or exit('No direct script access allowed');

class staf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('layouts/sf/header');
        $this->load->view('layouts/sf/navigation');
        $this->load->view('staf/index');
        $this->load->view('layouts/sf/footer');
    }

    function info_barang()
    {
        $this->load->view('layouts/sf/header');
        $this->load->view('layouts/sf/navigation');
        $this->load->view('staf/infobarang');
        $this->load->view('layouts/sf/footer');
    }

    function profil_barang()
    {
        $this->load->view('layouts/sf/header');
        $this->load->view('layouts/sf/navigation');
        $this->load->view('staf/profilbarang');
        $this->load->view('layouts/sf/footer');
    }
}
