<?php


class PertanyaanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PertanyaanModel', 'pertanyaan');
		$this->load->model('FaktorModel', 'faktor');

//		if (!$this->session->has_userdata('pengguna_id')) {
//			redirect(base_url('login'));
//		}
	}

	public function index()
	{
		$data = array(
			'pertanyaan' => $this->pertanyaan->lihat_semua(),
		);
		$this->load->view('templates/header');
		$this->load->view('pertanyaan/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'pertanyaan_isi' => $this->input->post('pertanyaan'),
				'pertanyaan_faktor_id' => $this->input->post('faktor'),
				'pertanyaan_subfaktor_id' => $this->input->post('subfaktor'),
			);
			$this->pertanyaan->tambah_pertanyaan($data);
			redirect('pertanyaan');
		} else {
			$data = array(
				'faktor' => $this->faktor->lihat_semua(),
			);
			$this->load->view('templates/header');
			$this->load->view('pertanyaan/tambah',$data);
			$this->load->view('templates/footer');
		}
	}

	public function lihat($id)
	{
		$data = array(
			'pertanyaan' => $this->pertanyaan->lihat_satu($id),
		);
		$this->load->view('templates/header');
		$this->load->view('pertanyaan/lihat', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'pertanyaan_isi' => $this->input->post('pertanyaan'),
				'pertanyaan_faktor_id' => $this->input->post('faktor'),
				'pertanyaan_subfaktor_id' => $this->input->post('subfaktor'),
			);
			$this->pertanyaan->edit_pertanyaan($id, $data);
			redirect('pertanyaan');
		} else {
			$data = array(
				'pertanyaan' => $this->pertanyaan->lihat_satu($id)
			);
			$this->load->view('templates/header');
			$this->load->view('pertanyaan/edit', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapus($id)
	{
		$this->pertanyaan->hapus_pertanyaan($id);
		redirect('pertanyaan');
	}

	public function get_subfaktor($id){
		$data=$this->faktor->lihat_subfaktor($id);
		echo json_encode($data);
	}
}