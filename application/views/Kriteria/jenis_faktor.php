<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Kriteria <small>Jenis Faktor</small></h1>
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
                                        <th>Jenis Faktor</th>
                                        <th>Nilai Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                        <td>Core</td>
                                        <td align="center">60%</td>
                                        </tr>
                                        <tr>
                                        <td>Secondary</td>
                                        <td align="center">40%</td>
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