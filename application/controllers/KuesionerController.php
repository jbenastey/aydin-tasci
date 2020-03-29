<?php

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader;

class KuesionerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('KuesionerModel', 'kuesioner');
		$this->load->model('FaktorModel', 'faktor');
		$this->load->model('PertanyaanModel', 'pertanyaan');
		$this->load->helper('kategori_helper');

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

	public function import(){
		if (isset($_POST['upload'])) {
			$upload = $this->kuesioner->upload_excel('excel');
			if ($upload['result'] == 'success') {
				$pertanyaan = $this->pertanyaan->lihat_semua();
				$reader = new Reader\Xlsx();
				$reader->setLoadSheetsOnly('dosen');
				$spreadsheet = $reader->load(FCPATH . '/assets/excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);
				$dataKuesioner = array();
				$detailKuesioner = array();
				$detailKode = array();
//				var_dump($kepala);
				foreach ($sheet[1] as $key => $value) {

					foreach ($pertanyaan as $value2){
						if ($value2['pertanyaan_jenis'] == 'dosen'){
							if (strtoupper($value) == $value2['pertanyaan_kode']){
								array_push($detailKode,array(
									'kode' => strtoupper($value),
									'id' => $value2['pertanyaan_id'],
								));
							}
						}
					}
				}

				$numrow = 1;
				foreach ($sheet as $key => $value) {

					if ($numrow > 1) {
						$kuesionerId = 'KUE-' . substr(time(), 6) . $key;

						array_push($dataKuesioner, array(
							'kuesioner_id' => $kuesionerId,
							'kuesioner_nama' => $value['A'],
							'kuesioner_nip_nik_nim' => $value['B'],
							'kuesioner_jabatan' => 'Dosen Pengajar',
							'kuesioner_fakultas' => jurusan($value['C']),
						));

						foreach ($detailKode as $key2 => $value2) {
//							var_dump($value2['kode']);
							if ($value2['kode'] == 'Q1'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['D'],
								));
							} elseif ($value2['kode'] == 'Q21'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['E'],
								));
							} elseif ($value2['kode'] == 'Q22'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['F'],
								));
							} elseif ($value2['kode'] == 'Q23'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['G'],
								));
							} elseif ($value2['kode'] == 'Q24'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['H'],
								));
							} elseif ($value2['kode'] == 'Q11'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['I'],
								));
							} elseif ($value2['kode'] == 'Q12'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['J'],
								));
							} elseif ($value2['kode'] == 'Q14'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['K'],
								));
							} elseif ($value2['kode'] == 'Q20'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['L'],
								));
							} elseif ($value2['kode'] == 'Q27'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['M'],
								));
							} elseif ($value2['kode'] == 'Q29'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['N'],
								));
							} elseif ($value2['kode'] == 'Q30'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['O'],
								));
							} elseif ($value2['kode'] == 'Q2'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['P'],
								));
							} elseif ($value2['kode'] == 'Q3'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['Q'],
								));
							} elseif ($value2['kode'] == 'Q4'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['R'],
								));
							} elseif ($value2['kode'] == 'Q5'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['S'],
								));
							} elseif ($value2['kode'] == 'Q6'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['T'],
								));
							} elseif ($value2['kode'] == 'Q7'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['U'],
								));
							} elseif ($value2['kode'] == 'Q8'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['V'],
								));
							} elseif ($value2['kode'] == 'Q9'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['W'],
								));
							} elseif ($value2['kode'] == 'Q13'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['X'],
								));
							} elseif ($value2['kode'] == 'Q16'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['Y'],
								));
							} elseif ($value2['kode'] == 'Q17'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['Z'],
								));
							} elseif ($value2['kode'] == 'Q10'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['AA'],
								));
							} elseif ($value2['kode'] == 'Q15'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['AB'],
								));
							} elseif ($value2['kode'] == 'Q26'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['AC'],
								));
							}
						}
					}
					$numrow++; // Tambah 1 setiap kali looping
				}

				$reader->setLoadSheetsOnly('mahasiswa');
				$spreadsheet = $reader->load(FCPATH . '/assets/excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);
//				var_dump($kepala);
				$detailKodeMhs = array();
				foreach ($sheet[1] as $key => $value) {

					foreach ($pertanyaan as $value2){
						if ($value2['pertanyaan_jenis'] == 'mahasiswa'){
							if (strtoupper($value) == $value2['pertanyaan_kode']){
								array_push($detailKodeMhs,array(
									'kode' => strtoupper($value),
									'id' => $value2['pertanyaan_id'],
								));
							}
						}
					}
				}
//				var_dump($detailKodeMhs);

				$numrow = 1;
				foreach ($sheet as $key => $value) {

					if ($numrow > 1) {
						$kuesionerId = 'KUE-' . substr(time(), 6) . $key;

						array_push($dataKuesioner, array(
							'kuesioner_id' => $kuesionerId,
							'kuesioner_nama' => $value['A'],
							'kuesioner_nip_nik_nim' => $value['B'],
							'kuesioner_jabatan' => 'Mahasiswa',
							'kuesioner_fakultas' => jurusan($value['C']),
						));

						foreach ($detailKodeMhs as $key2 => $value2) {
//							var_dump($value2['kode']);
							if ($value2['kode'] == 'Q24'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['D'],
								));
							} elseif ($value2['kode'] == 'Q11'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['E'],
								));
							} elseif ($value2['kode'] == 'Q12'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['F'],
								));
							} elseif ($value2['kode'] == 'Q30'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['G'],
								));
							} elseif ($value2['kode'] == 'Q2'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['H'],
								));
							} elseif ($value2['kode'] == 'Q3'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['I'],
								));
							} elseif ($value2['kode'] == 'Q4'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['J'],
								));
							} elseif ($value2['kode'] == 'Q5'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['K'],
								));
							} elseif ($value2['kode'] == 'Q6'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['L'],
								));
							} elseif ($value2['kode'] == 'Q7'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['M'],
								));
							} elseif ($value2['kode'] == 'Q8'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['N'],
								));
							} elseif ($value2['kode'] == 'Q9'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['O'],
								));
							} elseif ($value2['kode'] == 'Q16'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['P'],
								));
							} elseif ($value2['kode'] == 'Q17'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['Q'],
								));
							} elseif ($value2['kode'] == 'Q10'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['R'],
								));
							} elseif ($value2['kode'] == 'Q26'){
								array_push($detailKuesioner, array(
									'detail_kuesioner_id' => $kuesionerId,
									'detail_pertanyaan_id' => $value2['id'],
									'detail_jawaban' => $value['S'],
								));
							}
						}
					}
					$numrow++; // Tambah 1 setiap kali looping
				}
//				var_dump($dataKuesioner);
//				var_dump($detailKuesioner);
				$this->kuesioner->insert_excel('kuesioner',$dataKuesioner);
				$this->kuesioner->insert_excel('kuesioner_detail',$detailKuesioner);
				$this->session->set_flashdata('alert', 'import');
				redirect('kuesioner');
			} else {
				echo 'gagal';
			}
		}
	}
}
