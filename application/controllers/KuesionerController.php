<?php

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KuesionerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('KuesionerModel', 'kuesioner');
		$this->load->model('FaktorModel', 'faktor');
		$this->load->model('PertanyaanModel', 'pertanyaan');

//		if (!$this->session->has_userdata('session_id')) {
//			redirect(base_url('login'));
//		}
	}

	public function index()
	{
//		$cek = $this->kuesioner->cek_kuesioner($this->session->userdata('session_id'));
		$data = array(
			'kuesioner' => $this->kuesioner->lihat_semua(),
//			'cek' => $cek
		);
		$this->load->view('templates/header');
		$this->load->view('kuesioner/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah($responden)
	{
		if (isset($_POST['simpan'])) {
			$pertanyaan = $this->pertanyaan->lihat_semua();
			$dataDetail = null;
			$kuesionerId = 'KUE-' . substr(time(), 5);;
			foreach ($pertanyaan as $key => $value) {
				if ($value['pertanyaan_jenis'] == $responden) {
					$dataDetail = array(
						'detail_kuesioner_id' => $kuesionerId,
						'detail_pertanyaan_id' => $value['pertanyaan_id'],
						'detail_jawaban' => $this->input->post('pilihan' . $value['pertanyaan_id']),
					);
					$this->kuesioner->tambah_detail_kuesioner($dataDetail);
//					echo "<pre>";
//					print_r($dataDetail);
//					echo "</pre>";
				}
			}
//			die;
			$data = array(
				'kuesioner_id' => $kuesionerId,
				'kuesioner_nama' => $this->input->post('nama'),
				'kuesioner_nip_nik_nim' => $this->input->post('nik'),
				'kuesioner_jabatan' => $this->input->post('jabatan'),
				'kuesioner_fakultas' => $this->input->post('fakultas'),
			);
//			echo "<pre>";
//			print_r ($data);
//			echo "</pre>";die;

			$this->kuesioner->tambah_kuesioner($data);
			$this->session->set_flashdata('alert', 'isi_kuesioner');
			redirect(base_url());
//			$this->pertanyaan->tambah_pertanyaan($data);
//			redirect('pertanyaan');
		} else {
			$data = array(
				'faktor' => $this->faktor->lihat_semua(),
				'pertanyaan' => $this->pertanyaan->lihat_semua(),
			);
			$this->load->view('templates/header');
			$this->load->view('kuesioner/tambah', $data);
			$this->load->view('templates/footer');
		}
	}

	public function lihat($id){
		$data = array(
			'faktor' => $this->faktor->lihat_semua(),
			'pertanyaan' => $this->pertanyaan->lihat_semua(),
			'kuesioner' => $this->kuesioner->lihat_satu($id),
			'detail' => $this->kuesioner->lihat_detail($id),
		);
		$this->load->view('templates/header');
		$this->load->view('kuesioner/lihat', $data);
		$this->load->view('templates/footer');
	}

	public function excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');

		$writer = new Xlsx($spreadsheet);
		$writer->save('hello world.xlsx');
	}
}
