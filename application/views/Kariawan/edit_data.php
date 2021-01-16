<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Kariawan <small>Ubah Data Kariawan</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">

                        
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('Kariawan');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors(); ?>

                                <?php foreach ($kr as $key => $kariawan) { ?>
                                  <form class="form" method="post" action="<?= base_url('User/proses_edit');?>">

                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" readonly="" class="form-control" value="<?= $kariawan->nik; ?>" name="nik" id="nik">
                                        <label class="control-label" for="inputError" <?=form_error('nik');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Kariawan</label>
                                        <input class="form-control" value="<?= $kariawan->nama_kariawan; ?>" name="nama_kariawan" id="nama_kariawan">
                                        <label class="control-label" <?=form_error('nama_kariawan');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Tahun Masuk</label>
                                        <input type="date" class="form-control" value="<?= $kariawan->periode; ?>" name="periode" id="periode">
                                        <label class="control-label" <?=form_error('periode');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input class="form-control" value="<?= $kariawan->tempat_lahir; ?>" name="tempat_lahir" id="tempat_lahir">
                                        <label class="control-label" <?=form_error('tempat_lahir');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" value="<?= $kariawan->tanggal_lahir; ?>" name="tanggal_lahir" id="tanggal_lahir">
                                        <label class="control-label" <?=form_error('tanggal_lahir');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kelamin :</label>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="Laki-Laki" name="jenis_kelamin" id="jenis_kelamin"
                                                    <?= ($kariawan->jenis_kelamin == 'Laki-Laki' ? 'checked' : '') ?>>
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin"
                                                    <?= ($kariawan->jenis_kelamin == 'Perempuan' ? 'checked' : '') ?>>
                                                    Perempuan
                                                </label>
                                            </div>
                                            <label class="control-label" <?=form_error('jenis_kelamin');?></label>
                                    </div>
                                                                    
                              </div>

                              <div class="col-lg-6">

                                  <div class="form-group" id="grup">
                                        <label>Agama</label>
                                        <input class="form-control" value="<?= $kariawan->agama; ?>" name="agama" id="agama">
                                        <label class="control-label" <?=form_error('agama');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" value="<?= $kariawan->status; ?>" name="status" id="status">
                                        <label class="control-label" <?=form_error('status');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" value="<?= $kariawan->alamat; ?>" name="alamat" id="alamat">
                                        <label class="control-label" <?=form_error('alamat');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>No Hp/Wa</label>
                                        <input class="form-control" value="<?= $kariawan->no_tlp; ?>" name="no_tlp" id="no_tlp">
                                        <label class="control-label" <?=form_error('no_tlp');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input class="form-control" value="<?= $kariawan->pendidikan; ?>" name="pendidikan" id="pendidikan">
                                        <label class="control-label" <?=form_error('pendidikan');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Divisi</label>
                                        <select class="form-control" name="divisi" id="divisi">
                                            <?php foreach ($dv as $key => $value) { ?>
                                                
                                                <option value="<?= $value->kode_divisi;?>" <?=$kariawan->kode_divisi == $value->kode_divisi ? "selected" : null; ?>><?=$value->nama_divisi;?></option>
                                          <?php  } ?>
                                        </select>
                                    </div>

                              </div>                        
                            </div>
                            <?php } ?>
                            <div class="text-center">
                              <button class="btn btn-success">Simpan</button>
                              <button type="reset" class="btn btn-danger">Batal</button>
                            </div>


                            </form>




                </div>
            </div>
         
        </div>
    </div>