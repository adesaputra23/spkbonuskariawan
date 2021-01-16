<div class="container">
                    <h1>Penilaian <small>Data Penilaian</small>
                    <p><small>Data Penilaian NIK : <?=$nk?> |
                    Nama Karyawan : <?=$cari[0]->nama_kariawan;?></small></p></h1>
                   
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th style="text-align: center;" rowspan="2" >No</th>
                                        <th style="text-align: center;" rowspan="2" >NIK</th>
                                        <th style="text-align: center;" rowspan="2" >Nama Kariawan</th>
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
