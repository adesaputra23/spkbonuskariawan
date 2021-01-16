<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Penilaian <small>Ubah Data Penilaian</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">
                            <div class="text-right">
                               <a href="<?= base_url('Penilaian');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                            </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors(); ?>
                                  <form class="form" method="post" action="">
                                    <div class="form-group">
                                        <label>Kode Kriteria</label>
                                        <input class="form-control" value="" name="kode_kriteria" id="kode_kriteria" readonly="">
                                        <label class="control-label" for="inputError">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Kriteria</label>
                                        <input class="form-control" value="" name="nama_kriteria" id="nama_kriteria">
                                        <label class="control-label"></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Target</label>
                                        <input class="form-control" value="" name="nilai_target" id="nilai_target">
                                        <label class="control-label"></label>
                                    </div>

                                     <button class="btn btn-success">Simpan</button>
                                     <button type="reset" class="btn btn-danger">Batal</button>

                                  </form>
                              </div>
                            </div>




                </div>
            </div>
         
        </div>
    </div>