<?php


class SubfaktorController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SubfaktorModel', 'subfaktor');

		if (!$this->session->has_userdata('session_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'subfaktor' => $this->subfaktor->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('subfaktor/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'subfaktor_nama' => $this->input->post('subfaktor'),
				'subfaktor_faktor_id' => $id,
			);
			$this->subfaktor->tambah_subfaktor($data);
			redirect('faktor/lihat/'.$id);
		} else {
			$data['id'] = $id;
			$this->load->view('templates/header');
			$this->load->view('subfaktor/tambah',$data);
			$this->load->view('templates/footer');
		}
	}

	public function lihat($id)
	{
		$data = array(
			'subfaktor' => $this->subfaktor->lihat_satu($id)
		);
		$this->load->view('templates/header');
		$this->load->view('subfaktor/lihat', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'subfaktor_nama' => $this->input->post('subfaktor'),
			);
			$this->subfaktor->edit_subfaktor($id, $data);
			redirect('faktor');
		} else {
			$data = array(
				'subfaktor' => $this->subfaktor->lihat_satu($id)
			);
			$this->load->view('templates/header');
			$this->load->view('subfaktor/edit', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id)
	{
		$this->subfaktor->hapus_subfaktor($id);
		redirect('faktor');
	}
}
