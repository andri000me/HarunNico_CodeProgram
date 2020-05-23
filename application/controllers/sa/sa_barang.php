<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kbrg');
        $this->load->model('mbarang');
        $this->load->model('nbarang');
    }

    function tampil_kbrg()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'kbrg'      => $this->kbrg->data_kbrg()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/barang/kategori/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_kbrg()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'kbrg'      => $this->kbrg->maxkbrgid()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('kbrg', 'Kategori Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/barang/kategori/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $kbrg       = $this->input->post('kbrg');
            $data       = [
                'id_ktgr_brg'     => $id,
                'nama_ktgr_brg'   => $kbrg
            ];
            $this->kbrg->insert_kbrg($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_barang/tampil_kbrg');
        }
    }

    function ubah_kbrg($id)
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'kbrg'      => $this->kbrg->get1kbrg($id)
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('kbrg', 'Nama Kategori', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/barang/kategori/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $kbrg       = $this->input->post('kbrg');
            $data       = [
                'nama_ktgr_brg'   => $kbrg
            ];
            $this->kbrg->ubahkbrg($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_barang/tampil_kbrg');
        }
    }

    function hapus_kbrg($id)
    {
        $this->kbrg->hapus_kbrg($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_barang/tampil_kbrg');
    }
    //Kategori

    function tampil_nbrg()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'nbrg'      => $this->nbarang->data_nbrg()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/barang/nama/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_nbrg()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'nbrg'      => $this->nbarang->maxnbrgid(),
            'kbrg'      => $this->kbrg->data_kbrg()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('kbrg', 'Kategori Barang', 'trim|required');
        $this->form_validation->set_rules('nbrg', 'Nama Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/barang/nama/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $kbrg       = $this->input->post('kbrg');
            $nbrg       = $this->input->post('nbrg');
            $data       = [
                'id_nama_barang'    => $id,
                'id_ktgr_brg'       => $kbrg,
                'nama_barang'       => $nbrg
            ];
            $this->nbarang->insert_nbrg($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_barang/tampil_nbrg');
        }
    }

    function ubah_nbrg($id)
    {
        $cid = ['id_nama_barang' => $id];
        $d = [
            'name'      => $this->session->userdata('nama'),
            'nbrg'      => $this->nbarang->get1nbrg($cid),
            'kbrg'      => $this->kbrg->data_kbrg()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('kbrg', 'Kategori Barang', 'trim|required');
        $this->form_validation->set_rules('nbrg', 'Nama Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/barang/nama/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $nbrg       = $this->input->post('nbrg');
            $kbrg       = $this->input->post('kbrg');
            $data       = [
                'id_ktgr_brg'       => $kbrg,
                'nama_barang'       => $nbrg
            ];
            $this->nbarang->ubahnbrg($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_barang/tampil_nbrg');
        }
    }

    function hapus_nbrg($id)
    {
        $this->nbarang->hapus_nbrg($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_barang/tampil_nbrg');
    }
    //namabarang

    function tampil_mbrg()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'mbrg'      => $this->mbarang->data_mbrg()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/barang/merk/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_mbrg()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'mbrg'      => $this->mbarang->maxmbrgid(),
            'nbrg'      => $this->nbarang->data_nbrg()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('nbrg', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('mbrg', 'Merk Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/barang/merk/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $nbrg       = $this->input->post('nbrg');
            $mbrg       = $this->input->post('mbrg');
            $data       = [
                'id_merk_barang'    => $id,
                'id_nama_barang'       => $nbrg,
                'nama_merk_barang'  => $mbrg
            ];
            $this->mbarang->insert_mbrg($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_barang/tampil_mbrg');
        }
    }

    function ubah_mbrg($id)
    {
        $cid = ['id_merk_barang' => $id];
        $d = [
            'name'      => $this->session->userdata('nama'),
            'mbrg'      => $this->mbarang->get1mbrg($cid),
            'nbrg'      => $this->nbarang->data_nbrg()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('nbrg', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('mbrg', 'Merk Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/barang/merk/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $nbrg       = $this->input->post('nbrg');
            $mbrg       = $this->input->post('mbrg');
            $data       = [
                'id_nama_barang'    => $nbrg,
                'nama_merk_barang'  => $mbrg
            ];
            $this->mbarang->ubahmbrg($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_barang/tampil_mbrg');
        }
    }

    function hapus_mbrg($id)
    {
        $this->mbarang->hapus_mbrg($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_barang/tampil_mbrg');
    }
    //Merk Barang

}
