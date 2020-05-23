<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_pengemudi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pengemudi');
    }

    function tampil_pengemudi()
    {
        $d = [
            'name'          => $this->session->userdata('nama'),
            'pengemudi'     => $this->pengemudi->data_pengemudi()
        ];
        $this->load->view('layouts/sa/header', $d);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/pengemudi/index', $d);
        $this->load->view('layouts/sa/footer');
    }

    function tambah_pengemudi()
    {
        $cek        = ['hak_akses' => 3];
        $pengguna   = $this->pengemudi->pengguna_pengemudi($cek);

        $d = [
            'name'          => $this->session->userdata('nama'),
            'pengemudi'     => $this->pengemudi->maxapengemudiid(),
            'user'          => $pengguna
        ];

        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('user', 'Pengguna', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Pengemudi', 'trim|required|valid_email');
        $this->form_validation->set_rules('tgll', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('image', 'Foto Pengemudi', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/pengemudi/tambah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $user       = $this->input->post('user');
            $email      = $this->input->post('email');
            $tgll       = $this->input->post('tgll');
            $nohp       = $this->input->post('nohp');

            $image      = $_FILES['image']['name'];
            if ($image) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/pengemudi/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $data       = [
                        'id_pengemudi'     => $id,
                        'email_pengemudi'  => $email,
                        'id_pengguna'      => $user,
                        'tanggal_lahir'    => $tgll,
                        'no_hp_penggemudi' => $nohp,
                        'foto_penggemudi'  => $new_image,
                    ];
                    $this->pengemudi->insert_pengemudi($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
                    redirect('sa/sa_pengemudi/tampil_pengemudi');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $error . '</div>');
                    redirect('sa/sa_pengemudi/tampil_pengemudi');
                }
            }
        }
    }

    function ubah_pengemudi($id)
    {
        $cek        = ['hak_akses' => 3];
        $pengguna   = $this->pengemudi->pengguna_pengemudi($cek);

        $d = [
            'name'           => $this->session->userdata('nama'),
            'pengemudi'      => $this->pengemudi->get1pengemudi($id),
            'user'           => $pengguna
        ];
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Pengemudi', 'trim|required|valid_email');
        //$this->form_validation->set_rules('user', 'Pengguna', 'trim|required');
        $this->form_validation->set_rules('tgll', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('image', 'Foto Pengemudi', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/sa/header', $d);
            $this->load->view('layouts/sa/navigation');
            $this->load->view('superA/pengemudi/ubah', $d);
            $this->load->view('layouts/sa/footer');
        } else {
            $id         = $this->input->post('id');
            $email      = $this->input->post('email');
            $user       = $this->input->post('user');
            $tgll       = $this->input->post('tgll');
            $nohp       = $this->input->post('nohp');
            $status     = $this->input->post('spengemudi');

            $image      = $_FILES['image']['name'];
            if ($image) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/pengemudi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $rmv = $this->pengemudi->get1pengemudi($id);
                    unlink(FCPATH . 'assets/img/pengemudi/' . $rmv[0]['foto_penggemudi']);
                    $new_image = $this->upload->data('file_name');
                    $data       = [
                        'email_pengemudi'  => $email,
                        'id_pengguna'      => $user,
                        'tanggal_lahir'    => $tgll,
                        'no_hp_penggemudi' => $nohp,
                        'foto_penggemudi'  => $new_image,
                        'status_pengemudi' => $status
                    ];
                    $this->pengemudi->ubahpengemudi($id, $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('sa/sa_pengemudi/tampil_pengemudi');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $error . '</div>');
                    redirect('sa/sa_pengemudi/tampil_pengemudi');
                }
            } else {
                $data       = [
                    'email_pengemudi'  => $email,
                    'id_pengguna'      => $user,
                    'tanggal_lahir'    => $tgll,
                    'no_hp_penggemudi' => $nohp,
                    'status_pengemudi' => $status
                ];
                $this->pengemudi->ubahpengemudi($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                redirect('sa/sa_pengemudi/tampil_pengemudi');
            }
        }
    }

    function hapus_pengemudi($id)
    {
        $data = $this->pengemudi->get1pengemudi($id);
        unlink(FCPATH . 'assets/img/pengemudi/' . $data[0]['foto_penggemudi']);
        $this->pengemudi->hapus_pengemudi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('sa/sa_pengemudi/tampil_pengemudi');
    }
}
