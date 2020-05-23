<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminG_barang_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_masuk');
        $this->load->model('barang_stok');
        $this->load->model('asal');
        $this->load->model('lorong');
        $this->load->model('kbrg');
        $this->load->model('nbarang');
        $this->load->model('mbarang');
        $this->load->model('rak');
    }

    function index()
    {
        $d = [
            'name'  => $this->session->userdata('nama'),
            'barmas' => $this->barang_masuk->lihatbm()
        ];
        $this->load->view('layouts/ag/header', $d);
        $this->load->view('layouts/ag/navigation');
        $this->load->view('adminG/barang_masuk/index', $d);
        $this->load->view('layouts/ag/footer');
    }

    function tambah_bm()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'brg'       => $this->barang_masuk->maxbrgid(),
            'asal'      => $this->asal->data_asal(),
            'lorong'    => $this->lorong->data_lorong(),
            'kbrg'      => $this->kbrg->data_kbrg(),
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('asal', 'Asal Barang', 'trim|required');
        $this->form_validation->set_rules('lorong', 'Lorong Penyimpanan', 'trim|required');
        $this->form_validation->set_rules('kbrg', 'Kategori Barang', 'trim|required');
        $this->form_validation->set_rules('nbrg', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('mbrg', 'Merk Barang', 'trim|required');
        $this->form_validation->set_rules('jenbrg', 'Jenis Barang', 'trim|required');
        $this->form_validation->set_rules('jbrg', 'Jumlah Barang', 'trim|required|greater_than[0]|numeric|integer');
        $this->form_validation->set_rules('pbrg', 'Panjang Barang', 'trim|required|greater_than[0]|numeric');
        $this->form_validation->set_rules('lbrg', 'Lebar Barang', 'trim|required|greater_than[0]|numeric');
        $this->form_validation->set_rules('tbrg', 'Tinggi Barang', 'trim|required|greater_than[0]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/ag/header', $d);
            $this->load->view('layouts/ag/navigation');
            $this->load->view('adminG/barang_masuk/tambah', $d);
            $this->load->view('layouts/ag/footer');
        } else {
            $id     = $this->input->post('id');
            $asal   = $this->input->post('asal');
            $lorong = $this->input->post('lorong');
            $kbrg   = $this->input->post('kbrg');
            $nbrg   = $this->input->post('nbrg');
            $mbrg   = $this->input->post('mbrg');
            $jenbrg = $this->input->post('jenbrg');
            $jbrg   = $this->input->post('jbrg');
            $pbrg   = $this->input->post('pbrg');
            $lbrg   = $this->input->post('lbrg');
            $tbrg   = $this->input->post('tbrg');
            date_default_timezone_set("Asia/Jakarta");
            $wdtg   = date("Y-m-d H:i:s");
            $rak    = $this->rak->data_rak();

            foreach ($rak as $r) {
                if ($r['id_lorong'] == $lorong && $r['id_ktgr_brg'] == $kbrg) {
                    $rak_id = $r['id_rak'];
                }
            }
            $data_bm = [
                'id_barang'         => $id,
                'id_asal'           => $asal,
                'id_lorong'         => $lorong,
                'waktu_masuk'       => $wdtg,
                'jumlah_brg_masuk'  => $jbrg
            ];
            $data_bs = [
                'id_barang'         => $id,
                'id_ktgr_brg'       => $kbrg,
                'id_merk_barang'    => $mbrg,
                'id_nama_barang'    => $nbrg,
                'id_rak'            => $rak_id,
                'stok_barang'       => $jbrg,
                'jenis_barang'      => $jenbrg,
                'panjang_barang'    => $pbrg,
                'lebar_barang'      => $lbrg,
                'tinggi_barang'     => $tbrg,
            ];
            $this->barang_stok->tbs($data_bs);
            $this->barang_masuk->tbm($data_bm);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
            redirect('ag/adminG_barang_masuk');
        }
    }

    function form_nama($nb)
    {
        $where = ['id_ktgr_brg' => $nb];
        $data = $this->nbarang->get1nbrg($where);
        echo '<option disabled="" selected="">Nama Barang</option>';
        foreach ($data as $nb) {
            echo '<option value="' . $nb['id_nama_barang'] . '">' . $nb['nama_barang'] . '</option>';
        }
    }

    function form_merk($mb)
    {
        $where = ['id_nama_barang' => $mb];
        $data = $this->mbarang->get1mbrg($where);
        echo '<option disabled="" selected="">Merk Barang</option>';
        foreach ($data as $mb) {
            echo '<option value="' . $mb['id_merk_barang'] . '">' . $mb['nama_merk_barang'] . '</option>';
        }
    }

    function ubah_bm($id)
    {
        $cid = ['id_barang' => $id];
        $d = [
            'name'      => $this->session->userdata('nama'),
            'brg'       => $this->barang_masuk->get1barang($cid),
            'asal'      => $this->asal->data_asal()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('asal', 'Asal Barang', 'trim|required');
        $this->form_validation->set_rules('jbrg', 'Jumlah Barang', 'trim|required|greater_than[0]|numeric|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/ag/header', $d);
            $this->load->view('layouts/ag/navigation');
            $this->load->view('adminG/barang_masuk/ubah', $d);
            $this->load->view('layouts/ag/footer');
        } else {
            $asal   = $this->input->post('asal');
            $jbrg   = $this->input->post('jbrg');
            $data   = [
                'id_asal'           => $asal,
                'jumlah_brg_masuk'  => $jbrg
            ];
            $this->barang_masuk->updatebm($cid, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('ag/adminG_barang_masuk');
        }
    }
}
