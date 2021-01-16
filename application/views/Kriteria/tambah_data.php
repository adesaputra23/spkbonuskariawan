<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Kriteria <small>Tambah Data Kriteria</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">

                        
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('Kriteria');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors(); ?>
                                  <form class="form" method="post" action="<?= base_url('Kriteria/proses_tambah');?>">
                                    <div class="form-group">
                                        <label>Kode Kriteria</label>
                                        <input class="form-control" value="<?=set_value('kode_kriteria') ?>" name="kode_kriteria" id="kode_kriteria">
                                        <label class="control-label" for="inputError" <?=form_error('kode_kriteria');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Kriteria</label>
                                        <input class="form-control" value="<?=set_value('nama_kriteria') ?>" name="nama_kriteria" id="nama_kriteria">
                                        <label class="control-label" <?=form_error('nama_kriteria');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Faktor :</label>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="Core" name="jf" id="jf" <?php if (isset($jf) && $jf=="Core") echo "checked";?>>
                                                    Core
                                                </label>
                                            </div>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="Secondary" name="jf" id="jf" <?php if (isset($jf) && $jf=="Secondary") echo "checked";?>>
                                                    Secondary
                                                </label>
                                            </div>
                                            <label class="control-label" <?=form_error('jf');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Target</label>
                                        <input class="form-control" value="<?=set_value('nilai_target') ?>" name="nilai_target" id="nilai_target">
                                        <label class="control-label" for="inputError" <?=form_error('nilai_target');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Persen (%)</label>
                                        <input class="form-control" value="<?=set_value('nilai_persen') ?>" name="nilai_persen" id="nilai_persen">
                                        <label class="control-label" for="inputError" <?=form_error('nilai_persen');?></label>
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