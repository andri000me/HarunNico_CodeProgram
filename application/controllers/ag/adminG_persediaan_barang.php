<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminG_persediaan_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_stok');
    }

    public function index()
    {
        $d = [
            'name'  => $this->session->userdata('nama'),
            'stok'  => $this->barang_stok->tampilbs()
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/persediaan_barang/index', $d);
        $this->load->view('layouts/ag/footer');
    }

    public function ubah_bs($id)
    {
        $cid = ['id_barang' => $id];
        $d = [
            'name'      => $this->session->userdata('nama'),
            'brg'       => $this->barang_stok->get1barang($cid)
        ];

        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('jenbrg', 'Jenis Barang', 'trim|required');
        $this->form_validation->set_rules('jbrg', 'Jumlah Barang', 'trim|required|greater_than[0]|numeric|integer');
        $this->form_validation->set_rules('pbrg', 'Panjang Barang', 'trim|required|greater_than[0]|numeric');
        $this->form_validation->set_rules('lbrg', 'Lebar Barang', 'trim|required|greater_than[0]|numeric');
        $this->form_validation->set_rules('tbrg', 'Tinggi Barang', 'trim|required|greater_than[0]|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/ag/header', $d);
            $this->load->view('layouts/ag/navigation');
            $this->load->view('adminG/persediaan_barang/ubah', $d);
            $this->load->view('layouts/ag/footer');
        } else {
            $jenbrg = $this->input->post('jenbrg');
            $jbrg   = $this->input->post('jbrg');
            $pbrg   = $this->input->post('pbrg');
            $lbrg   = $this->input->post('lbrg');
            $tbrg   = $this->input->post('tbrg');
            $data_bs = [
                'stok_barang'       => $jbrg,
                'jenis_barang'      => $jenbrg,
                'panjang_barang'    => $pbrg,
                'lebar_barang'      => $lbrg,
                'tinggi_barang'     => $tbrg
            ];
            $this->barang_stok->update_bs($cid, $data_bs);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('ag/adminG_persediaan_barang');
        }
    }
}
