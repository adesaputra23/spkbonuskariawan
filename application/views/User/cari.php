<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Pengguna <small>Data Pengguna</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">

                          <?php echo $this->session->flashdata('message'); ?>
                            <div class="row">
                                <div class="col-sm-8 btn-group">
                                     <a href="<?= base_url('User/tambah_data');?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                                     <a href="" class="btn btn-warning"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                </div>

                                <div class="col-sm-4">
                                <form class="form" method="get" action="">
                                        <div class="form-group input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari NIK">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" id="cari" name="cari"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                </form>
                                </div>
 
                            </div>

                            <br>
                           <div>
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Pengguna</th>
                                        <th>Level</th>
                                        <th>Status Login</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no=1;
                                    foreach ($us as $key => $value) { 

                                        if ($value->id_level == "3") { ?>
                                              <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nik; ?></td>
                                                <td><?= $value->nama_pengguna; ?></td>
                                                <td><?= $value->nama_level; ?></td>
                                                <td align="center"><?php $status=$value->status_login; 
                                                    if ($status == 1) { ?>
                                                         <a href="<?= base_url('User/status_login/')?>?nik=<?=$value->nik?>&val=<?=$value->status_login?>"><span class="label label-success">Aktif</span></a>
                                                     <?php }else{ ?>
                                                            <a href="<?= base_url('User/status_login/')?>?nik=<?=$value->nik?>&val=<?=$value->status_login?>"><span class="label label-danger">Tidak Aktif</span></a>
                                                     <?php } ?>
                                                        
                                                </td>

                                                <td>
                                                    <a href="<?= base_url('User/edit/').$value->nik;?>"><span class="label label-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a> | 

                                                    <a href="<?= base_url('User/hapus/').$value->nik;?>" onclick="return confirm('Yakin Hapus Data')"><span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a> |

                                                    <a href="<?= base_url('User/data_diri/').$value->nik;?>"><span class="label label-info"><i class="fa fa-info" aria-hidden="true"></i></span></a>

                                                </td>
                                            </tr>
                                    <?php } ?>

                                        
                                    <?php } ?>
                                </tbody>
                              </table>
                           </div>
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
