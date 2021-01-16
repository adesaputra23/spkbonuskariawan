<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Profil <small>Data Profil</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <?php echo $this->session->flashdata('message'); ?>
                              <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td rowspan="12" width="15%" style="text-align:center;"><img width="80%" src="<?= base_url('assets/img/')?><?=$pr->foto?>">
                                            <a href="<?=base_url('User/ubah_foto')?>?nik=<?=$pr->id_pengguna?>"><span class="label label-success">Ubah Foto</span></a>
                                            </td>
                                            <td width="15%">NIK</td>
                                            <td width="3%">:</td>
                                            <td><?= $pr->nik; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Nama User</td>
                                            <td width="3%">:</td>
                                            <td><?= $pr->nama_pengguna; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Status Login</td>
                                            <td width="3%">:</td>
                                            <td><?php if ($pr->status_login == 1) {
                                                echo "Aktif";
                                            }else {
                                                echo "Tidak aktif";
                                            }  ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Level</td>
                                            <td width="3%">:</td>
                                            <td><?= $pr->nama_level; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Password</td>
                                            <td width="3%">:</td>
                                            <td><a href="<?=base_url('User/ubah_pasword')?>?nik=<?=$pr->id_pengguna?>"><span class="label label-success">Ubah Password</span></a></td>
                                        </tr>
                                    </tbody>
                              </table>
                              <br>
                        </div>  
                    </div>
                </div>


</div>
</div>
</div>
</div>
