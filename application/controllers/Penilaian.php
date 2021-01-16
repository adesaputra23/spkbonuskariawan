<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

public function index()
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
    $this->load->view('Penilaian/tampil_data', $data);
    $this->load->view('Template/foter');
}

public function hitung()
    {
    $data['sum'] = $this->Penilaian_model->sum_core();
    $data['nl'] = $this->Penilaian_model->get();
    $data['kt'] = $this->Penilaian_model->keterangan();
    $data['pn'] = $this->Penilaian_model->ambil_data_cari();
    $data['dsc'] = $this->Penilaian_model->ambil_data_dsc();
    $data['gap'] = $this->Penilaian_model->ambil_data_gap();
    $data['core'] = $this->Penilaian_model->get_core();
    $data['secondary'] = $this->Penilaian_model->get_secondary();
    $data['get_core'] = $this->Penilaian_model->ambil_data_core();
    $data['get_secondary'] = $this->Penilaian_model->ambil_data_secondary();
    $data['get_core_kriteria'] = $this->Penilaian_model->get_core_kriteria();
    $data['get_secondary_kriteria'] = $this->Penilaian_model->get_secondary_kriteria();
    $data['ambil_data_sec_cor'] = $this->Penilaian_model->ambil_data_sec_cor();
    $this->load->view('Template/head');
    $this->load->view('Template/nav');
    $this->load->view('Penilaian/hitung', $data);
    $this->load->view('Template/foter');
    }

