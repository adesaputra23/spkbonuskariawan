<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

public function index()
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
		$this->load->view('Kriteria/tampil_data', $data);
		$this->load->view('Template/foter');
	}

public function tambah_data()
        {
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Kriteria/tambah_data');
                $this->load->view('Template/foter');
        }

public function proses_tambah()
        {
                // $data = $this->kriteria_model->sum();
                // var_dump($data);
                // die();
                        
               $kode_kriteria   = $this->input->post('kode_kriteria');
               $nama_kriteria   = $this->input->post('nama_kriteria');
               $jf              = $this->input->post('jf');
               $nilai_target    = $this->input->post('nilai_target');
               $nilai_persen    = $this->input->post('nilai_persen');
               $hasil = $nilai_persen + $this->kriteria_model->sum();
               if ($hasil > 100) {
                       $hasil = 0;
               }else{
                       $hasil = $nilai_persen;
               }
               
                $data = array(
                        'kode_kriteria' => $kode_kriteria,
                        'nama_kriteria' => $nama_kriteria,
                        'jenis_faktor'  => $jf,
                        'nilai_target'  => $nilai_target,
                        'nilai_persen'  => $hasil
                        );


                $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
                $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
                $this->form_validation->set_rules('jf', 'Jenis Faktor', 'required');
                $this->form_validation->set_rules('nilai_target', 'Nilai Target', 'required');
                $this->form_validation->set_rules('kode_kriteria','Kode Kriteria','is_unique[tb_kriteria.kode_kriteria]');



                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('is_unique', 'Data %s sudah di gunakan');


                if ($this->form_validation->run()) {
                      if ($data['nilai_persen'] == 0){
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong> Eroor! Data Gagal di Tambah </strong><br>Nilai Persen dengan jumlah <strong>'.$nilai_persen .'%</strong> melebihi batas maximal.</div>');
                        redirect('Kriteria');
                     }elseif($this->kriteria_model->insert_data($data)){
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Kode Kriteria <strong>'.$this->session->userdata('kode_kriteria') .'</strong> Berhasil di Tambahkan.</div>');
                                                     redirect('Kriteria');
                              }
                
                }else{
                        $this->load->view('Template/head');
                        $this->load->view('Template/nav');
                        $this->load->view('Kriteria/tambah_data');
                        $this->load->view('Template/foter');
                }

        }

public function edit($kode_kriteria)
        {
                // $hasil2 = $_REQUEST['hasil'];
                // $data = array('nilai_persen' => $hasil2);
                // $this->kriteria_model->edit($kode_kriteria, $data);

                $data['edit'] = $this->kriteria_model->get($kode_kriteria);
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Kriteria/ubah_data', $data);
                $this->load->view('Template/foter');
        }

public function proses_edit($kode_kriteria)
        {
                // $data = $this->kriteria_model->sum();
                // var_dump($data);
                // die();
                $hasil = $_REQUEST['hasil'];
                $kode_kriteria   = $this->input->post('kode_kriteria');
                $nama_kriteria   = $this->input->post('nama_kriteria');
                $jf              = $this->input->post('jf');
                $nilai_target    = $this->input->post('nilai_target');
                $nilai_persen    = $this->input->post('nilai_persen');
                //$hasil = $hasil2;
                
                if ($sw = $hasil + $nilai_persen > 100) {
                        $sw = 0;
                }elseif ($sw = $hasil < 100) {
                        $sw = $nilai_persen;
                }
                
                // $tambah = $nilai_persen + $this->kriteria_model->sum();
                // $kurang = $nilai_persen - $this->kriteria_model->sum();
                
                $data = array(
                        'kode_kriteria' => $kode_kriteria,
                        'nama_kriteria' => $nama_kriteria,
                        'jenis_faktor'  => $jf,
                        'nilai_target'  => $nilai_target,
                        'nilai_persen'  => $sw );

                $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
                $this->form_validation->set_rules('jf', 'Jenis Faktor', 'required');
                $this->form_validation->set_rules('nilai_target', 'Nilai Target', 'required');

                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');

                if ($this->form_validation->run()) {
                        if ($data['nilai_persen'] == 0) {
                                $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong> Eroor! Kode Kriteria '.$data['kode_kriteria'].' Gagal di Ubah </strong><br>Nilai Persen dengan jumlah <strong>'.$nilai_persen .'%</strong> melebihi batas maximal.</div>');
                                redirect('Kriteria');
                        }elseif($data['nilai_persen'] < 100){
                                $this->kriteria_model->edit($kode_kriteria, $data);
                                $this->session->set_userdata($data);
                                $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong> Suksess! </strong>Kode Kriteria <strong>'.$this->session->userdata('kode_kriteria') .'</strong> Berhasil di Ubah.</div>');
                                redirect('Kriteria');
                                
                        }
                }else{
                        $data['edit'] = $this->kriteria_model->get($kode_kriteria);
                        $this->load->view('Template/head');
                        $this->load->view('Template/nav');
                        $this->load->view('Kriteria/ubah_data', $data);
                        $this->load->view('Template/foter');
                }

        }

public function hapus($kode_kriteria)
        {
                $data = array('kode_kriteria' => $kode_kriteria );

                if ($this->kriteria_model->hapus($kode_kriteria)) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Kode Kriteria <strong>'.$this->session->userdata('kode_kriteria') .'</strong> Berhasil di Hapus.</div>');
                    redirect('Kriteria');
                        
                }else{
                        echo "Data Gagal di Hapus";
                }
        }

public function jenis_faktor()
        {
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Kriteria/jenis_faktor');
                $this->load->view('Template/foter');
        }

public function nilai_gap()
        {
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Kriteria/nilai_gap');
                $this->load->view('Template/foter');
        }

public function nilai_kriteria()
        {
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Kriteria/nilai_kriteria');
                $this->load->view('Template/foter');
        }

public function kriteria_pdf()
        {
                $data['prn'] = $this->kriteria_model->get_print();
                $data['nama_file'] = "Kriteria Pdf";
                $this->load->view('print_pdf/head', $data);
                $this->load->view('Kriteria/prin_pdf',$data);
                $this->load->view('print_pdf/footer');
        }

public function kriteria_cari()
        {
                $keyword = $this->input->get('keyword');
                $data['kt'] = $this->kriteria_model->ambil_cari($keyword);
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Kriteria/kriteria_cari', $data);
                $this->load->view('Template/foter');

        }

	

}