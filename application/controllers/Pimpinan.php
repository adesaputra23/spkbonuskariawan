<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

    public function view_kriteria()
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

    public function view_divisi()
    {
        $config['base_url'] = site_url('Divisi/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_divisi'); //total row
        $config['per_page'] = 5;  //show record per halaman
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

		$data['dv'] = $this->Divisi_model->ambil_data($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Divisi/tampil_data',$data);
        $this->load->view('Template/foter');
    }

    public function view_kariyawan()
    {
        $config['base_url'] = site_url('Kariawan/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_kariawan'); //total row
        $config['per_page'] = 5;  //show record per halaman
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

		$data['kw'] = $this->Kariawan_model->ambil_data($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Kariawan/tampil_data',$data);
        $this->load->view('Template/foter');
    }

    public function laporan_penilaian()
    {
        $hitung = $this->Penilaian_model->ambil_distink();
    $config['base_url'] = site_url('Penilaian/index'); //site url
    $config['total_rows'] = $hitung->total; //total row
    $config['per_page'] = 5;  //show record per halaman
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
    $data['pagination'] = $this->pagination->create_links();

    $data['nl'] = $this->Penilaian_model->get();
    $data['gap'] = $this->Penilaian_model->ambil_data_gap();
    $data['kt'] = $this->Penilaian_model->keterangan();
    $data['gt_pn'] = $this->Penilaian_model->get_penilaian();
    $data['pn'] = $this->Penilaian_model->ambil_data($config["per_page"], $data['page']);

        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/tampil_data',$data);
        $this->load->view('Template/foter');
    }

    public function perangkingan()
    {
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
        $data['gr'] = $this->Dashboard_model->ambil_data();
		$data['gt_tn'] = $this->Dashboard_model->get_tahun();
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Dashboard/grafik',$data);
		$this->load->view('Template/foter');
		$this->load->view('Dashboard/Js/chard', $data);
    }


}