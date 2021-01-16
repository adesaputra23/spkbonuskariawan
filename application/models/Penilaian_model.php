<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

    public function ambil_data($limit, $start)
    {
        // $this->db->select('count(DISTINCT(nik))');
        
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'DESC');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get('tb_penilaian', $limit, $start)->result();
    }

    public function ambil_data_pdf()
    {
        // $this->db->select('count(DISTINCT(nik))');
        
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'DESC');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get('tb_penilaian')->result();
    }

    public function get_penilaian()
    {
        $this->db->select('DISTINCT(tb_penilaian.tahun)');
        return $this->db->get('tb_penilaian')->result();
    }

    public function ambil_data_dsc()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->order_by('tb_penilaian.kode_kriteria', 'ASC');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get()->result();
    }

    public function ambil_distink()
    {
        $this->db->select('count(DISTINCT(nik)) as total');
        $this->db->from('tb_penilaian');
        return $this->db->get()->row();
    }


    public function ambil_data_core()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_cf,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'DESC');
        $this->db->where('tb_penilaian.jenis_faktor','Core');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get()->result();
    }

    public function ambil_data_secondary()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_sf,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'DESC');
        $this->db->where('tb_penilaian.jenis_faktor','Secondary');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get()->result();
    }

    public function ambil_data_sec_cor()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_sf,nilai_cf,nilai_total,tahun');
        $this->db->order_by('tb_penilaian.nik', 'DESC');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get()->result();
    }

    public function sum_core()
    {
        $this->db->select('nik,SUM(nilai_bobot) as total');
        $this->db->from('tb_penilaian');
        $this->db->where('jenis_faktor','Core');
        $this->db->where('tb_penilaian.tahun', date('Y'));
        return $this->db->get()->result();
    }

    public function ambil_data_gap()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik'); 
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->order_by('tb_penilaian.kode_kriteria', 'ASC');
        return $this->db->get()->result();
    }

    public function keterangan()
    {
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        return $this->db->get()->result();
    }

    public function get()
        {
            return $this->db->get('tb_kriteria')->result();
        }

    public function get_kr()
        {
            return $this->db->get('tb_kriteria')->result();   
        }

    public function get_kr_inputan()
        {
            $this->db->from('tb_kriteria');
            $this->db->join('tb_penilaian', 'tb_penilaian.kode_kriteria=tb_kriteria.kode_kriteria');
            $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
            return $this->db->get()->result();   
        }

    public function get_core_kriteria()
        {
                  
            return $this->db->get_where('tb_kriteria', array('jenis_faktor' => "Core"))->result();   
        }

    public function get_core()
    {
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->where('tb_kriteria.jenis_faktor','Core'); 
        return $this->db->get()->result();  
    }

    public function get_secondary()
    {
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->where('tb_kriteria.jenis_faktor','Secondary'); 
        return $this->db->get()->result();  
    }

    public function get_secondary_kriteria()
    {
              
        return $this->db->get_where('tb_kriteria', array('jenis_faktor' => "Secondary"))->result();   
    }

    public function auto_fill($nik)
        {
            $this->db->select('*');
            $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
            return $this->db->get_where('tb_kariawan', array('nik' => $nik))->row();
        }

    public function insert_data($result)
        {
            return $this->db->insert_batch('tb_penilaian', $result);
        }

    // function cari data
   public function get_cari($keyword)
    {
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->like('tb_penilaian.nik',$keyword);
        $this->db->or_like('tb_kariawan.nama_kariawan',$keyword);
        $query  =   $this->db->get('tb_penilaian');
        return $query->result();
    }

    // fungction untuk cari data
    public function ambil_data_dsc_cari($keyword)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->order_by('tb_penilaian.kode_kriteria', 'ASC');
        $this->db->where('tb_penilaian.nik',$keyword);
        return $this->db->get()->result();
    }

    public function ambil_data_core_cari($keyword)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_cf,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'ASC');
        $this->db->where('tb_penilaian.jenis_faktor','Core');
        $this->db->where('tb_penilaian.nik',$keyword);
        return $this->db->get()->result();
    }

    public function ambil_data_secondary_cari($keyword)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_sf,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'ASC');
        $this->db->where('tb_penilaian.jenis_faktor','Secondary');
        $this->db->where('tb_penilaian.nik',$keyword);
        return $this->db->get()->result();
    }

    public function ambil_data_sec_cor_cari($keyword)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_sf,nilai_cf,nilai_total');
        $this->db->order_by('tb_penilaian.nik', 'ASC');
        $this->db->where('tb_penilaian.nik',$keyword);
        return $this->db->get()->result();
    }

    public function ambil_data_cari()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->select('*');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        return $this->db->get('tb_penilaian')->result();
    }

    // hapus data
    public function hapus($nik_tahun)
	{
		$this->db->where('nik_tahun', $nik_tahun);
		return $this->db->delete('tb_penilaian');
    }
    
    //pemangilan untuk menampilkan data yang ingin di edit
    public function data_edit($nik_tahun)
    {
        $this->db->select('*');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->where('tb_penilaian.nik_tahun', $nik_tahun);
        return $this->db->get('tb_penilaian')->row();
    }

    //function untuk menampilkan data result
    public function ambil_edit($nik_tahun)
    {
        $this->db->select('*');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->where('tb_penilaian.nik_tahun', $nik_tahun);
        return $this->db->get('tb_penilaian')->result();
    }

    //update multipe data
    public function update_data($result, $nik_tahun)
        {
            $this->db->update_batch('tb_penilaian', $result,$nik_tahun);
        }

    public function get_uniq()
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        return $this->db->get()->result();
    }

    // function tampil data tahun
    public function get_tahun($tahun)
    {
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->where('tb_penilaian.tahun',$tahun);
        $query  =   $this->db->get('tb_penilaian');
        return $query->result();
    }

    public function get_tn($tahun)
    {
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nik_tahun,tahun');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->like('tb_penilaian.tahun',$tahun);
        $query  =   $this->db->get('tb_penilaian');
        return $query->result();
    }

     public function ambil_data_dsc_tahun($tahun)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,tahun,nik_tahun');
        $this->db->order_by('tb_penilaian.kode_kriteria', 'ASC');
        $this->db->where('tb_penilaian.tahun',$tahun);
        return $this->db->get()->result();
    }

     public function ambil_data_core_tahun($tahun)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_cf,nik_tahun,tahun');
        $this->db->order_by('tb_penilaian.nik', 'ASC');
        $this->db->where('tb_penilaian.jenis_faktor','Core');
        $this->db->where('tb_penilaian.tahun',$tahun);
        return $this->db->get()->result();
    }

     public function ambil_data_secondary_tahun($tahun)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_sf,tahun,nik_tahun');
        $this->db->order_by('tb_penilaian.nik', 'ASC');
        $this->db->where('tb_penilaian.jenis_faktor','Secondary');
        $this->db->where('tb_penilaian.tahun',$tahun);
        return $this->db->get()->result();
    }

    public function ambil_data_sec_cor_tahun($tahun)
    {
        // $this->db->select('count(DISTINCT(nik))');
        $this->db->from('tb_penilaian');
        $this->db->join('tb_kariawan', 'tb_kariawan.nik=tb_penilaian.nik');
        $this->db->join('tb_divisi', 'tb_divisi.kode_divisi=tb_kariawan.kode_divisi');
        $this->db->join('tb_kriteria', 'tb_kriteria.kode_kriteria=tb_penilaian.kode_kriteria');
        $this->db->select('DISTINCT(tb_penilaian.nik),nama_kariawan,nama_divisi,tanggal,nilai_sf,nilai_cf,nilai_total,tahun');
        $this->db->order_by('tb_penilaian.nik', 'ASC');
        $this->db->where('tb_penilaian.tahun',$tahun);
        return $this->db->get()->result();
    }



    


}