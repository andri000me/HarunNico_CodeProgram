<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mkendaraan');
        $this->load->model('nkendaraan');
        $this->load->model('kendaraan');
        $this->load->model('pengemudi');
    }

    function tampil_mkendaraan()
    {
        $d = [
            'name'      => $this->session->userdata('nama'),
            'mkendaraan'      => $this->mkendaraan->data_mkendaraan()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/transportasi/mkendaraan/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_mkendaraan()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'mkendaraan'    => $this->mkendaraan->maxmkendaraanid()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('mkendaraan', 'Merk Kendaraan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/transportasi/mkendaraan/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $mkendaraan = $this->input->post('mkendaraan');
            $data       = [
                'id_merk_kendaraan' => $id,
                'nama_mk'           => $mkendaraan
            ];
            $this->mkendaraan->insert_mkendaraan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dibuat</div>');
            redirect('sa/sa_kendaraan/tampil_mkendaraan');
        }
    }

    function ubah_mkendaraan($id)
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'mkendaraan'    => $this->mkendaraan->get1mkendaraan($id)
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('mkendaraan', 'Merk Kendaraan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/transportasi/mkendaraan/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $mkendaraan = $this->input->post('mkendaraan');
            $data       = [
                'nama_mk'   => $mkendaraan
            ];
            $this->mkendaraan->ubahmkendaraan($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_kendaraan/tampil_mkendaraan');
        }
    }

    function hapus_mkendaraan($id)
    {
        $this->mkendaraan->hapus_mkendaraan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_kendaraan/tampil_mkendaraan');
    }
    //merk kendaraan

    function tampil_nkendaraan()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'nkendaraan'    => $this->nkendaraan->data_nkendaraan()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/transportasi/nkendaraan/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_nkendaraan()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'nkendaraan'    => $this->nkendaraan->maxnkendaraanid(),
            'mkendaraan'    => $this->mkendaraan->data_mkendaraan()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('mkendaraan', 'Merk Kendaraan', 'trim|required');
        $this->form_validation->set_rules('nkendaraan', 'Nama Kendaraan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/transportasi/nkendaraan/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $mkendaraan = $this->input->post('mkendaraan');
            $nkendaraan = $this->input->post('nkendaraan');
            $data       = [
                'id_nama_kendaraan' => $id,
                'id_merk_kendaraan' => $mkendaraan,
                'nama_kendaraan'    => $nkendaraan
            ];
            $this->nkendaraan->insert_nkendaraan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dibuat</div>');
            redirect('sa/sa_kendaraan/tampil_nkendaraan');
        }
    }

    function ubah_nkendaraan($id)
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'nkendaraan'    => $this->nkendaraan->get1nkendaraan($id),
            'mkendaraan'    => $this->mkendaraan->data_mkendaraan()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('mkendaraan', 'Merk Kendaraan', 'trim|required');
        $this->form_validation->set_rules('nkendaraan', 'Nama Kendaraan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/transportasi/nkendaraan/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $mkendaraan = $this->input->post('mkendaraan');
            $nkendaraan = $this->input->post('nkendaraan');
            $data       = [
                'id_merk_kendaraan' => $mkendaraan,
                'nama_kendaraan'    => $nkendaraan
            ];
            $this->nkendaraan->ubahnkendaraan($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_kendaraan/tampil_nkendaraan');
        }
    }

    function hapus_nkendaraan($id)
    {
        $this->nkendaraan->hapus_nkendaraan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_kendaraan/tampil_nkendaraan');
    }
    //nama kendaraan

    function tampil_kendaraan()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'kendaraan'     => $this->kendaraan->data_kendaraan()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/transportasi/kendaraan/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_kendaraan()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'kendaraan'     => $this->kendaraan->maxkendaraanid(),
            'mkendaraan'    => $this->mkendaraan->data_mkendaraan()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('nkendaraan', 'Nama Kendaraan', 'trim|required');
        $this->form_validation->set_rules('mkendaraan', 'Merk Kendaraan', 'trim|required');
        $this->form_validation->set_rules('jenken', 'Jenis Kendaraan', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas Kendaraan', 'trim|required');
        $this->form_validation->set_rules('noken', 'Nomber Kendaraan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/transportasi/kendaraan/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id             = $this->input->post('id');
            $nkendaraan     = $this->input->post('nkendaraan');
            $mkendaraan     = $this->input->post('mkendaraan');
            $jenken         = $this->input->post('jenken');
            $kapasitas      = $this->input->post('kapasitas');
            $noken          = $this->input->post('noken');
            $data       = [
                'id_kendaraan'      => $id,
                'id_merk_kendaraan' => $mkendaraan,
                'id_nama_kendaraan' => $nkendaraan,
                'jenis_kendaraan'   => $jenken,
                'kapasitas'         => $kapasitas,
                'no_kendaraan'      => $noken,
                'status_kendaraan'  => 0
            ];
            $this->kendaraan->insert_kendaraan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dibuat</div>');
            redirect('sa/sa_kendaraan/tampil_kendaraan');
        }
    }

    function nama_kendaraan_form($nk)
    {
        $data = $this->nkendaraan->get1mkendaraan($nk);
        echo '<option disabled="" selected="">Pilih Nama Kendaraan</option>';
        foreach ($data as $k) {
            echo "<option value='" . $k['id_nama_kendaraan'] . "'>" . $k['nama_kendaraan'] . "</option>";
        }
    }

    function ubah_kendaraan($id)
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'kendaraan'     => $this->kendaraan->get1kendaraan($id),
            'nkendaraan'    => $this->nkendaraan->data_nkendaraan(),
            'mkendaraan'    => $this->mkendaraan->data_mkendaraan()
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        //$this->form_validation->set_rules('nkendaraan', 'Nama Kendaraan', 'trim|required');
        //$this->form_validation->set_rules('pengemudi', 'Pengemudi', 'trim|required');
        //$this->form_validation->set_rules('jenken', 'Jenis Kendaraan', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas Kendaraan', 'trim|required');
        $this->form_validation->set_rules('noken', 'Nomber Kendaraan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/transportasi/kendaraan/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            //$id             = $this->input->post('id');
            $nkendaraan     = $this->input->post('nkendaraan');
            $mkendaraan     = $this->input->post('mkendaraan');
            $jenken         = $this->input->post('jenken');
            $kapasitas      = $this->input->post('kapasitas');
            $noken          = $this->input->post('noken');
            $data       = [
                'id_merk_kendaraan' => $mkendaraan,
                'id_nama_kendaraan' => $nkendaraan,
                'jenis_kendaraan'   => $jenken,
                'kapasitas'         => $kapasitas,
                'no_kendaraan'      => $noken,
                'status_kendaraan'  => 0
            ];
            $cid = ['id_kendaraan' => $id];
            $this->kendaraan->ubahkendaraan($cid, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_kendaraan/tampil_kendaraan');
        }
    }

    function hapus_kendaraan($id)
    {
        $this->kendaraan->hapus_kendaraan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_kendaraan/tampil_kendaraan');
    }
}
