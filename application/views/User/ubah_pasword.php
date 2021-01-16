<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Profil <small>Ubah Password</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <?php validation_errors(); ?>
                        <form class="form" method="post" action="<?= base_url('User/proses_ubah_pasword')?>?nik=<?=$ps->id_pengguna?>">
                            <div class="form-group">
                                <label>Pasword Lama</label>
                                <input type="password" class="form-control" value="<?=$ps->password;?>" placeholder="Enter text" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pasword Baru</label>
                                <input type="password" name="pas1" class="form-control" placeholder="Masukan text">
                                <label class="control-label" for="inputError" <?=form_error('pas1');?></label>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Pasword</label>
                                <input type="password" name="pas2" class="form-control" placeholder="Masukan text">
                                <label class="control-label" for="inputError" <?=form_error('pas2');?></label>
                            </div>
                            <button class="btn btn-success">Simpan</button>
                            <a href="<?= base_url('User/profil')?>?nik=<?=$ps->id_pengguna?>" class="btn btn-danger">Batal</a>
                        </form>
                        </div>
                        <div class="col-md-4"></div>
                        </div>
                              <br>
                        </div>  
                    </div>
                </div>


</div>
</div>
</div>
</div>
