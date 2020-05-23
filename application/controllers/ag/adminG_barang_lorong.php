<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminG_barang_lorong extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('lorong');
        $this->load->model('barang_stok');
        $this->load->model('barang_keluar');
    }

    function index()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'lorong'    => $this->lorong->data_lorong()
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/baranglorong/index', $d);
        $this->load->view('layouts/ag/footer');
    }

    function lorong_barang($id = "")
    {
        $cid    = ['id_lorong' => $id];
        $data   = $this->lorong->get1lorongbarang($cid);
        if ($id == "") {
            $this->index();
        } else {
            $no = 1;
            foreach ($data as $l) {
                if ($data['stok_barang' > 0]) {
                    echo "
                <tr>
                    <td>" . $no++ . "</td>
                    <td>" . $l['nama_ktgr_brg'] . "</td>
                    <td>" . $l['nama_barang'] . "</td>
                    <td>" . $l['nama_merk_barang'] . "</td>
                    <td>" . $l['jumlah_brg_masuk'] . "</td>
                </tr>
                ";
                } else {
                    echo "Tidak Ada Barang";
                }
            }
        }
    }

    function hal_kirim_barang()
    {
        $sb = ['status_barang' => 0];
        $d = [
            'name'      => $this->session->userdata('nama'),
            'barang'    => $this->barang_stok->tampilstok(),
            'bkeluar'   => $this->barang_keluar->tampilpengeluaran($sb),
            'button'    => $this->barang_keluar->button_keluar($sb),
            'brgker'    => $this->barang_keluar->bk()
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/kirim_barang', $d);
        $this->load->view('layouts/ag/footer');
    }
}
