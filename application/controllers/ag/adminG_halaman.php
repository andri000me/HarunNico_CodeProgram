<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminG_halaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_keluar');
        $this->load->model('barang_masuk');
        $this->load->model('m_pemesanan');
        $this->load->model('Jumlah');
    }

    function index()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'barmas'    => $this->barang_masuk->lihatbm(),
            'bmasuk'    => $this->Jumlah->hitung_bmasuk(),
            'bkeluar'   => $this->Jumlah->hitung_bkeluar(),
            'barang'    => $this->Jumlah->hitung_barang(),
            'pemesanan' => $this->Jumlah->hitung_pemesanan()
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/index', $d);
        $this->load->view('layouts/ag/footer');
    }

    function barangkeluar()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'barang_keluar' => $this->barang_keluar->tampil_bk()
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/barang_keluar/index', $d);
        $this->load->view('layouts/ag/footer');
    }

    function detail_barang($id)
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'barang_keluar' => $this->barang_keluar->tampilpengeluaran($id)
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/profilbarang', $d);
        $this->load->view('layouts/ag/footer');
    }

    public function pemesanan()
    {
        $user = $this->session->userdata('nama');
        $pemesan = $this->m_pemesanan->pemesanan();
        $d = [
            'name' => $user,
            'pemesan' => $pemesan
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/pemesanan/index', $d);
        $this->load->view('layouts/ag/footer');
    }

    public function detail_pemesanan($id)
    {
        $user = $this->session->userdata('nama');
        $cid = ['id_pemesanan' => $id];
        $pemesan = $this->m_pemesanan->getpemesanantoko($cid);
        $d = [
            'name' => $user,
            'pemesanan' => $pemesan
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/pemesanan/detail_pemesanan', $d);
        $this->load->view('layouts/ag/footer');
    }
}
