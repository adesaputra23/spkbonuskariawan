<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkingan_model extends CI_Model {

    public function get_kriteria()
        {
            return $this->db->get('tb_kriteria')->result();
        }
    
    public function cek_rangking()
    {
        $this->db->select('MAX(nilai_ra) as ra');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get('tb_penilaian')->row();

    }
    
    public function ambil_data()
        {
            // $this->db->select('count(DISTINCT(nik))');
            $this->db->select('DISTINCT(tb_penilaian.nik),nilai_ra,nama_kariawan,nama_divisi,tanggal,tahun,nik_tahun,jenis_kelamin,pendidikan');
            $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
            $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
            $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
            $this->db->group_by('tb_penilaian.nik_tahun');
            $this->db->order_by('tb_penilaian.nilai_ra', 'DESC');
            $this->db->where('tb_penilaian.tahun', date('Y'));
            return $this->db->get('tb_penilaian')->result();
        }
    
    public function ambil_data_gap()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik'); 
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->order_by('tb_penilaian.nilai_ra', 'ASC');
        return $this->db->get()->result();
    }

     public function get_penilaian()
    {
        $this->db->select('DISTINCT(tb_penilaian.tahun)');
        return $this->db->get('tb_penilaian')->result();
    }

    //get erangkingan tahun
    public function ambil_data_tahun($tahun)
        {
            // $this->db->select('count(DISTINCT(nik))');
            $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_ra,tahun,nik_tahun,jenis_kelamin,pendidikan');
            $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
            $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
            $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
            $this->db->order_by('tb_penilaian.nilai_ra', 'DESC');
            $this->db->where('tb_penilaian.tahun', $tahun);
            return $this->db->get('tb_penilaian')->result();
        }

    //get cari data perangkingan
    public function ambil_data_cari($cari)
        {
            // $this->db->select('count(DISTINCT(nik))');
            $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_ra,tahun,nik_tahun,
            jenis_kelamin,pendidikan');
            $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
            $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
            $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
            $this->db->order_by('tb_penilaian.nilai_ra', 'DESC');
            $this->db->like('tb_penilaian.nik',$cari);
            return $this->db->get('tb_penilaian')->result();
        }

}