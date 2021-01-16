<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Penilaian <small>Tambah Data Penilaian</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('Penilaian');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                            </div>
                            <br>
                                <?php validation_errors(); 
                                if (form_error('nik_tahun') == true) { ?>
                                   <div class="row">
                                <div class="col-lg-12">
                                    <div class="bs-example">
                                    <div class="alert alert-dismissable alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Gagal!</h4>
                                        Penilaian dengan data NIK : <?=substr($rs,0,5);?> pada Tahun : <?=substr($rs,5,4);?> sudah digunakan.
                                        <p></p>
                                    </div>
                                    </div>
                                </div>
                                </div><!-- /.row -->
                              <?php   }
                                
                                ?>
                                
                                <br>
                                <form class="form" method="post" action="<?= base_url('Penilaian/proses_tambah');?>">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group-sm">
                                          <label>NIK</label>
                                          <input type="hidden" class="form-control" value="" name="id_penilaian[]" id="id_penilaian">
                                          <input class="form-control" value="" name="nik" id="nik" onkeyup="isi_otomatis()">
                                           <input class="form-control" type="hidden" value="" name="nik_tahun" id="nik_tahun" onkeyup="isi_otomatis()">
                                          <label class="control-label"></label>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group-sm">
                                            <label>Nama Karyawan</label>
                                            <input class="form-control" value="" name="nama_kariawan[]" id="nama_kariawan" readonly>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group-sm">
                                            <label>Divisi</label>
                                            <input class="form-control" value="" name="divisi[]" id="divisi" readonly>
                                        </div>
                                    </div>  
                                    <div class="col-md-3">
                                        <div class="form-group-sm">
                                            <label>Tanggal</label>
                                            <input class="form-control" type="date" value="" name="tanggal[]" id="tanggal" onchange="sum();">
                                        </div>
                                    </div>                                  
                                  </div>
                                  <?php $no=1; $a=1; foreach ($kt as $pn) : ?>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group-sm">
                                          <label><?=$pn->nama_kriteria?></label>
                                          <input type="hidden" class="form-control" value="" name="nik1[]" id="nik<?=$no++;?>" readonly>
                                          <input class="form-control" type="hidden" type="date" value="" name="tanggal1[]" id="tanggal<?=$a++;?>" onchange="sum();">
                                          <input type="hidden" value="<?=$pn->kode_kriteria;?>" name="kode_kriteria[]" id="kode_kriteria">
                                          <input type="hidden" value="<?=$pn->jenis_faktor;?>" class="form-control" name="jf[]" id="jf" readonly>
                                          <select class="form-control" name="nilai_asli[]" id="nilai_asli_<?=$pn->kode_kriteria?>" onchange="sum();">
                                                  <option name="nilai_asli[]" value="">Pilih Data</option>
                                                  <option name="nilai_asli[]" value="1">1 - Kurang Baik</option>
                                                  <option name="nilai_asli[]" value="2">2 - Kurang</option>
                                                  <option name="nilai_asli[]" value="3">3 - Cukup</option>
                                                  <option name="nilai_asli[]" value="4">4 - Baik</option>
                                                  <option name="nilai_asli[]" value="5">5 - Sangat Baik</option>
                                          </select>
                                          <label class="control-label" for="inputError"></label>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group-sm">
                                            <label>Nilai Target</label>
                                            <input class="form-control" value="<?=$pn->nilai_target?>" name="nilai_target[]" id="nilai_target_<?=$pn->kode_kriteria?>" onchange="sum();" readonly>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group-sm">
                                            <label>Nilai Gap</label>
                                            <input class="form-control" value="" name="nilai_gap[]" id="nilai_gap_<?=$pn->kode_kriteria?>" onchange="sum();" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group-sm">
                                            <label>Nilai Bobot</label>
                                            <input class="form-control" value="" name="nilai_bobot[]" id="nilai_bobot_<?=$pn->kode_kriteria?>" onchange="sum();" readonly>
                                        </div>
                                    </div>                                  
                                  </div>
                                <?php endforeach; ?>
                                <?php $no=1; $sf=1; $tt=1; $ra=1; $pr=1; $as=1; $hasil_ra=1; foreach ($kt as $pn) : ?>
                                    <input class="form-control" type="hidden" value="" onchange="sum();" name="nilai_cf1[]" id="nilai_cf<?=$no++;?>" readonly>
                                    <input class="form-control" type="hidden" value="" name="nilai_sf1[]" onchange="sum();" id="nilai_sf<?=$sf++;?>" readonly>
                                    <input class="form-control" type="hidden" onchange="sum();" value="" name="nilai_total1[]" id="nilai_total<?=$tt++;?>" readonly>
                                     <input class="form-control" type="hidden" value="<?=$pn->nilai_persen/100;?>" onchange="sum();" name="nilai_pr1[]" id="nilai_pr<?=$pr++;?>" readonly>
                                     <input class="form-control" type="hidden" value="" onchange="sum();" name="nilai_ra1[]" id="nilai_ra<?=$ra++;?>">
                                     <input class="form-control" type="hidden" value="" onchange="sum();" name="hasil_ra1[]" id="hasil_ra<?=$hasil_ra++;?>">
                                     
                                <?php endforeach;?>
                                <dic class="row">
                                    <div class="col-md-4">
                                        <div class="form-group-sm">
                                            <label>Nilai Core Factor</label>
                                            <input class="form-control" value="" onchange="sum();" name="nilai_cf[]" id="nilai_cf" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group-sm">
                                            <label>Nilai Secondary Factor</label>
                                            <input class="form-control" value="" onchange="sum();" name="nilai_sf[]" id="nilai_sf" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group-sm">
                                            <label>Nilai Total</label>
                                            <input class="form-control" onchange="sum();" value="" name="nilai_total[]" id="nilai_total" readonly>
                                        </div>
                                    </div>
                                </dic>
                            <br>
                            <div class="row">
                              <div class="col-lg-6">
                                     <button class="btn btn-success">Simpan</button>
                                     <button type="reset" class="btn btn-danger">Batal</button>
                                  </form>
                              </div>
                            </div>
                            
                </div>
            </div>         
        </div>
    </div>