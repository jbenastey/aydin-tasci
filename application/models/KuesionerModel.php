<?php


class KuesionerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('kuesioner');
//		$this->db->join('pengguna','pengguna.pengguna_id = kuesioner.kuesioner_pengguna_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_kuesioner($id)
	{
		$this->db->from('kuesioner');
		$this->db->join('pengguna','pengguna.pengguna_id = kuesioner.kuesioner_pengguna_id');
		$this->db->where('pengguna_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('kuesioner');
		$this->db->where('kuesioner_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_detail($id)
	{
		$this->db->from('kuesioner_detail');
		$this->db->join('kuesioner','kuesioner.kuesioner_id = kuesioner_detail.detail_kuesioner_id');
//		$this->db->join('pengguna','pengguna.pengguna_id = kuesioner.kuesioner_pengguna_id');
		$this->db->join('pertanyaan','pertanyaan.pertanyaan_id = kuesioner_detail.detail_pertanyaan_id');
		$this->db->where('detail_kuesioner_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_faktor($faktor)
	{
		$this->db->from('kuesioner_detail');
		$this->db->join('kuesioner','kuesioner.kuesioner_id = kuesioner_detail.detail_kuesioner_id');
//		$this->db->join('pengguna','pengguna.pengguna_id = kuesioner.kuesioner_pengguna_id');
		$this->db->join('pertanyaan','pertanyaan.pertanyaan_id = kuesioner_detail.detail_pertanyaan_id');
		$this->db->join('faktor','faktor.faktor_id = pertanyaan.pertanyaan_faktor_id');
		$this->db->where('faktor_nama', $faktor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_semua_detail()
	{
		$this->db->from('kuesioner_detail');
		$this->db->join('kuesioner','kuesioner.kuesioner_id = kuesioner_detail.detail_kuesioner_id');
//		$this->db->join('pengguna','pengguna.pengguna_id = kuesioner.kuesioner_pengguna_id');
		$this->db->join('pertanyaan','pertanyaan.pertanyaan_id = kuesioner_detail.detail_pertanyaan_id');
		$this->db->join('faktor','faktor.faktor_id = pertanyaan.pertanyaan_faktor_id');
//		$this->db->where('detail_kuesioner_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_detail_grafik($responden)
	{
		$this->db->from('kuesioner_detail');
		$this->db->join('kuesioner','kuesioner.kuesioner_id = kuesioner_detail.detail_kuesioner_id');
//		$this->db->join('pengguna','pengguna.pengguna_id = kuesioner.kuesioner_pengguna_id');
		$this->db->join('pertanyaan','pertanyaan.pertanyaan_id = kuesioner_detail.detail_pertanyaan_id');
		$this->db->join('faktor','faktor.faktor_id = pertanyaan.pertanyaan_faktor_id');
		$this->db->where('pertanyaan_jenis', $responden);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_kuesioner($data)
	{
		$this->db->insert('kuesioner', $data);
	}

	public function tambah_detail_kuesioner($data)
	{
		$this->db->insert('kuesioner_detail', $data);
	}

	public function edit_kuesioner($id, $data)
	{
		$this->db->where('kuesioner_id', $id);
		$this->db->update('kuesioner', $data);
	}

	public function hapus_kuesioner($id)
	{
		$this->db->where('kuesioner_id', $id);
		$this->db->delete('kuesioner');
	}

	public function upload_excel($file)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = FCPATH . '/assets/excel/import/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '2048';
		$config['overwrite'] = true;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload($file)) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_excel($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}
}
