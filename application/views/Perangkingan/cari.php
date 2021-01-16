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
                                    <a href="<?=base_url('Perangkingan/perangkingan_cari_pdf')?>?cari=<?=$cari?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true" target="_BLANK"></i> PDF</a>
                                
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
                                                        echo $ra++;
                                                        echo "</th>";
                                                        
                                             ?>
                                                
                                    <?php } ?>
                                    </tr>
                                </tbody>
                              </table>
                              <!--Tampilkan pagination-->
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
                                                        echo $ra++;
                                                        echo "</th>";   
                                             ?>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                              </table>
                              
                            </div>
                      <?php } ?>
                              
                        </div>             

                        </div>
                    </div>




                </div>
            </div>
         
        </div>
    </div>
