<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Pengguna <small>Ubah Data Pengguna</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">

                        
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('User');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>
                            
                            <div class="row">
                              <div class="col-lg-6">
                                <?php validation_errors(); 
                                    
                                foreach ($pg as $key => $val) { ?>
                                    
                                  <form class="form" method="post" action="<?= base_url('User/proses_edit/');?><?=$val->id_pengguna?>">

                                  <input type="hidden" value="<?= $val->id_pengguna; ?>" name="id_pengguna" id="id_pengguna"> 
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" readonly="" class="form-control" value="<?=$val->nik?>" name="nik" id="nik">
                                        <label class="control-label" for="inputError" <?=form_error('nik');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input class="form-control" value="<?=$val->nama_pengguna?>" readonly="" name="nama_pengguna" id="nama_pengguna">
                                        <label class="control-label" <?=form_error('nama_pengguna');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="Password" class="form-control" value="" name="pasword" id="pasword">
                                        <label class="control-label" <?=form_error('pasword');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="Password" class="form-control" value="" name="konfpw" id="konfpw">
                                        <label class="control-label" <?=form_error('konfpw');?></label>
                                    </div>                                                                   
                              </div>

                              <div class="col-lg-6">
                                <br>
                                 <div class="form-group">
                                        <label>Status Login :</label>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="1" name="status_login" id="status_login" <?= ($val->status_login == '1' ? 'checked' : '') ?>>
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="radio" value="0" name="status_login" id="status_login" <?= ($val->status_login == '0' ? 'checked' : '') ?>>
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                            <label class="control-label" <?=form_error('status_login');?></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Level Pengguna</label>
                                        <select class="form-control" name="id_level" id="id_level">
                                            <?php foreach ($lv as $key => $value) { ?>
                                                <option value="<?=$value->id_level?>" <?= $val->id_level == $value->id_level ? "selected" : ""?>><?=$value->nama_level?></option>
                                            <?php } ?>
                              
                                        </select>
                                    </div>
                              </div>

                              <?php } ?>          

                            </div>
                            <div class="text-center">
                              <button class="btn btn-success">Simpan</button>
                              <button type="reset" class="btn btn-danger">Batal</button>
                            </div>


                            </form>






                </div>
            </div>
         
        </div>
    </div>

