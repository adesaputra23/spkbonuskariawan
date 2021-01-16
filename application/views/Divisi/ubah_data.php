<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Divisi <small>Ubah Data Divisi</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('Divisi');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors(); 
                                foreach ($edit as $key => $dv) { ?>
                                  <form class="form" method="post" action="<?= base_url('Divisi/proses_edit/').$dv->kode_divisi;?>">
                                    <div class="form-group">
                                        <label>Kode Divisi</label>
                                        <input class="form-control" value="<?= $dv->kode_divisi; ?>" name="kode_divisi" id="kode_divisi" readonly="">
                                        <label class="control-label" for="inputError">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Divisi</label>
                                        <input class="form-control" value="<?= $dv->nama_divisi; ?>" name="nama_divisi" id="nama_divisi">
                                        <label class="control-label" <?=form_error('nama_divisi');?></label>
                                    </div>

                                    <?php } ?>

                                     <button class="btn btn-success">Simpan</button>
                                     <button type="reset" class="btn btn-danger">Batal</button>

                                  </form>
                              </div>
                            </div>




                </div>
            </div>
         
        </div>
    </div>