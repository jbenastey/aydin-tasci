<?php

class AuthController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
	}
	public function login()
	{
		if ($this->session->has_userdata('pengguna_id')) {
			$this->session->set_flashdata('alert','sudah_login');
			redirect(base_url('beranda'));
		}
		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = array(
				'pengguna_username'=>$username,
				'pengguna_password'=>md5($password)
			);
			$cek = $this->AuthModel->cek($data);
			if ($cek != null) {
				$session = array(
					'session_id'=>$cek['pengguna_id'],
					'session_username'=>$cek['pengguna_username'],
					'session_nama'=>$cek['pengguna_nama'],
					'session_password'=>$cek['pengguna_password'],
					'session_level'=>$cek['pengguna_level']
				);
				$this->session->set_flashdata('alert', 'success_login');
				$this->session->set_userdata($session);
				redirect(base_url('beranda'));
			}else {
				$this->session->set_flashdata('alert', 'gagalLogin');
				redirect('login');
			}
		}


		$this->load->view('login');
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', 'logout_sukses');
		redirect(base_url('login'));
	}


	public function index(){
		$data = array(
			'pengguna' => $this->AuthModel->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('pengguna/index',$data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'pengguna_nama' => $this->input->post('nama'),
				'pengguna_username' => $this->input->post('username'),
				'pengguna_password' => md5($this->input->post('password')),
				'pengguna_level' => $this->input->post('level'),
			);
			$this->AuthModel->tambah_pengguna($data);
			redirect('pengguna');
		} else {
			$this->load->view('templates/header');
			$this->load->view('pengguna/tambah');
			$this->load->view('templates/footer');
		}
	}
	public function hapus($id)
	{
		$this->AuthModel->hapus_pengguna($id);
		redirect('pengguna');
	}
}
