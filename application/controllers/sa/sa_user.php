<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sa_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('pengguna');
    }

    public function index()
    {
        $p = [
            'pengguna' => $this->pengguna->tampil_pengguna(),
            'name' => $this->session->userdata('nama')
        ];
        $this->load->view('layouts/sa/header', $p);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/user/index', $p);
        $this->load->view('layouts/sa/footer');
    }

    public function form_tambah_akun()
    {
        $isi = [
            'id' => $this->user->lastid(),
            'name' => $this->session->userdata('nama')
        ];
        $this->load->view('layouts/sa/header', $isi);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/user/tambah', $isi);
        $this->load->view('layouts/sa/footer');
    }

    public function tambah_pengguna()
    {
        $this->form_validation->set_rules('namal', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
            'matches'       => 'Password Tidak Sama',
            'min_length'    => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]');
        $this->form_validation->set_rules('hak', 'Hak Akses', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->form_tambah_akun();
        } else {
            $id = $this->input->post('id_pengguna');
            $data1 = [
                'id_pengguna'       => $id,
                'nama'              => $this->input->post('namal'),
                'umur'              => $this->input->post('umur'),
                'alamat_pengguna'   => $this->input->post('alamat'),
            ];
            $data2 = [
                'id_pengguna'       => $id,
                'username'          => htmlspecialchars($this->input->post('username', true)),
                'password'          => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'hak_akses'         => $this->input->post('hak')
            ];
            $this->pengguna->insert_pengguna($data1);
            $this->user->insert_data_akun($data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Dibuat</div>');
            redirect('sa/sa_user');
        }
    }

    public function form_ubah_akun($id)
    {
        $data = $this->pengguna->get1_pengguna($id);
        $isi = [
            'pengguna' => $data,
            'name' => $this->session->userdata('nama')
        ];
        $this->load->view('layouts/sa/header', $isi);
        $this->load->view('layouts/sa/navigation');
        $this->load->view('superA/user/ubah', $isi);
        $this->load->view('layouts/sa/footer');
    }

    public function ubah_pengguna($id)
    {
        $this->form_validation->set_rules('namal', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
            'matches'       => 'Password Tidak Sama',
            'min_length'    => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]');
        $this->form_validation->set_rules('hak', 'Hak Akses', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->form_ubah_akun($id);
        } else {
            $npw    = $this->input->post('password1');
            $data1  = [
                'nama'              => $this->input->post('namal'),
                'umur'              => $this->input->post('umur'),
                'alamat_pengguna'   => $this->input->post('alamat'),
            ];
            $data2 = [
                'username'          => htmlspecialchars($this->input->post('username', true)),
                'password'          => password_hash($npw, PASSWORD_DEFAULT),
                'hak_akses'         => $this->input->post('hak')
            ];
            $where = ['id_pengguna' => $id];
            $this->pengguna->update_pengguna($where, $data1);
            $this->user->update_data_akun($where, $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Diubah</div>');
            redirect('sa/sa_user');
        }
    }

    public function hapus_pengguna($id)
    {
        $this->pengguna->hapus_pengguna($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
        redirect('sa/sa_user');
    }
}
