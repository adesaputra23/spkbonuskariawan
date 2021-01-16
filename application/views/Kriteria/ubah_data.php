<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Kriteria <small>Ubah Data Kriteria</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('Kriteria');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors();
                                $hasil = $this->kriteria_model->sum();
                                foreach ($edit as $key => $kdt) { ?>
                                  <form class="form" method="post" action="<?= base_url('Kriteria/proses_edit/').$kdt->kode_kriteria;?>/?hasil=<?=$hasil - $kdt->nilai_persen;?>">
                                    <div class="form-group">
                                        <label>Kode Kriteria</label>
                                        <input class="form-control" value="<?= $kdt->kode_kriteria; ?>" name="kode_kriteria" id="kode_kriteria" readonly="">
                                        <label class="control-label" for="inputError">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Kriteria</label>
                                        <input class="form-control" value="<?= $kdt->nama_kriteria; ?>" name="nama_kriteria" id="nama_kriteria">
                                        <label class="control-label" <?=form_error('nama_kriteria');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Faktor :</label>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="Core" name="jf" id="jf" <?php echo ($kdt->jenis_faktor == 'Core' ? ' checked' : ''); ?>>
                                                    Core
                                                </label>
                                            </div>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="Secondary" name="jf" id="jf" <?php echo ($kdt->jenis_faktor == 'Secondary' ? ' checked' : ''); ?>>
                                                    Secondary
                                                </label>
                                            </div>
                                            <label class="control-label" <?=form_error('jf');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Target</label>
                                        <input class="form-control" value="<?= $kdt->nilai_target; ?>" name="nilai_target" id="nilai_target">
                                        <label class="control-label" for="inputError" <?=form_error('nilai_target');?></label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nilai Persen (%)</label>
                                        <input class="form-control" value="<?= $kdt->nilai_persen; ?>" name="nilai_persen" id="nilai_persen">
                                        <label class="control-label" for="inputError" <?=form_error('nilai_persen');?></label>
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