<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_toko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('toko');
        $this->load->model('tujuan');
    }

    public function index()
    {
        $p = [
            'toko' => $this->toko->gettoko(),
            'name' => $this->session->userdata('nama')
        ];
        $this->load->view('layouts/sa/header', $p);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/toko/index', $p);
        $this->load->view('layouts/sa/footer');
    }

    public function tambah_toko()
    {
        $akses = ['hak_akses' => 4];
        $p = [
            'pemilik'   => $this->toko->pengguna_toko($akses),
            'name'      => $this->session->userdata('nama'),
            'id'        => $this->toko->maxtokoid(),
            'kota'      => $this->tujuan->data_tujuan()
        ];
        $this->form_validation->set_rules('pemilik', 'Pemilik Toko', 'trim|required');
        $this->form_validation->set_rules('namat', 'Nama Toko', 'trim|required');
        $this->form_validation->set_rules('noteltoko', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat Jalan', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Alamat Kota', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $p);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/toko/tambah', $p);
            $this->load->view('layouts/sa/footer');
        } else {
            $idtoko     = $this->input->post('id_toko');
            $pemilik    = $this->input->post('pemilik');
            $namat      = $this->input->post('namat');
            $alamat     = $this->input->post('alamat');
            $tujuan     = $this->input->post('tujuan');
            $notel      = $this->input->post('noteltoko');
            $data = [
                'id_toko'       => $idtoko,
                'id_pengguna'   => $pemilik,
                'nama_toko'     => $namat,
                'alamat_toko'   => $alamat,
                'id_tujuan'     => $tujuan,
                'notel_toko'    => $notel
            ];
            $this->toko->inserttoko($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('sa/sa_toko');
        }
    }

    public function ubah_toko($id)
    {
        $akses = ['hak_akses' => 4];
        $where = ['id_toko' => $id];
        $p = [
            'pemilik'   => $this->toko->pengguna_toko($akses),
            'name'      => $this->session->userdata('nama'),
            'toko'        => $this->toko->get1toko($where),
            'kota'      => $this->tujuan->data_tujuan()
        ];
        //$this->form_validation->set_rules('pemilik', 'Pemilik Toko', 'trim|required');
        $this->form_validation->set_rules('namat', 'Nama Toko', 'trim|required');
        $this->form_validation->set_rules('noteltoko', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat Jalan', 'trim|required');
        //$this->form_validation->set_rules('tujuan', 'Alamat Kota', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $p);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/toko/ubah', $p);
            $this->load->view('layouts/sa/footer');
        } else {
            $pemilik    = $this->input->post('pemilik');
            $namat      = $this->input->post('namat');
            $alamat     = $this->input->post('alamat');
            $tujuan     = $this->input->post('tujuan');
            $notel      = $this->input->post('noteltoko');
            $data = [
                'id_pengguna'   => $pemilik,
                'nama_toko'     => $namat,
                'alamat_toko'   => $alamat,
                'id_tujuan'     => $tujuan,
                'notel_toko'    => $notel
            ];
            $this->toko->updatetoko($where, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect('sa/sa_toko');
        }
    }

    public function hapus_toko($id)
    {
        $cid = ['id_toko' => $id];
        $this->toko->deletetoko($cid);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_toko');
    }
}
