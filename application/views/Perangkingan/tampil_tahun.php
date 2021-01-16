<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Perangkingan <small>Data Perangkingan</small></h1>
                   <hr size="10px">

                    <div class="panel panel-default">
                        <div class="panel-body">
                         <div class="panel-body">
                          <?php echo $this->session->flashdata('message'); ?>
                        
                            <div class="row">
                                 <div class="col-sm-8 btn-group">

                                  <button type="button" class="btn btn-default">Pilih Tahun</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($gt_tn as $key => $value) { ?>
                                            <li><a href="<?=base_url('Perangkingan/get_tahun_perangkingan/')?>?tahun=<?=$value->tahun?>"><?=$value->tahun?></a></li>
                                       <?php } ?>
                                    </ul>
                                    <a href="<?=base_url('Perangkingan/perangkingan_tahun_pdf/')?>?tahun=<?=$tahun?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                
                               </div>
                                <div class="col-sm-4">
                                <form class="form" method="get" action="<?= base_url('Perangkingan/cari_perangkingan');?>">
                                        <div class="form-group input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari NIK">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" id="cari" name="cari"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php if ($this->session->userdata('id_level') == 1 || $this->session->userdata('id_level') == 2) { ?>
                           <div>
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;" rowspan="3" >No</th>
                                        <th style="text-align: center;" rowspan="3" >NIK</th>
                                        <th style="text-align: center;" rowspan="3" >Tahun</th>
                                        <?php $no=1; foreach ($kr as $ni):  
                                                $no++;
                                            endforeach;?>
                                        <th style="text-align: center;"  colspan="<?=$no-1;?>" >Kode Kriteria</th>
                                        <th style="text-align: center;"  rowspan="3" >Nilai Akhir</th>
                                        <th style="text-align: center;" rowspan="3" >Rangking</th>
                                         <tr class="active">
                                            <?php $no = 1; foreach($kr as $ln): ?>
                                                <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr class="active">
                                            <?php $no = 1; foreach($kr as $tr): ?>
                                            <th style="text-align: center;">(<?=$tr->nilai_persen; ?>%)</th>
                                            <?php endforeach ?>
                                        </tr>
                                    </tr>
                                </thead>
                                <?php
                                $no=1;
                                $ra=1;
                                $a=1;
                                $o=2;
                                $ra_n = substr($rank->ra, 0,2).'.78';
                                foreach ($pn as $key => $value) { ?>
                                    <tr>
                                        <td width="5%" style="text-align: center;"><?=$no++; ?></td>
                                        <td><?= $value->nik; ?></td>
                                        <td><?= $value->tahun; ?></td>
                                        <?php
                                        $sum = 0;
                                        foreach($gap as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                        echo '<th style="text-align: center;">';
                                                        echo $ln->nilai + ($ln->nilai_persen/100); 
                                                        $sum += $ln->nilai + ($ln->nilai_persen/100); 
                                                        echo "</th>";
                                                }
                                                
                                                ?>

                                            <?php endforeach;
                                             
                                                        echo '<th style="text-align: center;">';
                                                        echo $value->nilai_ra; 
                                                        echo "</th>";
                                                        echo '<th style="text-align: center;">';
                                                        if ($value->nilai_ra == $ra_n) {
                                                         $np = $a++;
                                                            if ($np == 1 || $np == 2) {
                                                                    echo $ra;
                                                            }else{
                                                                echo $o++;
                                                            }
                                                         }else{
                                                             echo $o++;
                                                         }
                                                        echo "</th>";
                                                        
                                             ?>
                                                
                                    <?php } ?>
                                    </tr>
                                </tbody>
                              </table>
                              <?php }else { ?>
                           <div>
                              <table class="table table-bordered">
                               <thead>
                                    <tr class="active">
                                        <th style="text-align: center;" rowspan="3" >No</th>
                                        <th style="text-align: center;" rowspan="3" >NIK</th>
                                        <th style="text-align: center;" rowspan="3" >Nama Karyawan</th>
                                        <th style="text-align: center;" rowspan="3" >Jenis Kelamin</th>
                                        <th style="text-align: center;" rowspan="3" >Pendidikan Terakhir</th>
                                        <th style="text-align: center;" rowspan="3" >Divisi</th>
                                        <th style="text-align: center;" rowspan="3" >Tahun</th>
                                        <th style="text-align: center;" rowspan="3" >Rangking</th>
                                    </tr>
                                </thead>
                                <?php
                                $no=1;
                                $ra=1;
                                $a=1;
                                $o=2;
                                $ra_n = substr($rank->ra, 0,2).'.78';
                                foreach ($pn as $key => $value) {  ?>
                                    <tr>
                                        <td width="5%" style="text-align: center;"><?=$no++; ?></td>
                                        <td><?= $value->nik; ?></td>
                                        <td><?= $value->nama_kariawan; ?></td>
                                        <td><?= $value->jenis_kelamin; ?></td>
                                        <td><?= $value->pendidikan; ?></td>
                                        <td><?= $value->nama_divisi; ?></td>
                                        <td><?= $value->tahun; ?></td>
                                        <?php
                                        $sum = 0;
                                        foreach($gap as $ln): ?>
                                            <?php endforeach;
                                                         echo '<th style="text-align: center;">';
                                                        if ($value->nilai_ra == $ra_n) {
                                                         $np = $a++;
                                                            if ($np == 1 || $np == 2) {
                                                                    echo $ra;
                                                            }else{
                                                                echo $o++;
                                                            }
                                                         }else{
                                                             echo $o++;
                                                         }
                                                        echo "</th>";   
                                             ?>
                                        <?php } ?>
                                    </tr>
                                </tbody>

                              </table>
                            </div>
                      <?php } ?>
                                <br>
                                <br>
                                 <?php if ($this->session->userdata('id_level') == 1 || $this->session->userdata('id_level') == 2) { ?>
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="bs-example">
                                    <div class="alert alert-dismissable alert-warning">
                                        <h4 style="color:black;">Informasi!</h4>
                                        <p style="color:black;">Penerimaan Bonus Karyawan di dapatkan oleh :</p>
                                        <?php
                                        $if = 1;
                                        $ra_n = substr($rank->ra, 0,2).'.78';
                                        foreach ($pn as $key => $value) {
                                                if ($value->nilai_ra == $ra_n) {
                                                    $fi = $if++;
                                                    if ($fi == 1 || $fi == 2) { ?>
                                                       <li style="color:black;"><b><?=$value->nama_kariawan;?></b>, <b>NIK : <?=$value->nik?></b> dengan nilai akhir yang di dapatkan <b><?=$value->nilai_ra?></b> pada Tahun : <?=$value->tahun?></li>
                                                <?php    }
                                                    
                                                }
                                                
                                            } ?>
                                    </div>
                                    </div>
                                </div>
                                </div>
                               <?php }else { ?>
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="bs-example">
                                    <div class="alert alert-dismissable alert-warning">
                                        <h4 style="color:black;">Informasi!</h4>
                                        <p style="color:black;">Penerimaan Bonus Karyawan di dapatkan oleh :</p>
                                        <?php
                                        $ik = 1;
                                        $ra_n = substr($rank->ra, 0,2).'.78';
                                        foreach ($pn as $key => $value) {
                                                if ($value->nilai_ra == $ra_n) {
                                                    $ki = $ik++;
                                                    if ($ki == 1 || $ki == 2) { ?>
                                                       <li style="color:black;"><b><?=$value->nama_kariawan;?></b>, <b>NIK : <?=$value->nik?></b> dengan nilai akhir yang di dapatkan <b><?=$value->nilai_ra?></b> pada Tahun : <?=$value->tahun?></li>
                                                <?php    }
                                                    
                                                }
                                                
                                            } ?>
                                    </div>
                                    </div>
                                </div>
                                </div>
                              <?php } ?>
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
