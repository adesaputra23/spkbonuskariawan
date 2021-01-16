<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Penilaian <small>Data Penilaian</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                         <div class="panel-body">
                          <?php echo $this->session->flashdata('message'); ?>
                            <div class="row">
                                <div class="col-sm-8 btn-group">
                                    <?php if ($this->session->userdata('id_level') == 1) { ?>
                                        <button type="button" class="btn btn-default">Pilih Tahun</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($gt_pn as $key => $value) { ?>
                                                <li><a href="<?=base_url('Penilaian/get_tahun/')?>?tahun=<?=$value->tahun?>"><?=$value->tahun?></a></li>
                                        <?php } ?> 
                                        </ul>
                                        <a href="<?=base_url('Penilaian/tambah_data')?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                                        <?php if (count($gt_tn)>0) {
                                            foreach ($gt_tn as $key) {
                                                $key->tahun;
                                            } ?>
                                        <a href="<?=base_url('Penilaian/hitung_tahun/')?>?tahun=<?=$key->tahun?>" class="btn btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Lihat Perhitungan</a>
                                    <?php  }else{ ?>
                                        <a href="<?=base_url('Penilaian/hitung_cari_eroor/')?>" class="btn btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Lihat Perhitungan</a>
                                        <?php }?>
                                        <a href="<?=base_url('Penilaian/penilaian_tahun_pdf')?>?tahun=<?=$thn?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                    
                                    <?php }elseif($this->session->userdata('id_level') == 2)  {?>
                                    
                                        <button type="button" class="btn btn-default">Pilih Tahun</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($gt_pn as $key => $value) { ?>
                                                <li><a href="<?=base_url('Penilaian/get_tahun/')?>?tahun=<?=$value->tahun?>"><?=$value->tahun?></a></li>
                                        <?php } ?>
                                            
                                        </ul>
                                        <?php if (count($gt_tn)>0) {
                                            foreach ($gt_tn as $key) {
                                                $key->tahun;
                                            } ?>
                                        <a href="<?=base_url('Penilaian/hitung_tahun/')?>?tahun=<?=$key->tahun?>" class="btn btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Lihat Perhitungan</a>
                                    <?php  }else{ ?>
                                        <a href="<?=base_url('Penilaian/hitung_cari_eroor/')?>" class="btn btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Lihat Perhitungan</a>
                                        <?php }?>
                                        <a href="<?=base_url('Penilaian/penilaian_tahun_pdf')?>?tahun=<?=$thn?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                    <?php } ?>
                               </div>
                                <div class="col-sm-4">
                                <form class="form" method="get" action="<?= base_url('Penilaian/cari');?>">
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
                                        <th style="text-align: center;" rowspan="2" >No</th>
                                        <th style="text-align: center;" rowspan="2" >NIK</th>
                                        <th style="text-align: center;" rowspan="2" >Nama Karyawan</th>
                                        <th style="text-align: center;" rowspan="2" >Divisi</th>
                                        <th style="text-align: center;"  rowspan="2" >Tanggal</th>
                                        <?php $no=1; foreach ($nl as $ni):  
                                                $no++;
                                            endforeach;?>
                                        <th style="text-align: center;" colspan="<?=$no;?>" >Nilai Kriteria</th>
                                        <tr class="active">
                                        <?php $no = 1; foreach($nl as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        <th style="text-align: center;" >Aksi</th>
                                        </tr>
                                        
                                    </tr>
                                </thead>
                                <tbody> <?php
                                $no=1;
                                foreach ($tahun as $key => $value) { ?>
                                    <tr>
                                        <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                        <td><?= $value->nik ?></td>
                                        <td><?= $value->nama_kariawan; ?></td>
                                        <td><?= $value->nama_divisi; ?></td>
                                        <td><?= $value->tanggal; ?></td>
                                        <?php foreach($gap as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                    echo '<th style="text-align: center;">';
                                                    echo $ln->nilai;
                                                    echo "</th>";
                                                } ?>
                                            <?php endforeach ?>
                                        <td width="8%" style="text-align: center;">

                                            <a href="<?= base_url('Penilaian/pilih_edit/').$value->nik_tahun;?>"><span class="label label-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a> | 

                                            <a href="<?= base_url('Penilaian/hapus/').$value->nik_tahun;?>" onclick="return confirm('Yakin Hapus Data')"><span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                              <!--Tampilkan pagination-->
                           </div>
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
