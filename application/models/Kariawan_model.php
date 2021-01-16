<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kariawan_model extends CI_Model {

public function ambil_data($limit, $start)
	{
		$this->db->select('*');
		$this->db->join ( 'tb_divisi', 'tb_divisi.kode_divisi = tb_kariawan.kode_divisi' , 'left' );
		return $this->db->get('tb_kariawan',$limit, $start)->result();
	}

public function ambil_data_cari($cari)
	{
		$this->db->select('*');
		$this->db->join ( 'tb_divisi', 'tb_divisi.kode_divisi = tb_kariawan.kode_divisi' , 'left' );
		$this->db->like('tb_kariawan.nik',$cari);
		return $this->db->get('tb_kariawan')->result();
	}

public function getAll()
	{
		$this->db->select('*');
		$this->db->join ( 'tb_divisi', 'tb_divisi.kode_divisi = tb_kariawan.kode_divisi' , 'left' );
		return $this->db->get('tb_kariawan')->result();
	}

public function insert_data($data)
	{
		return $this->db->insert('tb_kariawan', $data);
	}

public function tampil_pribadi($nik)
	{
		$this->db->select('*');
		$this->db->join ( 'tb_divisi', 'tb_divisi.kode_divisi = tb_kariawan.kode_divisi' , 'left' );
		return $this->db->get_where('tb_kariawan', array('tb_kariawan.nik' => $nik))->result();
		 
	}

public function get($nik)
	{
		$data = $this->db->get_where('tb_kariawan', array('nik' => $nik));
		return $data->result();
	}

public function edit($nik, $data)
	{
		$this->db->where('nik', $nik);
		return $this->db->update('tb_kariawan', $data);

	}

public function hapus($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->delete('tb_kariawan');
	}

}