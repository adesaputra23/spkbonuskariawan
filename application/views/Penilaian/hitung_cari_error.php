<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Error <small>Tidak ada data penilaian</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                         <div class="panel-body">
                          <?php echo $this->session->flashdata('message'); ?>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="<?= base_url('Penilaian');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h1><b>Data Error</b></h1>
                                    <p>Data penilaian tidak di temukan!</p>
                                    <a href="<?= base_url('Penilaian');?>" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali Ke Halaman Awal</span></a>
                                </div>
                            </div>

                           
                        </div>             
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
