<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

public function index()
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
		$this->load->view('Divisi/tampil_data', $data);
		$this->load->view('Template/foter');
        }

public function cari()
        {
                $cari = $this->input->get('keyword');
                $data['dv'] = $this->Divisi_model->ambil_data_cari($cari);
                $this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Divisi/cari_data', $data);
		$this->load->view('Template/foter');

        }

public function divisi_pdf()
        {
                $data['dv'] = $this->Divisi_model->getAll()->result();
                $data['nama_file'] = "Divisi Pdf";
                $this->load->view('print_pdf/head', $data);
		$this->load->view('Divisi/divisi_pdf', $data);
                $this->load->view('print_pdf/footer');
        }

public function tambah_data()
	{
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Divisi/tambah_data');
		$this->load->view('Template/foter');
	}

public function proses_tambah()
        {
               $kode_divisi   = $this->input->post('kode_divisi');
               $nama_divisi   = $this->input->post('nama_divisi');

                $data = array(
                        'kode_divisi' => $kode_divisi,
                        'nama_divisi' => $nama_divisi
                        );

                $this->form_validation->set_rules('kode_divisi', 'Kode Divisi', 'required');
                $this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required');
                $this->form_validation->set_rules('kode_divisi','Kode Divisi','is_unique[tb_divisi.kode_divisi]');

                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('is_unique', 'Data %s sudah di gunakan');

                if ($this->form_validation->run()) {
                      if ($this->Divisi_model->insert_data($data)) {
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Kode Divisi <strong>'.$this->session->userdata('kode_divisi') .'</strong> Berhasil di Tambahkan.</div>');
                                                     redirect('Divisi');
                      }else {
                        echo "Data Gagal di Tambahkan";
                      }  
                
                }else{
                        $this->load->view('Template/head');
                        $this->load->view('Template/nav');
                        $this->load->view('Divisi/tambah_data');
                        $this->load->view('Template/foter');
                }

        }

public function edit($kode_divisi)
        {
                $data['edit'] = $this->Divisi_model->get($kode_divisi);
                $this->load->view('Template/head');
                $this->load->view('Template/nav');
                $this->load->view('Divisi/ubah_data', $data);
                $this->load->view('Template/foter');
        }

public function proses_edit($kode_divisi)
        {

               $kode_divisi   = $this->input->post('kode_divisi');
               $nama_divisi   = $this->input->post('nama_divisi');

                $data = array(
                        'kode_divisi' => $kode_divisi,
                        'nama_divisi' => $nama_divisi
                        );

                $this->form_validation->set_rules('kode_divisi', 'Kode Divisi', 'required');
                $this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required');

                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');

                if ($this->form_validation->run()) {

                        if ($this->Divisi_model->edit($kode_divisi, $data)) {
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Kode Divisi <strong>'.$this->session->userdata('kode_divisi') .'</strong> Berhasil di Ubah.</div>');
                                                     redirect('Divisi');
                        }else{
                                echo "Data Gagal di Ubah";
                        }
                }else{
                        $data['edit'] = $this->Divisi_model->get($kode_divisi);
                        $this->load->view('Template/head');
                        $this->load->view('Template/nav');
                        $this->load->view('Divisi/ubah_data', $data);
                        $this->load->view('Template/foter');
                }

        }

public function hapus($kode_divisi)
	{
		$data = array('kode_divisi' => $kode_divisi );

                if ($this->Divisi_model->hapus($kode_divisi)) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Kode Divisi <strong>'.$this->session->userdata('kode_divisi') .'</strong> Berhasil di Hapus.</div>');
                    redirect('Divisi');
                        
                }else{
                        echo "Data Gagal di Hapus";
                }
	}

}