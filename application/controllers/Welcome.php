<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->model('pengguna');
		$this->load->model('tujuan');
		$this->load->model('toko');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function cek()
	{
		$this->form_validation->set_rules('uname', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$this->validasi();
		}
	}

	private function validasi()
	{
		$username = $this->input->post('uname', TRUE);
		$password = $this->input->post('pass', TRUE);

		$user = ['username' => $username];
		$hasil = $this->user->cek_user($user);

		if ($hasil) {
			if (password_verify($password, $hasil['password'])) {
				$data = [
					'username' 	=> $hasil['username'],
					'nama' 		=> $hasil['nama'],
					'hak_akses' => $hasil['hal_akses'],
					'id_pengguna' => $hasil['id_pengguna']
				];
				$this->session->set_userdata($data);
				if ($hasil['hak_akses'] == 0) {
					redirect('sa/sa_halaman');
				} elseif ($hasil['hak_akses'] == 1) {
					redirect('ag/adminG_halaman');
				} elseif ($hasil['hak_akses'] == 2) {
					redirect('staf');
				} elseif ($hasil['hak_akses'] == 4) {
					redirect('pt/C_pemilik_toko');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Tidak Memiliki Akses</div>');
					redirect('welcome');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
				redirect('welcome');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Ditemukan</div>');
			redirect('welcome');
		}
	}

	public function registoko()
	{
		$d = [
			'id' 	=> $this->user->lastid(),
			'kota' 	=> $this->tujuan->data_tujuan(),
			'toko'	=> $this->toko->maxtokoid()
		];

		$this->form_validation->set_rules('namal', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('umur', 'Umur', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
			'matches'       => 'Password Tidak Sama',
			'min_length'    => 'Password Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]');
		$this->form_validation->set_rules('namat', 'Nama Toko', 'trim|required');
		$this->form_validation->set_rules('noteltoko', 'Nomor Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Jalan', 'trim|required');
		$this->form_validation->set_rules('tujuan', 'Alamat Kota', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration', $d);
		} else {
			$id  = $this->input->post('id_pengguna');
			$idt = $this->input->post('id_toko');
			$data1 = [
				'id_pengguna'       => $id,
				'nama'              => $this->input->post('namal'),
				'umur'              => $this->input->post('umur'),
			];
			$data2 = [
				'id_pengguna'       => $id,
				'username'          => htmlspecialchars($this->input->post('username', true)),
				'password'          => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'hak_akses'         => 4
			];
			$data3 = [
				'id_toko' 			=> $idt,
				'id_pengguna'   	=> $id,
				'nama_toko'     	=> $this->input->post('namat'),
				'alamat_toko'   	=> $this->input->post('alamat'),
				'id_tujuan'     	=> $this->input->post('tujuan'),
				'notel_toko'    	=> $this->input->post('noteltoko')
			];
			$this->pengguna->insert_pengguna($data1);
			$this->user->insert_data_akun($data2);
			$this->toko->inserttoko($data3);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Dibuat dan Toko Anda Telah Ditambahkan</div>');
			redirect('Welcome');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('hak_akses');
		session_destroy();
		redirect('Welcome');
	}
}
