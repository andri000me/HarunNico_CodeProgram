<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pemilik_toko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kbrg');
        $this->load->model('nbarang');
        $this->load->model('mbarang');
        $this->load->model('m_pemesanan');
        $this->load->model('toko');
    }

    function index()
    {
        $user = $this->session->userdata('nama');
        $getid = $this->session->userdata('id_pengguna');
        $id = ['id_pengguna' => $getid];
        $idtoko = $this->toko->get1toko($id);
        $d = [
            'name' => $user,
            'toko' => $idtoko
        ];
        $this->load->view('layouts/pt/header', $d);
        $this->load->view('layouts/pt/navigation');
        $this->load->view('pemilik_toko/index', $d);
        $this->load->view('layouts/pt/footer');
    }

    function pemesanan()
    {
        $user = $this->session->userdata('nama');
        $status = ['status_pemesanan' => 0];
        $pemesanan = $this->m_pemesanan->getpemesanantoko($status);
        $d = [
            'name' => $user,
            'pemesanan' => $pemesanan
        ];
        $this->load->view('layouts/pt/header', $d);
        $this->load->view('layouts/pt/navigation');
        $this->load->view('pemilik_toko/pemesanan', $d);
        $this->load->view('layouts/pt/footer');
    }

    function tambahpemesanan()
    {
        $nama = $this->session->userdata('nama');
        $d = [
            'name' => $nama,
            'kbrg' => $this->kbrg->data_kbrg()
        ];
        $this->form_validation->set_rules('jbrg', 'Jumlah Barang', 'trim|required|greater_than[199]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/pt/header', $d);
            $this->load->view('layouts/pt/navigation');
            $this->load->view('pemilik_toko/tambah_pemesanan', $d);
            $this->load->view('layouts/pt/footer');
        } else {
            $login = $this->session->userdata('id_pengguna');
            $idpen = $this->m_pemesanan->maxpemesananid();
            $kbrg = $this->input->post('kbrg');
            $nbrg = $this->input->post('nbrg');
            $mbrg = $this->input->post('mbrg');
            $jbrg = $this->input->post('jbrg');
            $stat = ['status_pemesanan' => 0];
            $pesan = $this->m_pemesanan->getpemesanan($stat);
            $toko = $this->toko->gettoko();
            foreach ($pesan as $p) {
                $sp = $p['status_pemesanan'];
                $tk = $p['id_toko'];
                $idpesan = $p['id_pemesanan'];
            }

            foreach ($toko as $store) {
                if ($login == $store['id_pengguna']) {
                    $str = $store['id_toko'];
                }
            }
            if ($sp == null && $tk == null) {
                $data = [
                    'id_pemesanan' => $idpen,
                    'id_toko' => $str,
                    'status_pemesanan' => 0
                ];
                $this->m_pemesanan->insertpemesanan($data);
                $dpemesanan = $this->m_pemesanan->getpemesanan($stat);
                foreach ($dpemesanan as $dp) {
                    $idpesan = $dp['id_pemesanan'];
                }
                $data2 = [
                    'id_pemesanan' => $idpesan,
                    'id_ktgr_brg' => $kbrg,
                    'id_nama_barang' => $nbrg,
                    'id_merk_barang' => $mbrg,
                    'jmlh_pemesanan' => $jbrg
                ];
                $this->m_pemesanan->insertpemesanantoko($data2);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
                redirect('pt/C_pemilik_toko/pemesanan');
            } else {
                $data2 = [
                    'id_pemesanan' => $idpesan,
                    'id_ktgr_brg' => $kbrg,
                    'id_nama_barang' => $nbrg,
                    'id_merk_barang' => $mbrg,
                    'jmlh_pemesanan' => $jbrg
                ];
                $this->m_pemesanan->insertpemesanantoko($data2);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
                redirect('pt/C_pemilik_toko/pemesanan');
            }
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

    function pembayaran()
    {
        $user = $this->session->userdata('nama');
        $getid = $this->session->userdata('id_pengguna');
        $id = ['id_pengguna' => $getid];
        $idtoko = $this->toko->get1toko($id);
        $d = [
            'name' => $user,
            'toko' => $idtoko
        ];
        $this->load->view('layouts/pt/header', $d);
        $this->load->view('layouts/pt/navigation');
        $this->load->view('pemilik_toko/pembayaran', $d);
        $this->load->view('layouts/pt/footer');
    }

    function bayar()
    {
        $getid = $this->session->userdata('id_pengguna');
        $id = ['id_pengguna' => $getid];
        $idtoko = $this->toko->get1toko($id);
        foreach ($idtoko as $it) {
            $tk = $it['id_toko'];
        }

        $image  = $_FILES['image']['name'];
        if ($image) {
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/img/bukti_pembayaran/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $data = [
                    'bukti_pembayaran' => $new_image,
                    'status_pemesanan' => 1
                ];
                $where = ['id_toko' => $tk];
                $this->m_pemesanan->updatepemesanan($where, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima Kasih Atas Pemesannya</div>');
                redirect('pt/C_pemilik_toko/');
            }
        }
    }
}
