<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Kriteria <small>Nilai Kriteria</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">
                          
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

                                <div class="col-lg-4 text-right">
                                    <a href="<?= base_url('Kriteria');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                               
                            </div>

                            <br>
                           <div>
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Bobot Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sangat Baik</td>
                                            <td align="center">5</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Baik</td>
                                            <td align="center">4</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Cukup</td>
                                            <td align="center">3</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Kurang</td>
                                            <td align="center">2</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sangat Kurang</td>
                                            <td align="center">1</td>
                                        </tr>
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