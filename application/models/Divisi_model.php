<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi_model extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tb_divisi');
	}

	public function get($kode_divisi)
	{
		 $data = $this->db->get_where('tb_divisi', array('kode_divisi' => $kode_divisi));
		 return $data->result();
	}

	public function ambil_data($limit, $start)
	{
		return $this->db->get('tb_divisi', $limit, $start)->result();
	}

	public function ambil_data_cari($cari)
	{
		$this->db->like('kode_divisi', $cari);
		return $this->db->get('tb_divisi')->result();
	}

	public function insert_data($data)
	{
		return $this->db->insert('tb_divisi', $data);
	}

	public function hapus($kode_divisi)
	{
		$this->db->where('kode_divisi', $kode_divisi);
		return $this->db->delete('tb_divisi');
	}

	public function edit($kode_divisi, $data)
	{
		$this->db->where('kode_divisi', $kode_divisi);
		return $this->db->update('tb_divisi', $data);
	}
}