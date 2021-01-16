<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function index()
	{
		$this->load->view('Auth/index');
	}

public function proses_login()
	{
		$post = $this->input->post(null, true);
		if (isset($post['login'])) {
			$this->load->model('user_model');
			$query = $this->user_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$param  = array(
					'id_pengguna' => $row->id_pengguna, 
					'nik' => $row->nik , 
					'nama_pengguna' => $row->nama_pengguna, 
					'status_login' => $row->status_login,
					'nama_level' => $row->nama_level,
					'id_level' => $row->id_level
				);


				if ($row->status_login == 1) {
					if ($row->id_level == 1) {
						$this->session->set_userdata($param);
						echo ("<script LANGUAGE='JavaScript'>
								window.alert('Login berhasil');
								window.location.href='" .base_url('Dashboard'). "';
							</script>");
					}elseif ($row->id_level == 2) {
						$this->session->set_userdata($param);
						echo ("<script LANGUAGE='JavaScript'>
								window.alert('Login berhasil');
								window.location.href='" .base_url('Dashboard'). "';
							</script>");
					}elseif ($row->id_level == 3) {
						$this->session->set_userdata($param);
						echo ("<script LANGUAGE='JavaScript'>
								window.alert('Login berhasil');
								window.location.href='" .base_url('Dashboard/kariawan_index'). "';
							</script>");
					}
					
				}else{
					echo ("<script LANGUAGE='JavaScript'>
    					window.alert('Login gagal Status login anda belum di aktifkan');
    					window.location.href='" .base_url('auth/index'). "';
   					 </script>");
				}
			}else{
					echo ("<script LANGUAGE='JavaScript'>
    					window.alert('Login gagal NIK dan pasword salah');
    					window.location.href='" .base_url('auth/index'). "';
   					 </script>");
			}
		}
	}

public function Logout()
	{
		session_start();
		$param = array('nik', 
					'nama_pengguna',
					'email',
					'status',
					'nama_level',
					'no_hp',
					'alamat',
					'jenis_kelamin',
					'id_level'
		       );
		if ($this->session->unset_userdata($param)) {
			session_unset();
			session_destroy();
		}else{
		redirect('Auth');
	}
	}
}