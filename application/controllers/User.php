<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function index()
	{
		$config['base_url'] = site_url('User/index'); //site url
        $config['total_rows'] = $this->User_model->get_id_level(); //total row
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

		$data['us'] = $this->User_model->ambil_data($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('User/tampil_data', $data);
		$this->load->view('Template/foter');
	}

	public function cari()
	{
		$cari = $this->input->get('keyword');
		$data['us'] = $this->User_model->ambil_data_cari($cari);
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('User/cari', $data);
		$this->load->view('Template/foter');

	}

	public function status_login()
		{
			$nik = $_REQUEST['nik'];
			$val = $_REQUEST['val'];

			if ($val == 1) {
				$status = 0;
			}else{
				$status = 1;
			}

			$data =  array(
				'nik'=>$nik,
				'status_login' => $status );


			if ($this->User_model->edit($nik, $data)) {
				$this->session->set_userdata($data);
				if ($this->session->userdata('status_login') == 1) {
					// echo "berhasil di aktifkan";
					$this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Penguna Dengan NIK <strong>'.$this->session->userdata('nik') .'</strong> Berhasil di <strong>Aktifkan.</strong></div>');
                                                     redirect('User');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Penguna Dengan NIK <strong>'.$this->session->userdata('nik') .'</strong> Berhasil di <strong>Non Aktifkan.</strong></div>');
                                                     redirect('User');
				}
				
			}else{
				echo "Data Gagal di Aktifkan";
			}


		}

	public function data_diri($nik)
		{
			$data['pr'] = $this->User_model->data_diri($nik);
			$this->load->view('Template/head');
			$this->load->view('Template/nav');
			$this->load->view('User/data_diri', $data);
			$this->load->view('Template/foter');
		}

	public function tambah_data()
		{
			$data['lv'] = $this->User_model->get_level();
			$this->load->view('Template/head');
			$this->load->view('Template/nav');
			$this->load->view('User/tambah_data', $data);
			$this->load->view('Template/foter');
			$this->load->view('User/Js/load_fil');
		}

	public function proses_tambah()
		{
			 
			 $nik  			= $this->input->post('nik');
			 $nama_pengguna	= $this->input->post('nama_pengguna');
			 $pasword		= $this->input->post('pasword');
			 $konfpw 		= $this->input->post('konfpw');
			 $status_login  = $this->input->post('status_login');
			 $id_level  	= $this->input->post('id_level');

			 $data = array(
                        'id_pengguna' => "",
                        'nik' => $nik,
                        'nama_pengguna' => $nama_pengguna,
                        'password' => $pasword,
                        'status_login' => $status_login,
						'id_level' => $id_level,
						'foto' => 'profil.png'
                                           );
			  $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');
              $this->form_validation->set_rules('pasword', 'Password', 'required');
              $this->form_validation->set_rules('konfpw', 'Konfirmasi Password', 'required|matches[pasword]');
              $this->form_validation->set_rules('status_login', 'Status Login', 'required');
              $this->form_validation->set_rules('id_level', 'Level', 'required');
              $this->form_validation->set_rules('nik','NIK','required|is_unique[tb_pengguna.nik]');

              $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');
              $this->form_validation->set_message('is_unique', 'Data %s sudah di gunakan');
              $this->form_validation->set_message('matches', '%s Salah');

              if ($this->form_validation->run()) {
              		if ($this->User_model->insert_data($data)) {
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Pengguna Dengan NIK <strong>'.$data['nik'].'</strong> Berhasil di Tambahkan.</div>');
                                                     redirect('User');
                      }else {
                        echo "Data Gagal di Tambahkan";
                      }  
                
                }else{
                        $data['lv'] = $this->User_model->get_level();
						$this->load->view('Template/head');
						$this->load->view('Template/nav');
						$this->load->view('User/tambah_data', $data);
						$this->load->view('Template/foter');
						$this->load->view('User/Js/load_fil');
                }

		}

	public function edit($nik)
		{
			$data['lv'] = $this->User_model->get_level();
			$data['pg'] = $this->User_model->get_nik($nik);
			$this->load->view('Template/head');
			$this->load->view('Template/nav');
			$this->load->view('User/edit_data', $data);
			$this->load->view('Template/foter');
		}

	public function proses_edit($id_pengguna)
		{
			$pw = $this->User_model->get_pw($id_pengguna);
			$id_pengguna    = $this->input->post('id_pengguna');
			$nik  			= $this->input->post('nik');
			$nama_pengguna	= $this->input->post('nama_pengguna');
			$pasword 		= $this->input->post('pasword');
			if ($pasword == "") {
				$pasword = $pw->password;
			}
			$konfpw 		= $this->input->post('konfpw');
			if ($konfpw != $pasword) {
				echo "gagal";
			}
			
			$status_login  = $this->input->post('status_login');
			$id_level  	= $this->input->post('id_level');

				$data = array(
                        'id_pengguna' => $id_pengguna,
                        'nik' => $nik,
                        'nama_pengguna' => $nama_pengguna,
                        'password' => $pasword,
                        'status_login' => $status_login,
						'id_level' => $id_level,
						'foto' => 'profil.png'
                         );

						if ($this->User_model->update($id_pengguna, $data)) {
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Pengguna Dengan NIK <strong>'.$data['nik'].'</strong> Berhasil di Ubah.</div>');
                                                     redirect('User');
                      }else {
                        echo "gagal";
                      }  

		}

	public function hapus($nik)
		{
		 $data = array('nik' => $nik);
         if ($this->User_model->hapus($nik)) {
                        $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Pengguna Dengan NIK <strong>'.$data['nik'].'</strong> Berhasil di Hapus.</div>');
                                                     redirect('User');
                      }else {
                        echo "Data Gagal di hapus";
                      }  
		}

	public function proses_ajax()
		{
			$nik = $this->input->get('nik');
			
			if ($jr = $this->db->get_where('tb_kariawan', array('nik' => $nik))->row()) {
				$data = array('nama_kariawan' => $jr->nama_kariawan, );
			}else{
				$data = null;
			}

			echo json_encode($data);
			
		}
	
	public function profil()
	{
		$nik = $_REQUEST['nik'];
		$data['pr'] = $this->User_model->get_profil($nik);
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('User/profil', $data);
		$this->load->view('Template/foter');
	}

	public function ubah_pasword()
	{
		$nik = $_REQUEST['nik'];
		$data['ps'] = $this->User_model->get_profil($nik);
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('User/ubah_pasword', $data);
		$this->load->view('Template/foter');
	}
	public function proses_ubah_pasword()
	{
		$pas1 = $this->input->post('pas1');
		$pas2 = $this->input->post('pas2');
		$nik = $_REQUEST['nik'];
		$data =  array(
				'id_pengguna'=>$nik,
				'password' => $pas1);
		
    	$this->form_validation->set_rules('pas1', 'Password', 'required');
		$this->form_validation->set_rules('pas2', 'Konfirmasi Password', 'required|matches[pas1]');
		
		$this->form_validation->set_message('matches', '%s Salah');
		$this->form_validation->set_message('required', '%s tidak boleh kososng');

		if ($this->form_validation->run()) {
			$this->User_model->edit_pasword($nik, $data);
			$this->session->set_userdata($data);
			 $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Berhasil! Pasword sudah diubah</div>');
                                                     redirect('User/profil/?nik='.$data['id_pengguna']);
                
			}else{
					$nik = $_REQUEST['nik'];
					$data['ps'] = $this->User_model->get_profil($nik);
					$this->load->view('Template/head');
					$this->load->view('Template/nav');
					$this->load->view('User/ubah_pasword', $data);
					$this->load->view('Template/foter');
			}

	}

	public function ubah_foto()
	{
		$nik = $_REQUEST['nik'];
		$data['ps'] = $this->User_model->get_profil($nik);
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('User/ubah_foto', $data);
		$this->load->view('Template/foter');
	}

	public function proses_ubah_foto()
	{

		$nik = $_REQUEST['nik'];

			$config['upload_path']          = './assets/img/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 2080;
	        $config['file_name']             = $nik.'nik';
	                
	        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('file'))
			        {
							$error = array('error' => $this->upload->display_errors());
							echo "gagal di simpan";
			        }
			        else
			        {
			                $upload_data = $this->upload->data();
							$file_name = $upload_data['file_name'];
							if ($file_name == '') {
								$data = array('id_pengguna' =>$nik,
												'foto' =>$file_name,
												 );
							}else {
								$data = array('id_pengguna' =>$nik,
												'foto' =>$file_name,
												 );
							}
					
					if ($this->User_model->edit_pasword($nik, $data)) {
						$this->session->set_userdata($data);
			 			$this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Berhasil! Foto sudah diubah</div>');
                                                     redirect('User/profil/?nik='.$data['id_pengguna']);
					}

					}
	}

	public function tentang_sistem()
	{
		$this->load->view('Template/head');
		$this->load->view('Template/nav');
		$this->load->view('Template/tentang_sistem');
		$this->load->view('Template/foter');
	}

}