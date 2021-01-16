<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Kriteria <small>Data Kriteria</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">

                          <?php echo $this->session->flashdata('message'); ?>
                            <div class="row">
                                <div class="col-sm-8 btn-group">
                                    <?php if ($this->session->userdata('id_level') == 1) { ?>
                                     <a href="<?= base_url('Kriteria/tambah_data');?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                                    <a href="<?= base_url('Kriteria');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> View Data Kriteria</a>
                                     <a href="<?= base_url('Kriteria/jenis_faktor');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Data Faktor</a>
                                     <a href="<?= base_url('Kriteria/nilai_gap');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai GAP</a>
                                     <a href="<?= base_url('Kriteria/nilai_kriteria');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai Kriteria</a>
                                    <a href="<?= base_url('Kriteria/kriteria_pdf');?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true" ></i> PDF</a>
                                   <?php }elseif($this->session->userdata('id_level') == 2) {?>
                                    <a href="<?= base_url('Kriteria');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> View Data Kriteria</a>
                                     <a href="<?= base_url('Kriteria/jenis_faktor');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Data Faktor</a>
                                     <a href="<?= base_url('Kriteria/nilai_gap');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai GAP</a>
                                     <a href="<?= base_url('Kriteria/nilai_kriteria');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai Kriteria</a>
                                    <a href="<?= base_url('Kriteria/kriteria_pdf');?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true" ></i> PDF</a>
                                     <?php }elseif($this->session->userdata('id_level') == 3){?>
                                     <a href="<?= base_url('Kriteria');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> View Data Kriteria</a>
                                     <a href="<?= base_url('Kriteria/jenis_faktor');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Data Faktor</a>
                                     <a href="<?= base_url('Kriteria/nilai_kriteria');?>" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai Kriteria</a>
                                    <a href="<?= base_url('Kriteria/kriteria_pdf');?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true" ></i> PDF</a>
                                     <?php } ?>
                                </div>
                                <div class="col-sm-4">
                                <form class="form" method="get" action="<?=base_url('Kriteria/kriteria_cari')?>">
                                        <div class="form-group input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Kode Kriteria">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" id="cari" name="cari"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
 
                            </div>

                            <br>
                           <div>
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Kode Kriteria</th>
                                        <th style="text-align: center;">Nama Kriteria</th>
                                        <th style="text-align: center;">Jenis Faktor</th>
                                        <th style="text-align: center;">Nilai Target</th>
                                        <th style="text-align: center;">Nilai Persentase<br>(100%)</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <?php if ($this->session->userdata('id_level') == 1) { ?>
                                        <th style="text-align: center;">Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($kt == null) { ?>
                                        <th colspan="8" style="text-align: center;"> Data tidak di temukan</th>
                                  <?php  }else{
                                    $no = 1; foreach ($kt as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->kode_kriteria; ?></td>
                                        <td><?= $value->nama_kriteria; ?></td>
                                        <td><?= $value->jenis_faktor; ?></td>
                                        <td align="center"><?= $value->nilai_target; ?></td>
                                        <td align="center"><?=$value->nilai_persen ?>%</td>
                                        <td align="center">K<?=substr($value->kode_kriteria,2,3); ?></td>
                                        <?php if ($this->session->userdata('id_level') == 1) { ?>
                                        <td>
                                            <a href="<?= base_url('Kriteria/edit/').$value->kode_kriteria;?>"><span class="label label-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a> | 

                                            <a href="<?= base_url('Kriteria/hapus/').$value->kode_kriteria;?>" onclick="return confirm('Yakin Hapus Data')"><span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>

                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } 
                                  }
                                    ?>
                                </tbody>
                              </table>
                           </div>
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
