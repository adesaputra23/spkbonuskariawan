<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kariawan extends CI_Controller {

public function index()
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
		$this->load->view('Kariawan/tampil_data', $data);
		$this->load->view('Template/foter');
    }

public function cari()
{
    $cari = $this->input->get('keyword');
    $data['kw'] = $this->Kariawan_model->ambil_data_cari($cari);
    $this->load->view('Template/head');
    $this->load->view('Template/nav');
    $this->load->view('Kariawan/cari', $data);
    $this->load->view('Template/foter');
}

public function kariawan_pdf()
{
    $data['kw'] = $this->Kariawan_model->getAll();
    $data['nama_file'] = "Kariawan Pdf";
    $this->load->view('print_pdf/head', $data);
    $this->load->view('Kariawan/kariawan_pdf', $data);
    $this->load->view('print_pdf/footer');
}

public function tambah_data()
	{
		$data['dv'] = $this->Divisi_model->getAll()->result();
		$this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Kariawan/tambah_data', $data);
        $this->load->view('Template/foter');
	}

public function proses_tambah()
	{
			   $nik  			= $this->input->post('nik');
			   $nama_kariawan	= $this->input->post('nama_kariawan');
			   $periode			= $this->input->post('periode');
			   $tempat_lahir  	= $this->input->post('tempat_lahir');
			   $tanggal_lahir  	= $this->input->post('tanggal_lahir');
			   $jenis_kelamin  	= $this->input->post('jenis_kelamin');
			   $agama  			= $this->input->post('agama');
			   $status  		= $this->input->post('status');
			   $alamat  		= $this->input->post('alamat');
			   $no_tlp  		= $this->input->post('no_tlp');
			   $pendidikan  	= $this->input->post('pendidikan');
			   $divisi  		= $this->input->post('divisi');

                $data = array(
                        'nik' => $nik,
                        'nama_kariawan' => $nama_kariawan,
                        'periode' => $periode,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'agama' => $agama,
                        'status' => $status,
                        'alamat' => $alamat,
                        'no_tlp' => $no_tlp,
                        'pendidikan' => $pendidikan,
                        'kode_divisi' => $divisi
                        );
      
                $this->form_validation->set_rules('nama_kariawan', 'Nama Kariawan', 'required');
                $this->form_validation->set_rules('periode', 'Periode', 'required');
                $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
                $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
                $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
                $this->form_validation->set_rules('agama', 'Agama', 'required');
                $this->form_validation->set_rules('status', 'Status', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('no_tlp', 'No Hp/Wa', 'required');
                $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
                $this->form_validation->set_rules('nik','NIK','required|is_unique[tb_kariawan.nik]');

                $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
                $this->form_validation->set_message('is_unique', 'Data %s sudah di gunakan');


                if ($this->form_validation->run()) {
                      if ($this->Kariawan_model->insert_data($data)) {
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>NIK <strong>'.$this->session->userdata('nik') .'</strong> Berhasil di Tambahkan.</div>');
                                                     redirect('Kariawan');
                      }else {
                        echo "Data Gagal di Tambahkan";
                      }  
                
                }else{
                		$data['dv'] = $this->Divisi_model->getAll()->result();
                        $this->load->view('Template/head');
                        $this->load->view('Template/nav');
                        $this->load->view('Kariawan/tambah_data', $data);
                        $this->load->view('Template/foter');
                }
	}

public function edit($nik)
    {
        $data['dv'] = $this->Divisi_model->getAll()->result();
        $data['kr'] = $this->Kariawan_model->tampil_pribadi($nik);
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Kariawan/edit_data', $data);
        $this->load->view('Template/foter');
    }

public function proses_edit($nik)
    {
        $nik            = $this->input->post('nik');
        $nama_kariawan   = $this->input->post('nama_kariawan');
        $periode         = $this->input->post('periode');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $jenis_kelamin   = $this->input->post('jenis_kelamin');
        $agama           = $this->input->post('agama');
        $status          = $this->input->post('status');
        $alamat          = $this->input->post('alamat');
        $no_tlp          = $this->input->post('no_tlp');
        $pendidikan      = $this->input->post('pendidikan');
        $divisi          = $this->input->post('divisi');

        $data = array(
                        'nik' => $nik,
                        'nama_kariawan' => $nama_kariawan,
                        'periode' => $periode,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'agama' => $agama,
                        'status' => $status,
                        'alamat' => $alamat,
                        'no_tlp' => $no_tlp,
                        'pendidikan' => $pendidikan,
                        'kode_divisi' => $divisi
                        );

        $this->form_validation->set_rules('nama_kariawan', 'Nama Kariawan', 'required');
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Hp/Wa', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');

        $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');

        if ($this->form_validation->run()) {
             if ($this->Kariawan_model->edit($nik, $data)) {
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>NIK <strong>'.$this->session->userdata('nik') .'</strong> Berhasil di Ubah.</div>');
                                                     redirect('Kariawan');
                      }else {
                        echo "Data Gagal di Ubah";
                      }  

        }else{
            echo "Data Tidak di Temukan";
        }

    }

public function hapus($nik)
    {
        $data = array('nik' => $nik);
         if ($this->Kariawan_model->hapus($nik)) {
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>NIK <strong>'.$this->session->userdata('nik') .'</strong> Berhasil di Hapus.</div>');
                                                     redirect('Kariawan');
                      }else {
                        echo "Data Gagal di hapus";
                      }  

    }

public function tampil_pribadi($nik)
	{
		$data['pr'] = $this->Kariawan_model->tampil_pribadi($nik);
		$this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Kariawan/tampil_pribadi', $data);
        $this->load->view('Template/foter');
	}


}