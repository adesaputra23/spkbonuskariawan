<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Divisi <small>Tambah Data Divisi</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">

                        
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('Divisi');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors(); ?>
                                  <form class="form" method="post" action="<?= base_url('Divisi/proses_tambah');?>">
                                    <div class="form-group">
                                        <label>Kode Divisi</label>
                                        <input class="form-control" value="<?=set_value('kode_divisi') ?>" name="kode_divisi" id="kode_divisi">
                                        <label class="control-label" for="inputError" <?=form_error('kode_divisi');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Divisi</label>
                                        <input class="form-control" value="<?=set_value('nama_divisi') ?>" name="nama_divisi" id="nama_divisi">
                                        <label class="control-label" <?=form_error('nama_divisi');?></label>
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