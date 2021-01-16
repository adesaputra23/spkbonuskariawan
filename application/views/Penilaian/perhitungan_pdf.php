<div>
<div class="container">
                    <h1>Perhitungan <small>Gap | Bobot | Core Factor | Secondary Factor | Total</small></h1>
                                <h4><small class="label label-info">Nilai Inputan Kriteria :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" rowspan="2">No</th>
                                            <th style="text-align: center;" rowspan="2">NIK</th>
                                            <th style="text-align: center;" rowspan="2">Nama Karyawan</th>
                                            <?php $no=1; foreach ($nl as $ni):  
                                                $no++;
                                            endforeach;?>
                                            <th style="text-align: center;" colspan="<?=$no;?>" >Nilai Kriteria</th>
                                        </tr>
                                        <tr class="active">
                                        <?php $no = 1; foreach($nl as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($dsc as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                            <?php foreach($gap as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                    echo '<th style="text-align: center;">';
                                                    echo $ln->nilai;
                                                    echo "</th>";
                                                } ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                                <br>

                                <h4><small class="label label-info">Nilai Target :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" rowspan="2">No</th>
                                            <th style="text-align: center;" rowspan="2">NIK</th>
                                            <th style="text-align: center;" rowspan="2">Nama Karyawan</th>
                                            <?php $no=1; foreach ($nl as $ni):  
                                                $no++;
                                            endforeach;?>
                                            <th style="text-align: center;" colspan="<?=$no;?>" >Nilai Target</th>
                                        </tr>
                                        <tr class="active">
                                        <?php $no = 1; foreach($nl as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($dsc as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                            <?php foreach($nl as $ln): ?>
                                                <th style="text-align: center;"><?= $ln->nilai_target; ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <br>
                                
                                <h4><small class="label label-info">Nilai Gap :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" rowspan="2">No</th>
                                            <th style="text-align: center;" rowspan="2">NIK</th>
                                            <th style="text-align: center;" rowspan="2">Nama Karyawan</th>
                                            <?php $no=1; foreach ($nl as $ni):  
                                                $no++;
                                            endforeach;?>
                                            <th style="text-align: center;" colspan="<?=$no?>" >Nilai Gap</th>
                                        </tr>
                                        <tr class="active">
                                        <?php $no = 1; foreach($nl as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($dsc as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                            <?php foreach($gap as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                    echo '<th style="text-align: center;">';
                                                    echo $ln->nilai - $ln->nilai_target;
                                                    echo "</th>";
                                                } ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <br>

                                <h4><small class="label label-info">Nilai Bobot :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" rowspan="2">No</th>
                                            <th style="text-align: center;" rowspan="2">NIK</th>
                                            <th style="text-align: center;" rowspan="2">Nama Karyawan</th>
                                            <?php $no=1; foreach ($nl as $ni):  
                                                $no++;
                                            endforeach;?>
                                            <th style="text-align: center;" colspan="<?=$no;?>" >Nilai Bobot</th>
                                        </tr>
                                        <tr class="active">
                                        <?php $no = 1; foreach($nl as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($get_core as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                            <?php foreach($gap as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                    echo '<th style="text-align: center;">';
                                                    $selisih = $ln->nilai - $ln->nilai_target;
                                                    if ($selisih == 0) {
                                                        echo 5;
                                                    }elseif ($selisih == 1) {
                                                        echo 4.5;
                                                    }elseif ($selisih == -1) {
                                                        echo 4;
                                                    }elseif ($selisih == 2) {
                                                        echo 3.5;
                                                    }elseif ($selisih == -2) {
                                                        echo 3;
                                                    }elseif ($selisih == 3) {
                                                        echo 2.5;
                                                    }elseif ($selisih == -3) {
                                                        echo 2;
                                                    }elseif ($selisih == 4) {
                                                        echo 1.5;
                                                    }elseif ($selisih == -4) {
                                                        echo 1;
                                                    }
                                                    echo "</th>";
                                                } ?>
                                            <?php endforeach ?>
                                             </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>

                                <br>

                                <h4><small class="label label-info">Nilai Core Factor :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" rowspan="2">No</th>
                                            <th style="text-align: center;" rowspan="2">NIK</th>
                                            <th style="text-align: center;" rowspan="2">Nama Karyawan</th>
                                            <?php $no = 1; foreach($get_core_kriteria as $ln):
                                                $no++;
                                          endforeach ?>
                                            <th style="text-align: center;" colspan="<?=$no-1;?>" >Nilai Kriteria Core Factor</th>
                                            <th style="text-align: center;" rowspan="2">Nilai Core Factor</th>
                                        </tr>
                                        <tr class="active">
                                        <?php $no = 1; foreach($get_core_kriteria as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($get_core as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                            <?php foreach($core as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                    echo '<th style="text-align: center;">';
                                                    $selisih = $ln->nilai - $ln->nilai_target;
                                                    if ($selisih == 0) {
                                                        echo 5;
                                                    }elseif ($selisih == 1) {
                                                        echo 4.5;
                                                    }elseif ($selisih == -1) {
                                                        echo 4;
                                                    }elseif ($selisih == 2) {
                                                        echo 3.5;
                                                    }elseif ($selisih == -2) {
                                                        echo 3;
                                                    }elseif ($selisih == 3) {
                                                        echo 2.5;
                                                    }elseif ($selisih == -3) {
                                                        echo 2;
                                                    }elseif ($selisih == 4) {
                                                        echo 1.5;
                                                    }elseif ($selisih == -4) {
                                                        echo 1;
                                                    }
                                                    echo "</th>";
                                        
                                                } endforeach ?>
                                        <?php 
                                            echo '<th style="text-align: center;">';
                                            echo $value->nilai_cf;
                                            echo '</th>';
                                        } ?>
                                        </tr>
                                    </tbody>
                                </table>

                                <br>

                                <h4><small class="label label-info">Nilai Secondary Factor :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" rowspan="2">No</th>
                                            <th style="text-align: center;" rowspan="2">NIK</th>
                                            <th style="text-align: center;" rowspan="2">Nama Karyawan</th>
                                            <?php $no = 1; foreach($get_secondary_kriteria as $ln): 
                                            $no++;
                                            endforeach; ?>
                                            <th style="text-align: center;" colspan="<?=$no-1;?>" >Nilai Kriteria Secondary Factor</th>
                                            <th style="text-align: center;" rowspan="2">Nilai Core Factor</th>
                                        </tr>
                                        <tr class="active">
                                        <?php $no = 1; foreach($get_secondary_kriteria as $ln): ?>
                                            <th style="text-align: center;">K<?=substr($ln->kode_kriteria,2,3); ?></th>
                                        <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($get_secondary as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                            <?php foreach($secondary as $ln): ?>
                                                <?php if ($ln->nik_tahun == $value->nik_tahun) {
                                                    echo '<th style="text-align: center;">';
                                                    $selisih = $ln->nilai - $ln->nilai_target;
                                                    if ($selisih == 0) {
                                                        echo 5;
                                                    }elseif ($selisih == 1) {
                                                        echo 4.5;
                                                    }elseif ($selisih == -1) {
                                                        echo 4;
                                                    }elseif ($selisih == 2) {
                                                        echo 3.5;
                                                    }elseif ($selisih == -2) {
                                                        echo 3;
                                                    }elseif ($selisih == 3) {
                                                        echo 2.5;
                                                    }elseif ($selisih == -3) {
                                                        echo 2;
                                                    }elseif ($selisih == 4) {
                                                        echo 1.5;
                                                    }elseif ($selisih == -4) {
                                                        echo 1;
                                                    }
                                                    echo "</th>";
                                        
                                                } endforeach ?>
                                        <?php 
                                            echo '<th style="text-align: center;">';
                                            echo $value->nilai_sf;
                                            echo '</th>';
                                        } ?>
                                        </tr>
                                    </tbody>
                                </table>

                                <br>

                                <h4><small class="label label-info">Nilai Total :</small></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th style="text-align: center;" >No</th>
                                            <th style="text-align: center;" >NIK</th>
                                            <th style="text-align: center;" >Nama Karyawan</th>
                                            <th style="text-align: center;" >Nilai Core Factor<br>(60%)</th>
                                            <th style="text-align: center;" >Nilai Secondary Factor<br>(40%)</th>
                                            <th style="text-align: center;" >Nilai Total</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    $no=1;
                                    foreach ($ambil_data_sec_cor as $key => $value) { ?>
                                        <tr>
                                            <td width="5%" style="text-align: center;"><?= $no++; ?></td>
                                            <td><?= $value->nik; ?></td>
                                            <td><?= $value->nama_kariawan; ?></td>
                                        <?php 
                                             echo '<th style="text-align: center;">';
                                             echo $value->nilai_cf;
                                             echo '</th>';
                                            echo '<th style="text-align: center;">';
                                            echo $value->nilai_sf;
                                            echo '</th>';
                                            echo '<th style="text-align: center;">';
                                            echo $value->nilai_total;
                                            echo '</th>';
                                        } ?>
                                        </tr>
                                    </tbody>
                                </table>
    </div>
</div>
    
