<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Profil <small>Ubah Foto</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <?php validation_errors(); ?>
                        <form class="form" method="post" action="<?= base_url('User/proses_ubah_foto')?>?nik=<?=$ps->id_pengguna?>" enctype="multipart/form-data">
                            <img width="20%" src="<?= base_url('assets/img/')?><?=$ps->foto?>">  <?=$ps->foto?>
                            <div class="form-group" style="margin-top:5px;">
                                <label>Unggah Foto</label>
                                <input type="file" name="file" class="form-control" required>
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
