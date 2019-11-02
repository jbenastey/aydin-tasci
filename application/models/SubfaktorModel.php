<?php


class SubfaktorModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_semua()
	{
		$this->db->from('subfaktor');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu($id)
	{
		$this->db->from('subfaktor');
		$this->db->where('subfaktor_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah_subfaktor($data)
	{
		$this->db->insert('subfaktor', $data);
	}

	public function edit_subfaktor($id, $data)
	{
		$this->db->where('subfaktor_id', $id);
		$this->db->update('subfaktor', $data);
	}

	public function hapus_subfaktor($id)
	{
		$this->db->where('subfaktor_id', $id);
		$this->db->delete('subfaktor');
	}
}
