<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Divisi <small>Data Divisi</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <div class="panel-body">

                            <?php echo $this->session->flashdata('message'); ?>                          
                            <div class="row">
                                <div class="col-sm-8 btn-group">
                                    <?php if ($this->session->userdata('id_level') == 1) { ?>
                                        <a href="<?= base_url('Divisi/tambah_data');?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                                        <a href="<?= base_url('Divisi/divisi_pdf');?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                   <?php }elseif($this->session->userdata('id_level') == 2)  {?>
                                        <a href="<?= base_url('Divisi/divisi_pdf');?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                   <?php } ?>
                                    
                                </div>
                                <div class="col-sm-4">
                                <form class="form" method="get" action="<?= base_url('Divisi/cari');?>">
                                        <div class="form-group input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Kode Divisi">
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
                                        <th>Kode Devisi</th>
                                        <th>Nama Devisi</th>
                                        <?php if ($this->session->userdata('id_level') == 1) { ?>
                                        <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no= 1;
                                    if ($dv == null) {?>
                                        <th colspan="4" style="text-align: center;">Data tidak di temukan</th>
                                   <?php }else{
                                    foreach ($dv as $key => $value) { ?>
                                         <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value->kode_divisi; ?></td>
                                        <td><?= $value->nama_divisi; ?></td>
                                        <?php if ($this->session->userdata('id_level') == 1) { ?>
                                        <td>
                                            <a href="<?= base_url('Divisi/edit/').$value->kode_divisi;?>"><span class="label label-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a> | 

                                            <a href="<?= base_url('Divisi/hapus/').$value->kode_divisi;?>" onclick="return confirm('Yakin Hapus Data')"><span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } 
                                   }
                                    ?>
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
