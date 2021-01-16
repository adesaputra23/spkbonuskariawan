<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

public function index()
	{
		$data['jml_penilaian'] = $this->Dashboard_model->admin_get_penilaian();
		$data['jml_pengguna'] = $this->Dashboard_model->admin_get_user();
		$data['jml_kriteria'] = $this->Dashboard_model->admin_get_kriteria();
		$data['jml_kariawan'] = $this->Dashboard_model->admin_get_kariawan();
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Dashboard/index', $data);
		$this->load->view('Template/foter');
	}

public function kariawan_index()
	{
		$nik = $this->session->userdata('nik');
		$data['rank'] = $this->Perangkingan_model->cek_rangking();
		// $cek = substr($rki->ra, 0,2).'.78';
		// $kr = $this->Dashboard_model->kariawan_data($nik);
		// $rk = $kr->nilai_ra;
		// 	if ($rk == $cek) {
		// 		echo $cek;
		// 	}
		// die();
		$data['ambil_ra'] = $this->Dashboard_model->ambil_ra();
		$data['get_kr_pn'] = $this->Dashboard_model->get_kriteria_penilaian($nik);
		$data['get_kariawan'] = $this->Dashboard_model->get_kariawan($nik);
		$data['kariawan_data'] = $this->Dashboard_model->kariawan_data($nik);
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Dashboard/kariawan_index',$data);
		$this->load->view('Template/foter');
	}

public function kriteria_kariawan()
	{
		 $config['base_url'] = site_url('Kriteria/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_kriteria'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
      

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '&raquo;';
        $config['prev_link']        = '&laquo;';

        $config['full_tag_open']    = '<div class="pagging text-right"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                $data['kt'] = $this->kriteria_model->ambil_data($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Kriteria/tampil_data',$data);
        $this->load->view('Template/foter');
	}

public function kariawan_perangkingan()
	{
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

public function grafik()
	{
		$tahun = $_REQUEST['tahun'];
		$data['tahun'] = date('Y');
		$data['gr'] = $this->Dashboard_model->ambil_data();
		$data['gt_tn'] = $this->Dashboard_model->get_tahun();
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Dashboard/grafik',$data);
		$this->load->view('Template/foter');
		$this->load->view('Dashboard/Js/chard', $data);
	}

public function grafik_tahun()
	{
		$tahun = $_REQUEST['tahun'];
		$data['tahun'] = $tahun;
		$data['gr'] = $this->Dashboard_model->ambil_data_tahun($tahun);
		$data['gt_tn'] = $this->Dashboard_model->get_tahun();
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Dashboard/grafik',$data);
		$this->load->view('Template/foter');
		$this->load->view('Dashboard/Js/chard', $data);
	}

public function data_nilai_kariawan()
	{
		$nik = $_REQUEST['nik'];
		$data['nk'] = $nik;
		$data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['cari']   =   $this->Dashboard_model->get_pn_kr($nik);
        $data['nl'] = $this->Penilaian_model->get();
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Dashboard/data_nilai_kariawan', $data);
        $this->load->view('Template/foter');

	}

public function data_nilai_kariawan_pdf()
	{
		$nik = $_REQUEST['nik'];
		$data['nk'] = $nik;
		$data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['cari']   =   $this->Dashboard_model->get_pn_kr($nik);
        $data['nl'] = $this->Penilaian_model->get();
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['nama_file'] = 'Grafik Pdf';
		$this->load->view('print_pdf/head', $data);
        $this->load->view('Dashboard/data_nilai_kariawan_pdf', $data);
		$this->load->view('print_pdf/footer');
	}

public function grafik_pdf()
	{
		$tahun = $_REQUEST['tahun'];
		$data['tahun'] = $tahun;
		$data['gr'] = $this->Dashboard_model->ambil_data_tahun($tahun);
		$data['gt_tn'] = $this->Dashboard_model->get_tahun();
		$data['nama_file'] = 'Grafik Pdf';
		$this->load->view('print_pdf/head', $data);
		$this->load->view('Dashboard/grafik_pdf',$data);
		$this->load->view('Dashboard/Js/chard', $data);
		$this->load->view('print_pdf/footer');
		
	}

public function grafik_tahun_pdf()
	{
		$tahun = $_REQUEST['tahun'];
		$data['tahun'] = $tahun;
		$data['gr'] = $this->Dashboard_model->ambil_data_tahun($tahun);
		$data['gt_tn'] = $this->Dashboard_model->get_tahun();
		$data['nama_file'] = 'Grafik Pdf';
		$this->load->view('print_pdf/head', $data);
		$this->load->view('Dashboard/grafik_pdf',$data);
		$this->load->view('Dashboard/Js/chard', $data);
		$this->load->view('print_pdf/footer');
		
	}



}