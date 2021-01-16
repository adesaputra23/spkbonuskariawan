<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_pengguna');
		$this->db->join('tabel_level', 'tb_pengguna.id_level=tabel_level.id_level');
		$this->db->join('tb_kariawan', 'tb_kariawan.nik = tb_pengguna.nik', 'left' );
		$this->db->where('tb_pengguna.NIK', $post['nik']);
		$this->db->where('tb_pengguna.password', $post['password']);
		return $this->db->get();
		
	}

public function get_profil($nik)
	{
		$this->db->from('tb_pengguna');
		$this->db->join('tabel_level', 'tb_pengguna.id_level=tabel_level.id_level');
		$this->db->where('id_pengguna', $nik);
		return $this->db->get()->row();
	}

public function ambil_data($limit, $start)
	{
		$this->db->select('*');
		$this->db->join('tabel_level', 'tabel_level.id_level = tb_pengguna.id_level', 'right' );
		$this->db->join('tb_kariawan', 'tb_kariawan.nik = tb_pengguna.nik', 'right' );
		return $this->db->get('tb_pengguna',  $limit, $start)->result();
	}

public function ambil_data_cari($cari)
	{
		$this->db->select('*');
		$this->db->join('tabel_level', 'tabel_level.id_level = tb_pengguna.id_level', 'right' );
		$this->db->join('tb_kariawan', 'tb_kariawan.nik = tb_pengguna.nik', 'right' );
		$this->db->like('tb_pengguna.nik', $cari );
		return $this->db->get('tb_pengguna')->result();
	}

public function get_id_level()
	{
		$this->db->where('id_level', '3');
		return $this->db->count_all('tb_pengguna');
		
	}

public function edit($nik, $data)
	{
		$this->db->where('nik',$nik);
		return $this->db->update('tb_pengguna', $data);
	}

public function edit_pasword($nik, $data)
	{
		$this->db->where('id_pengguna',$nik);
		return $this->db->update('tb_pengguna', $data);
	}

public function update($id_pengguna, $data)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		return $this->db->update('tb_pengguna', $data);
	}

public function data_diri($nik)
	{
		$this->db->select('*');
		$this->db->join( 'tb_kariawan', 'tb_kariawan.nik = tb_pengguna.nik' , 'left' );
		$this->db->join ( 'tb_divisi', 'tb_divisi.kode_divisi = tb_kariawan.kode_divisi' , 'left' );
		return $this->db->get_where('tb_pengguna', array('tb_pengguna.nik' => $nik))->result(); 

	}

public function get_level()
	{
		return $this->db->get('tabel_level')->result();
	}

public function insert_data($data)
	{
		return $this->db->insert('tb_pengguna', $data);
	}

public function get_nik($nik)
	{
	 	$data = $this->db->get_where('tb_pengguna', array('nik' =>$nik));
	 	return $data->result();
	}

public function get_pw($id_pengguna)
	{
	 	$data = $this->db->get_where('tb_pengguna', ['id_pengguna' =>$id_pengguna]);
	 	return $data->row();
	}

public function hapus($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->delete('tb_pengguna');
	}




}

