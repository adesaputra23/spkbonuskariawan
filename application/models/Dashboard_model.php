<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {


//admin dashboard
public function admin_get_kriteria()
        {
            $query = $this->db->get('tb_kriteria');
            if($query->num_rows()>0)
            {
            return $query->num_rows();
            }
            else
            {
            return 0;
            }
        }

    public function admin_get_kariawan()
        {
            $query = $this->db->get('tb_kariawan');
            if($query->num_rows()>0)
            {
            return $query->num_rows();
            }
            else
            {
            return 0;
            }
        }

    public function admin_get_penilaian()
        {
            $this->db->select('DISTINCT(tb_penilaian.nik)');
            $this->db->where('tahun', date('Y'));
            $this->db->from('tb_penilaian');
            $query = $this->db->get();
            if($query->num_rows()>0)
            {
            return $query->num_rows();
            }
            else
            {
            return 0;
            }
        }

        public function admin_get_user()
        {
            $query = $this->db->get('tb_pengguna');
            if($query->num_rows()>0)
            {
            return $query->num_rows();
            }
            else
            {
            return 0;
            }
        }
// end admin dashboard
public function ambil_data()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_ra,tahun');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->order_by('tb_kariawan.nama_kariawan', 'ASC');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get('tb_penilaian')->result();
    }

// kariawan dashborad    
public function kariawan_data($nik)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_cf,nilai_sf,nilai_total,nilai_ra');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->where('tb_penilaian.nik', $nik);
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get('tb_penilaian')->row();
    }

public function get_kriteria_penilaian($nik)
    {
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->where('tb_penilaian.nik', $nik);
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get()->result();
    }

public function get_kariawan($nik)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_kariawan');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->where('tb_kariawan.nik', $nik);
        return $this->db->get()->row();
    }

public function ambil_ra()
        {
            // $this->db->select('count(DISTINCT(nik))');
            $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_ra,jenis_kelamin');
            $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
            $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
            $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
            $this->db->order_by('tb_penilaian.nilai_ra', 'DESC');
            $this->db->where('tb_penilaian.tahun', date('Y'));
            return $this->db->get('tb_penilaian')->result();
        }

public function get_kriteria()
        {
            return $this->db->get('tb_kriteria')->result();
        }
// end kariawan dashboard

public function get_tahun()
    {
        $this->db->select('DISTINCT(tb_penilaian.tahun)');
        return $this->db->get('tb_penilaian')->result();
    }

public function ambil_data_tahun($tahun)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_ra,tahun');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->order_by('tb_kariawan.nama_kariawan', 'ASC');
        $this->db->where('tb_penilaian.tahun', $tahun);
        return $this->db->get('tb_penilaian')->result();
    }

public function get_pn_kr($nik)
    {
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->where('tb_penilaian.nik',$nik);
        $query  =   $this->db->get('tb_penilaian');
        return $query->result();
    }


}