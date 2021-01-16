<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Pengguna <small>Data Diri Pengguna</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                         <div class="panel-body">
                            <div class="text-right">
                                    <a href="<?= base_url('User');?>"><span class="label label-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</span></a>
                                </div>

                            <br>
                           <div>
                              <table class="table table table-striped">

                                <?php foreach ($pr as $key => $value) { ?>
                                    <tbody>
                                        <tr>
                                            <td rowspan="12" width="15%"><img width="90%" src="<?= base_url('assets/img/')?><?=$value->foto?>"></td>
                                            <td width="15%">NIK</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->nik; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Nama Pengguna</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->nama_pengguna; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="15%">Tahun Masuk</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->periode; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Tempat Lahir</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->tempat_lahir; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Tanggal Lahir</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->tanggal_lahir; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Jenis Kelamin</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->jenis_kelamin; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Agama</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->agama; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Status</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->status; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Alamat</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->alamat; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">No Hp/Wa</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->no_tlp; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Pendidikan</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->pendidikan; ?></td>
                                        </tr>
                                         <tr>
                                            <td width="15%">Divisi</td>
                                            <td width="3%">:</td>
                                            <td><?= $value->nama_divisi; ?></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                                                        
                              </table>
                              
                           </div>
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
