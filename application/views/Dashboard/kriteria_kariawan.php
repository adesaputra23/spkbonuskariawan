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
                                <div class="col-lg-12">
                                     <a href="" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> View Data Kriteria</a>
                                     <a href="" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Data Faktor</a>
                                     <a href="" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai GAP</a>
                                     <a href="" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i> Nilai Kriteria</a>
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
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($get_kriteria as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value->kode_kriteria; ?></td>
                                        <td><?= $value->nama_kriteria; ?></td>
                                        <td><?= $value->jenis_faktor; ?></td>
                                        <td align="center"><?= $value->nilai_target; ?></td>
                                        <td align="center"><?=$value->nilai_persen ?>%</td>
                                        <td align="center">K<?=substr($value->kode_kriteria,2,3); ?></td>
                                        <td>
                                            <a href="<?= base_url('Kriteria/edit/').$value->kode_kriteria;?>"><span class="label label-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a> | 

                                            <a href="<?= base_url('Kriteria/hapus/').$value->kode_kriteria;?>" onclick="return confirm('Yakin Hapus Data')"><span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              <!--Tampilkan pagination-->
                           </div>
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
