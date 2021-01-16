<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

public function get($kode_kriteria)
	{
		 $data = $this->db->get_where('tb_kriteria', array('kode_kriteria' => $kode_kriteria));
		 return $data->result();
	}

public function ambil_data($limit, $start)
	{
			   $this->db->order_by('kode_kriteria', 'ASC');
		return $this->db->get('tb_kriteria',  $limit, $start)->result();
	}

public function ambil_cari($keyword)
	{
			   $this->db->like('kode_kriteria', $keyword);
		return $this->db->get('tb_kriteria')->result();
	}

public function get_print()
	{
		return $this->db->get('tb_kriteria')->result();
	}

public function insert_data($data)
	{
		return $this->db->insert('tb_kriteria', $data);
	}

public function hapus($kode_kriteria)
	{
		$this->db->where('kode_kriteria', $kode_kriteria);
		return $this->db->delete('tb_kriteria');
	}

public function edit($kode_kriteria, $data)
	{
		$this->db->where('kode_kriteria', $kode_kriteria);
		return $this->db->update('tb_kriteria', $data);
	}

public function sum()
	{
		$this->db->select('SUM(nilai_persen) As total');
        $this->db->from('tb_kriteria');
        return $this->db->get()->row()->total;
	}

public function sum_k()
	{
		$this->db->select('SUM(nilai_persen) As total');
        $this->db->from('tb_kriteria');
        return $this->db->get()->row()->total;
	}


}