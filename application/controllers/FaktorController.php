<?php


class FaktorController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('FaktorModel', 'faktor');
		$this->load->model('SubfaktorModel', 'subfaktor');

//		if (!$this->session->has_userdata('pengguna_id')) {
//			redirect(base_url('login'));
//		}
	}

	public function index()
	{
		$data = array(
			'faktor' => $this->faktor->lihat_semua(),
			'subfaktor' => $this->subfaktor->lihat_semua(),
		);
		$this->load->view('templates/header');
		$this->load->view('faktor/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'faktor_nama' => $this->input->post('faktor'),
			);
			$this->faktor->tambah_faktor($data);
			redirect('faktor');
		} else {
			$this->load->view('templates/header');
			$this->load->view('faktor/tambah');
			$this->load->view('templates/footer');
		}
	}

	public function lihat($id)
	{
		$data = array(
			'faktor' => $this->faktor->lihat_satu($id),
			'subfaktor' => $this->faktor->lihat_subfaktor($id)
		);
		$this->load->view('templates/header');
		$this->load->view('faktor/lihat', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'faktor_nama' => $this->input->post('faktor'),
			);
			$this->faktor->edit_faktor($id, $data);
			redirect('faktor');
		} else {
			$data = array(
				'faktor' => $this->faktor->lihat_satu($id)
			);
			$this->load->view('templates/header');
			$this->load->view('faktor/edit', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id)
	{
		$this->faktor->hapus_faktor($id);
		redirect('faktor');
	}
}
