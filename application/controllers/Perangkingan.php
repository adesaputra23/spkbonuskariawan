<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkingan extends CI_Controller {

    public function index()
    {
        // $rang = $this->Perangkingan_model->cek_rangking();
        // $cek = substr($rang->ra, 0,2).'.78';
        // // die();
        // $data = $this->Perangkingan_model->ambil_data();
        // $no = 1;
        // foreach ($data as $key => $value) {
        //     if ($value->nilai_ra == $cek) {
        //         echo $a = $no++;
        //         if ($a == 1 || $a == 2) {
        //             echo $value->nama_kariawan;
        //             echo $value->nilai_ra;
        //         }
                
        //     }
            
        // }
        // die();
        $data['rank'] = $this->Perangkingan_model->cek_rangking();
        $data['gt_tn'] = $this->Perangkingan_model->get_penilaian();
        $data['kr'] = $this->Perangkingan_model->get_kriteria();
        $data['pn'] = $this->Perangkingan_model->ambil_data();
        $data['gap'] = $this->Perangkingan_model->ambil_data_gap();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Perangkingan/tampil_data', $data);
        $this->load->view('Template/foter');
    }

    public function get_tahun_perangkingan()
    {
        $tahun = $_REQUEST['tahun'];
        $data['tahun'] = $tahun;
        $data['rank'] = $this->Perangkingan_model->cek_rangking();
        $data['gt_tn'] = $this->Perangkingan_model->get_penilaian();
        $data['kr'] = $this->Perangkingan_model->get_kriteria();
        $data['pn'] = $this->Perangkingan_model->ambil_data_tahun($tahun);
        $data['gap'] = $this->Perangkingan_model->ambil_data_gap();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Perangkingan/tampil_tahun', $data);
        $this->load->view('Template/foter');
    }

    public function cari_perangkingan()
    {
        $cari = $this->input->get('keyword');
        $data['cari'] = $cari;
        $data['gt_tn'] = $this->Perangkingan_model->get_penilaian();
        $data['kr'] = $this->Perangkingan_model->get_kriteria();
        $data['pn'] = $this->Perangkingan_model->ambil_data_cari($cari);
        $data['gap'] = $this->Perangkingan_model->ambil_data_gap();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Perangkingan/cari',$data);
        $this->load->view('Template/foter');
    }

    public function perangkingan_pdf()
    {
        $data['rank'] = $this->Perangkingan_model->cek_rangking();
        $data['gt_tn'] = $this->Perangkingan_model->get_penilaian();
        $data['kr'] = $this->Perangkingan_model->get_kriteria();
        $data['pn'] = $this->Perangkingan_model->ambil_data();
        $data['gap'] = $this->Perangkingan_model->ambil_data_gap();
        $data['nama_file'] = 'Perangkingan Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Perangkingan/perangkingan_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

    public function perangkingan_tahun_pdf()
    {
        $tahun = $_REQUEST['tahun'];
        $data['tahun'] = $tahun;
        $data['rank'] = $this->Perangkingan_model->cek_rangking();
        $data['gt_tn'] = $this->Perangkingan_model->get_penilaian();
        $data['kr'] = $this->Perangkingan_model->get_kriteria();
        $data['pn'] = $this->Perangkingan_model->ambil_data_tahun($tahun);
        $data['gap'] = $this->Perangkingan_model->ambil_data_gap();
        $data['nama_file'] = 'Perangkingan Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Perangkingan/perangkingan_tahun_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

    public function perangkingan_cari_pdf()
    {
        $cari = $_REQUEST['cari'];
        $data['cari'] = $cari;
        $data['gt_tn'] = $this->Perangkingan_model->get_penilaian();
        $data['kr'] = $this->Perangkingan_model->get_kriteria();
        $data['pn'] = $this->Perangkingan_model->ambil_data_cari($cari);
        $data['gap'] = $this->Perangkingan_model->ambil_data_gap();
        $data['nama_file'] = 'Perangkingan Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Perangkingan/perangkingan_cari_pdf',$data);
        $this->load->view('print_pdf/footer');
    }

    public function test()
    {
        
        $this->db->select('nik,SUM(nilai) as total');
        $this->db->from('tb_penilaian');
        $this->db->where('nik', "12312");
        $data = $this->db->get()->row();
            echo $data->total;
    }

}