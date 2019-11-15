<?php


class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('FaktorModel', 'faktor');
		$this->load->model('SubfaktorModel', 'subfaktor');
		$this->load->model('KuesionerModel', 'kuesioner');
		$this->load->model('PertanyaanModel', 'pertanyaan');
		$this->load->helper('kategori');

		if (!$this->session->has_userdata('session_id')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'faktor' => $this->faktor->lihat_semua(),
			'subfaktor' => $this->subfaktor->lihat_semua(),
			'kuesioner' => $this->kuesioner->lihat_semua(),
			'pertanyaan' => $this->pertanyaan->lihat_semua(),
			'detail' => $this->kuesioner->lihat_semua_detail(),
		);
		$this->load->view('templates/header');
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($responden,$faktor)
	{
		$data = array(
			'faktor' => $faktor,
			'pertanyaan' => $this->pertanyaan->lihat_faktor($faktor),
			'jawaban' => $this->kuesioner->lihat_faktor($faktor),
			'responden' => $responden
		);
		$this->load->view('templates/header');
		$this->load->view('laporan/detail', $data);
		$this->load->view('templates/footer');
	}
}
