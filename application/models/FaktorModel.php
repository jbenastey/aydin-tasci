<?php


class FaktorModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('faktor');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('faktor');
		$this->db->where('faktor_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function lihat_subfaktor($id)
	{
		$this->db->from('faktor');
		$this->db->join('subfaktor','subfaktor.subfaktor_faktor_id = faktor.faktor_id');
		$this->db->where('faktor_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_faktor($data)
	{
		$this->db->insert('faktor', $data);
	}

	public function edit_faktor($id, $data)
	{
		$this->db->where('faktor_id', $id);
		$this->db->update('faktor', $data);
	}

	public function hapus_faktor($id)
	{
		$this->db->where('faktor_id', $id);
		$this->db->delete('faktor');
	}

	public function cek_faktor($nama){
		$this->db->from('faktor');
		$this->db->where('faktor_nama', strtolower($nama));
		$query = $this->db->get();
		return $query->num_rows();
	}
}
