<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('lorong');
        $this->load->model('rak');
        $this->load->model('tujuan');
        $this->load->model('asal');
        $this->load->model('kbrg');
    }

    function tampil_lorong()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'lorong'    => $this->lorong->data_lorong()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/lokasi/lorong/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_lorong()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'lorong'    => $this->lorong->maxlorongid(),
            'tujuan'    => $this->tujuan->data_tujuan()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Lokasi Tujuan', 'trim|required');
        $this->form_validation->set_rules('nlorong', 'Nama Lorong', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/lorong/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $tujuan     = $this->input->post('tujuan');
            $nlorong    = $this->input->post('nlorong');
            $data       = [
                'id_lorong'     => $id,
                'id_tujuan'     => $tujuan,
                'nama_lorong'   => $nlorong
            ];
            $this->lorong->insert_lorong($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_lokasi/tampil_lorong');
        }
    }

    function ubah_lorong($id)
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'lorong'    => $this->lorong->get1lorong($id),
            'tujuan'    => $this->tujuan->data_tujuan()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Lokasi Tujuan', 'trim|required');
        $this->form_validation->set_rules('nlorong', 'Nama Lorong', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/lorong/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $tujuan     = $this->input->post('tujuan');
            $nlorong    = $this->input->post('nlorong');
            $data       = [
                'id_tujuan'     => $tujuan,
                'nama_lorong'   => $nlorong
            ];
            $this->lorong->ubahlorong($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_lokasi/tampil_lorong');
        }
    }

    function hapus_lorong($id)
    {
        $this->lorong->hapus_lorong($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_lokasi/tampil_lorong');
    }

    function tampil_rak()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'rak'       => $this->rak->data_rak()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/lokasi/rak/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_rak()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'rak'       => $this->rak->maxrakid(),
            'lorong'    => $this->lorong->data_lorong(),
            'kbrg'      => $this->kbrg->data_kbrg()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('lorong', 'Nama Lorong', 'trim|required');
        $this->form_validation->set_rules('kbrg', 'Kategori Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/rak/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $lorong     = $this->input->post('lorong');
            $kbrg       = $this->input->post('kbrg');
            $data       = [
                'id_rak'        => $id,
                'id_lorong'     => $lorong,
                'id_ktgr_brg'   => $kbrg
            ];
            $this->rak->insert_rak($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_lokasi/tampil_rak');
        }
    }

    function ubah_rak($id)
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'rak'       => $this->rak->get1rak($id),
            'lorong'    => $this->lorong->data_lorong(),
            'kbrg'      => $this->kbrg->data_kbrg()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('nlorong', 'Nama Lorong', 'trim');
        $this->form_validation->set_rules('kbrg', 'Kategori Barang', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/rak/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $lorong     = $this->input->post('lorong');
            $kbrg       = $this->input->post('kbrg');
            $data       = [
                'id_rak'        => $id,
                'id_lorong'     => $lorong,
                'id_ktgr_brg'   => $kbrg
            ];
            $this->rak->ubahrak($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_lokasi/tampil_rak');
        }
    }

    function hapus_rak($id)
    {
        $this->rak->hapus_rak($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_lokasi/tampil_rak');
    }

    function tampil_tujuan()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'tujuan'    => $this->tujuan->data_tujuan()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/lokasi/tujuan/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_tujuan()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'tujuan'    => $this->tujuan->maxtujuanid()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('ntujuan', 'Nama Tujuan', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Titik Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Titik Longitude', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/tujuan/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $ntujuan    = $this->input->post('ntujuan');
            $lat        = $this->input->post('latitude');
            $long       = $this->input->post('longitude');
            $data       = [
                'id_tujuan'     => $id,
                'nama_lokasi_tujuan'   => $ntujuan,
                'latitude'   => $lat,
                'longitude'   => $long,
            ];
            $this->tujuan->insert_tujuan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
            redirect('sa/sa_lokasi/tampil_tujuan');
        }
    }

    function ubah_tujuan($id)
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'tujuan'    => $this->tujuan->get1tujuan($id)
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('ntujuan', 'Nama Lorong', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Titik Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Titik Longitude', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/tujuan/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $ntujuan    = $this->input->post('ntujuan');
            $lat        = $this->input->post('latitude');
            $long       = $this->input->post('longitude');
            $data       = [
                'nama_lokasi_tujuan'   => $ntujuan,
                'latitude'   => $lat,
                'longitude'   => $long,
            ];
            $this->tujuan->ubahtujuan($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_lokasi/tampil_tujuan');
        }
    }

    function hapus_tujuan($id)
    {
        $this->tujuan->hapus_tujuan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_lokasi/tampil_tujuan');
    }

    function webkoordinat()
    {
        return 'www.latlong.net';
    }

    function tampil_asal()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'asal'      => $this->asal->data_asal()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/lokasi/asal/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_asal()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'asal'      => $this->asal->maxasalid()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('nasal', 'Nama Asal', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/asal/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $nasal      = $this->input->post('nasal');
            $data       = [
                'id_asal'     => $id,
                'nama_lokasi_asal'   => $nasal
            ];
            $this->asal->insert_asal($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
            redirect('sa/sa_lokasi/tampil_asal');
        }
    }

    function ubah_asal($id)
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'asal'      => $this->asal->get1asal($id)
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('nasal', 'Nama Lorong', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/lokasi/asal/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $nasal    = $this->input->post('nasal');
            $data       = [
                'nama_lokasi_asal'   => $nasal
            ];
            $this->asal->ubahasal($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_lokasi/tampil_asal');
        }
    }

    function hapus_asal($id)
    {
        $this->asal->hapus_asal($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_lokasi/tampil_asal');
    }
}
