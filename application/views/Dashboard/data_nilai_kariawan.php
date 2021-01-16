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
                                <div class="col-lg-8 btn-group">
                                        <?php if (count($cari)>0) {
                                            foreach ($cari as $key) {
                                                $key->nik;
                                            } ?>
                                            <a href="<?=base_url('Penilaian/hitung_cari/').$key->nik;?>" class="btn btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Lihat Perhitungan</a>
                                        <?php  }else{ ?>
                                            <a href="<?=base_url('Penilaian/hitung_cari_eroor/')?>" class="btn btn-primary"><i class="fa fa-calculator" aria-hidden="true"></i> Lihat Perhitungan</a>
                                        <?php }?>
                                        <a href="<?=base_url('Dashboard/data_nilai_kariawan_pdf/')?>?nik=<?=$nk?>" class="btn btn-warning" target="_BLANK"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
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
                                        <th style="text-align: center;" rowspan="2" >Tanggal</th>
                                        <?php $no=1; foreach ($nl as $ni):  
                                                $no++;
                                            endforeach;?>
                                        <th style="text-align: center;" colspan="<?=$no;?>" >Nilai Kriteria</th>
                                        <tr class="active">
                                        <?php $no = 1; foreach($nl as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                $no=1;
                                if (count($cari)>0) { 
                                     foreach ($cari as $key => $value) { ?>
                                        <tr>
                                        <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                        <td><?= $value->nik; ?></td>
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
                                    </tr>
                                  <?php  }
                                   
                                } else { 
                                    $no=1; foreach ($nl as $er):  
                                        $no++;
                                    endforeach; 
                                    ?>
                                    <tr>
                                    <th style="text-align: center;" colspan="<?=$no+5;?>">Data tidak ditemukan!</th>
                                    </tr>

                             <?php  } ?>
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
