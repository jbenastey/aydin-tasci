<?php


class PertanyaanModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('pertanyaan');
		$this->db->join('faktor','faktor.faktor_id = pertanyaan.pertanyaan_faktor_id');
		$this->db->join('subfaktor','subfaktor.subfaktor_id = pertanyaan.pertanyaan_subfaktor_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_faktor($faktor)
	{
		$this->db->from('pertanyaan');
		$this->db->join('faktor','faktor.faktor_id = pertanyaan.pertanyaan_faktor_id');
		$this->db->join('subfaktor','subfaktor.subfaktor_id = pertanyaan.pertanyaan_subfaktor_id');
		$this->db->where('faktor_nama',$faktor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('pertanyaan');
		$this->db->where('pertanyaan_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_pertanyaan($data)
	{
		$this->db->insert('pertanyaan', $data);
	}

	public function edit_pertanyaan($id, $data)
	{
		$this->db->where('pertanyaan_id', $id);
		$this->db->update('pertanyaan', $data);
	}

	public function hapus_pertanyaan($id)
	{
		$this->db->where('pertanyaan_id', $id);
		$this->db->delete('pertanyaan');
	}
}