public function tambah_data()
    {
        $data['core'] = $this->Penilaian_model->get_core_kriteria();
        $data['secondary'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['kt'] = $this->Penilaian_model->get_kr();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/tambah_data', $data);
        $this->load->view('Template/foter');
        $this->load->view('Penilaian/Js/load_jq', $data);
    }

public function proses_tambah()
    {
        
        $data               = $this->Penilaian_model->get_kr_inputan();
        $id_penilaian       = $this->input->post('id_penilaian');
        $nik_1                = $this->input->post('nik');
        $nik                = $this->input->post('nik1');
        $nik_tahun                = $this->input->post('nik_tahun');
        $tanggal            = $this->input->post('tanggal1');
        $kode_kriteria      = $this->input->post('kode_kriteria');
        $jf                 = $this->input->post('jf');
        $nilai_asli         = $this->input->post('nilai_asli');
        $nilai_gap          = $this->input->post('nilai_gap');
        $nilai_bobot        = $this->input->post('nilai_bobot');
        $nilai_cf           = $this->input->post('nilai_cf1');
        $nilai_sf           = $this->input->post('nilai_sf1');
        $nilai_total        = $this->input->post('nilai_total1');
        $hasil_ra           = $this->input->post('hasil_ra1');
        $no=0;
        $result = array();
       foreach ($kode_kriteria as $key => $value) {
        array_push($result, array(
            'id_penilaian'  => "",
            'nik'           =>$nik[$no],
            'nik_tahun'     =>$nik_1.$tanggal[$no],
            'tanggal'       =>$tanggal[$no],
            'tahun'         =>$tanggal[$no],
            'kode_kriteria' =>$kode_kriteria[$no],
            'jenis_faktor'  =>$jf[$no],
            'nilai'         =>$nilai_asli[$no],
            'nilai_gap'     =>$nilai_gap[$no],
            'nilai_bobot'   =>$nilai_bobot[$no],
            'nilai_cf'      =>$nilai_cf[$no],
            'nilai_sf'      =>$nilai_sf[$no],
            'nilai_total'   =>$nilai_total[$no],
            'nilai_ra'      =>$hasil_ra[$no]
        ));
        $no++;
       }
       $this->form_validation->set_rules('nilai_asli[]', 'Nilai Kriteria', 'required');
       $this->form_validation->set_rules('nik_tahun','NIK','required|is_unique[tb_penilaian.nik_tahun]');
       $this->form_validation->set_message('is_unique', 'Data %s dan Tahun sudah di gunakan');
       $this->form_validation->set_message('required', 'Data %s tidak boleh kososng');

       if ($this->form_validation->run()) {
              		if ($this->Penilaian_model->insert_data($result)) {
                        $this->session->set_userdata($result);
                            $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> Suksess! </strong>Data Penilaian<strong></strong> Berhasil di Tambahkan.</div>');
                            redirect('Penilaian');
                      }else {
                        echo "Data Gagal di Tambahkan";
                      }  
        }else{
         $data['rs'] = $nik_tahun;
        $data['core'] = $this->Penilaian_model->get_core_kriteria();
        $data['secondary'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['kt'] = $this->Penilaian_model->get_kr();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/tambah_data', $data);
        $this->load->view('Template/foter');
        $this->load->view('Penilaian/Js/load_jq', $data);

        }


       
    

    //    if ($this->Penilaian_model->insert_data($result)) {
    //                  $this->session->set_userdata($result);
    //                 $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
    //                 <button type="button" class="close" data-dismiss="alert">&times;</button>
    //                 <strong> Suksess! </strong>Data Penilaian<strong></strong> Berhasil di Tambahkan.</div>');
    //                 redirect('Penilaian');
    //         }else{
    //             $data['core'] = $this->Penilaian_model->get_core_kriteria();
    //             $data['secondary'] = $this->Penilaian_model->get_secondary_kriteria();
    //             $data['kt'] = $this->Penilaian_model->get_kr();
    //             $this->load->view('Template/head');
    //             $this->load->view('Template/nav');
    //             $this->load->view('Penilaian/tambah_data', $data);
    //             $this->load->view('Template/foter');
    //             $this->load->view('Penilaian/Js/load_jq', $data);
    //         }
    }

public function load_aj()
    {
        $nik = $this->input->get('nik');
			
			if ($jr = $this->Penilaian_model->auto_fill($nik)) {
                $data = array('nik1' => $jr->nik,
                    'nama_kariawan' => $jr->nama_kariawan,
                              'divisi' => $jr->nama_divisi, );
			}else{
				$data = null;
			}

			echo json_encode($data);
    }

public function cari()
    {
        $keyword    =   $this->input->get('keyword');
        $data['nik'] = $keyword;
        $data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['cari']   =   $this->Penilaian_model->get_cari($keyword);
        $data['nl'] = $this->Penilaian_model->get();
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/cari', $data);
        $this->load->view('Template/foter');
    }

public function cari_pdf()
    {
        $keyword = $_REQUEST['cari'];
        $data['nik'] = $keyword;
        $data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['cari']   =   $this->Penilaian_model->get_cari($keyword);
        $data['nl'] = $this->Penilaian_model->get();
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['nama_file'] = 'Hitung Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Penilaian/cari_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

public function hitung_cari($keyword)
    {
        $data['nik'] = $keyword;
        $data['sum'] = $this->Penilaian_model->sum_core();
        $data['nl'] = $this->Penilaian_model->get();
        $data['kt'] = $this->Penilaian_model->keterangan();
        $data['pn'] = $this->Penilaian_model->ambil_data_cari();
        $data['dsc'] = $this->Penilaian_model->ambil_data_dsc_cari($keyword);
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['core'] = $this->Penilaian_model->get_core();
        $data['secondary'] = $this->Penilaian_model->get_secondary();
        $data['get_core'] = $this->Penilaian_model->ambil_data_core_cari($keyword);
        $data['get_secondary'] = $this->Penilaian_model->ambil_data_secondary_cari($keyword);
        $data['get_core_kriteria'] = $this->Penilaian_model->get_core_kriteria();
        $data['get_secondary_kriteria'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['ambil_data_sec_cor'] = $this->Penilaian_model->ambil_data_sec_cor_cari($keyword);
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/hitung_cari', $data);
        $this->load->view('Template/foter');
    }

    public function hitung_cari_pdf($keyword)
    {
        $data['nik'] = $keyword;
        $data['sum'] = $this->Penilaian_model->sum_core();
        $data['nl'] = $this->Penilaian_model->get();
        $data['kt'] = $this->Penilaian_model->keterangan();
        $data['pn'] = $this->Penilaian_model->ambil_data_cari();
        $data['dsc'] = $this->Penilaian_model->ambil_data_dsc_cari($keyword);
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['core'] = $this->Penilaian_model->get_core();
        $data['secondary'] = $this->Penilaian_model->get_secondary();
        $data['get_core'] = $this->Penilaian_model->ambil_data_core_cari($keyword);
        $data['get_secondary'] = $this->Penilaian_model->ambil_data_secondary_cari($keyword);
        $data['get_core_kriteria'] = $this->Penilaian_model->get_core_kriteria();
        $data['get_secondary_kriteria'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['ambil_data_sec_cor'] = $this->Penilaian_model->ambil_data_sec_cor_cari($keyword);
        $data['nama_file'] = 'Hitung cari '.$keyword.' Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Penilaian/hitung_cari_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

    public function hitung_cari_eroor()
    {
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/hitung_cari_error');
        $this->load->view('Template/foter');
    }

    public function hapus($nik)
        {
                $data = array('nik' => $nik);

                if ($this->Penilaian_model->hapus($nik)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-dismissable alert-success">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Suksess! </strong>Data Penilaian <strong></strong> Berhasil di Hapus.</div>');
                    redirect('Penilaian');
                        
                }else{
                        echo "Data Gagal di Hapus";
                }
        }

    //function untuk menampilkan data edit
    public function pilih_edit($nik_tahun)
    {
        $data['ab_edit'] = $this->Penilaian_model->ambil_edit($nik_tahun);
        $data['dt_edit'] = $this->Penilaian_model->data_edit($nik_tahun);
        $data['core'] = $this->Penilaian_model->get_core_kriteria();
        $data['secondary'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['kt'] = $this->Penilaian_model->get_kr();
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/pilih_edit', $data);
        $this->load->view('Template/foter');
        $this->load->view('Penilaian/Js/load_jq', $data);
    }

    //function proses edit data
    public function proses_edit($nik_tahun)
        {
        $data               = $this->Penilaian_model->get_kr_inputan();
        $id_penilaian       = $this->input->post('id_penilaian');
        $nik_1                = $this->input->post('nik');
        $nik                = $this->input->post('nik1');
        $tanggal            = $this->input->post('tanggal1');
        $kode_kriteria      = $this->input->post('kode_kriteria');
        $jf                 = $this->input->post('jf');
        $nilai_asli         = $this->input->post('nilai_asli');
        $nilai_gap          = $this->input->post('nilai_gap');
        $nilai_bobot        = $this->input->post('nilai_bobot');
        $nilai_cf           = $this->input->post('nilai_cf1');
        $nilai_sf           = $this->input->post('nilai_sf1');
        $nilai_total        = $this->input->post('nilai_total1');
        $hasil_ra           = $this->input->post('hasil_ra1');
        $no=1;
        $result = array();
       foreach ($kode_kriteria as $key => $value) {
        array_push($result, array(
            'id_penilaian'           =>$id_penilaian[$no],
            'nik'           =>$nik[$key],
            'tanggal'       =>$tanggal[$key],
            'kode_kriteria' =>$kode_kriteria[$key],
            'jenis_faktor'  =>$jf[$key],
            'nilai'         =>$nilai_asli[$key],
            'nilai_gap'     =>$nilai_gap[$key],
            'nilai_bobot'   =>$nilai_bobot[$key],
            'nilai_cf'      =>$nilai_cf[$key],
            'nilai_sf'      =>$nilai_sf[$key],
            'nilai_total'   =>$nilai_total[$key],
            'nilai_ra'      =>$hasil_ra[$key]
        ));
        $no++;
       }
      if ($this->db->update_batch('tb_penilaian', $result, 'id_penilaian')) {
            $this->session->set_flashdata('message','<div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> Suksess! </strong>Data Penilaian<strong></strong> Berhasil di Ubah.</div>');
            redirect('Penilaian');
      } else {
            $data['ab_edit'] = $this->Penilaian_model->ambil_edit($nik_tahun);
            $data['dt_edit'] = $this->Penilaian_model->data_edit($nik_tahun);
            $data['core'] = $this->Penilaian_model->get_core_kriteria();
            $data['secondary'] = $this->Penilaian_model->get_secondary_kriteria();
            $data['kt'] = $this->Penilaian_model->get_kr();
            $this->load->view('Template/head');
            $this->load->view('Template/nav');
            $this->load->view('Penilaian/pilih_edit', $data);
            $this->load->view('Template/foter');
            $this->load->view('Penilaian/Js/load_jq', $data);
      }
    }

// function untuk menampilkan data tahun.
    public function get_tahun()
    {
        $tahun = $_REQUEST['tahun'];
        $data['thn'] = $tahun;
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['nl'] = $this->Penilaian_model->get();
        $data['gt_tn'] = $this->Penilaian_model->get_tn($tahun);
        $data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['tahun']   =   $this->Penilaian_model->get_tahun($tahun);
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/tampil_tahun', $data);
        $this->load->view('Template/foter');
    }

    public function hitung_tahun()
    {
        $tahun = $_REQUEST['tahun'];
        // $data['sum'] = $this->Penilaian_model->sum_core();
        
        $data['thn'] = $tahun;
        $data['nl'] = $this->Penilaian_model->get();
        // $data['kt'] = $this->Penilaian_model->keterangan();
        // $data['pn'] = $this->Penilaian_model->ambil_data_cari();
        $data['dsc'] = $this->Penilaian_model->ambil_data_dsc_tahun($tahun);
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['core'] = $this->Penilaian_model->get_core();
        $data['secondary'] = $this->Penilaian_model->get_secondary();
        $data['get_core'] = $this->Penilaian_model->ambil_data_core_tahun($tahun);
        $data['get_secondary'] = $this->Penilaian_model->ambil_data_secondary_tahun($tahun);
        $data['get_core_kriteria'] = $this->Penilaian_model->get_core_kriteria();
        $data['get_secondary_kriteria'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['ambil_data_sec_cor'] = $this->Penilaian_model->ambil_data_sec_cor_tahun($tahun);
        $this->load->view('Template/head');
        $this->load->view('Template/nav');
        $this->load->view('Penilaian/hitung_tahun', $data);
        $this->load->view('Template/foter');
    }

    public function hitung_pdf()
    {
        $data['sum'] = $this->Penilaian_model->sum_core();
        $data['nl'] = $this->Penilaian_model->get();
        $data['kt'] = $this->Penilaian_model->keterangan();
        $data['pn'] = $this->Penilaian_model->ambil_data_cari();
        $data['dsc'] = $this->Penilaian_model->ambil_data_dsc();
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['core'] = $this->Penilaian_model->get_core();
        $data['secondary'] = $this->Penilaian_model->get_secondary();
        $data['get_core'] = $this->Penilaian_model->ambil_data_core();
        $data['get_secondary'] = $this->Penilaian_model->ambil_data_secondary();
        $data['get_core_kriteria'] = $this->Penilaian_model->get_core_kriteria();
        $data['get_secondary_kriteria'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['ambil_data_sec_cor'] = $this->Penilaian_model->ambil_data_sec_cor();
        $data['nama_file'] = 'Hitung Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Penilaian/perhitungan_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

    public function hitung_tahun_pdf()
    {
        $tahun = $_REQUEST['tahun'];
        // $data['sum'] = $this->Penilaian_model->sum_core();
        $data['thn'] = $tahun;
        $data['nl'] = $this->Penilaian_model->get();
        // $data['kt'] = $this->Penilaian_model->keterangan();
        // $data['pn'] = $this->Penilaian_model->ambil_data_cari();
        $data['dsc'] = $this->Penilaian_model->ambil_data_dsc_tahun($tahun);
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['core'] = $this->Penilaian_model->get_core();
        $data['secondary'] = $this->Penilaian_model->get_secondary();
        $data['get_core'] = $this->Penilaian_model->ambil_data_core_tahun($tahun);
        $data['get_secondary'] = $this->Penilaian_model->ambil_data_secondary_tahun($tahun);
        $data['get_core_kriteria'] = $this->Penilaian_model->get_core_kriteria();
        $data['get_secondary_kriteria'] = $this->Penilaian_model->get_secondary_kriteria();
        $data['ambil_data_sec_cor'] = $this->Penilaian_model->ambil_data_sec_cor_tahun($tahun);
        $data['nama_file'] = 'Hitung Tahun Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Penilaian/hitung_tahun_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

    public function penilaian_pdf()
    {
        $data['nl'] = $this->Penilaian_model->get();
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['kt'] = $this->Penilaian_model->keterangan();
        $data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['pn'] = $this->Penilaian_model->ambil_data_pdf();
        $data['nama_file'] = 'Hitung Tahun Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Penilaian/penilaian_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

    public function penilaian_tahun_pdf()
    {
        $tahun = $_REQUEST['tahun'];
        $data['thn'] = $tahun;
        $data['gap'] = $this->Penilaian_model->ambil_data_gap();
        $data['nl'] = $this->Penilaian_model->get();
        $data['gt_tn'] = $this->Penilaian_model->get_tn($tahun);
        $data['gt_pn'] = $this->Penilaian_model->get_penilaian();
        $data['tahun']   =   $this->Penilaian_model->get_tahun($tahun);
        $data['nama_file'] = 'Penilaian Tahun Pdf';
        $this->load->view('print_pdf/head', $data);
        $this->load->view('Penilaian/penilaian_tahun_pdf', $data);
        $this->load->view('print_pdf/footer');
    }

}