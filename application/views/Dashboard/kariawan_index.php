        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard <small><?= $this->session->userdata('nama_level'); ?></small> </h1>
                    <hr size="10px">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Selamat datang <b><?= $this->session->userdata('nama_pengguna'); ?></b> di dashboard! <br>
                        Anda login sebagai <b><?= $this->session->userdata('nama_level'); ?></b> <br>   
                        Gunakan sisitem ini untuk pengambilan keputusan penentuan penerimaan bonus karyawan. 
                        
                        <br/>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-12">
                <div class="bs-example">
                <div class="alert alert-dismissable alert-warning">
                    <div class="row">
                        <div class="col-md-9">
                            <p style="color:black;">
                                <?php if ( empty($kariawan_data->nilai_cf)) { ?>
                                    <h4 style="color:black;">Anda belum di nilai pada tahun <?=date('Y');?></h4>
                                <?php }else{?>
                                    <?php $cek1 = substr($rank->ra, 0,2).'.78';
                                        if ($kariawan_data->nilai_ra == $cek1) { ?>
                                            <h4 style="color:black;">Selamat kepada <?=$kariawan_data->nama_kariawan;?></h4>
                                            <h4 style="color:black;">Anda Mendapatkan Bonus</h4>
                                    <?php  }else{ ?>
                                                <h4 style="color:black;">Anda Belum Beruntung Untuk Mendapatkan Bonus Karyawan.</h4>
                                                <h4 style="color:black;">Silahkan Bekerja Lebih Giat Lagi Agar Bisa Mendapatkan Bonus.</h4>
                                    <?php  } ?>
                                <?php } ?>
                        </div>
                        <div class="col-md-3">
                                <p style="color:black;">
                                        <?= 'Tanggal Penilaian : ' . date('d F Y', strtotime($kariawan_data->tanggal)); ?>
                                </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>


            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">
                                <?php if (empty($kariawan_data->nilai_cf)) {
                                    echo '0';
                                }else{
                                    echo $kariawan_data->nilai_cf;
                                } ?>
                                </p>
                                <p class="alerts-text">Core</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">
                                <?php if (empty($kariawan_data->nilai_sf)) {
                                    echo '0';
                                }else{
                                    echo $kariawan_data->nilai_sf;
                                } ?>
                                </p>
                                <p class="alerts-text">Secondary</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">
                                <?php if (empty($kariawan_data->nilai_total)) {
                                    echo '0';
                                }else{
                                    echo $kariawan_data->nilai_total;
                                } ?>
                                </p>
                                <p class="alerts-text">Nilai Total</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">
                                <?php if (empty($kariawan_data->nilai_ra)) {
                                    echo '0';
                                }else{
                                    echo $kariawan_data->nilai_ra;
                                } ?>
                                </p>
                                <p class="alerts-text">Nilai Akhir</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Data diri <b><?= $this->session->userdata('nama_pengguna'); ?></b></h3>
                        </div>
                        <div class="panel-body">
                             <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="45%">NIK</th>
                                        <th width="3%">:</th>
                                        <th><?=$get_kariawan->nik;?></th>
                                    </tr>
                                        <th>Nama Karyawan</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->nama_kariawan;?></th>
                                    </tr>
                                    <tr>
                                        <th>Tahun Masuk</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->periode;?></th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal lahir</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->tanggal_lahir;?></th>
                                    </tr>
                                    <tr>
                                        <th>Tempat lahir</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->tempat_lahir;?></th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->jenis_kelamin;?></th>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->agama;?></th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->status;?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->alamat;?></th>
                                    </tr>
                                    <tr>
                                        <th>No Telpon</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->no_tlp;?></th>
                                    </tr>
                                    <tr>
                                        <th>Pendidikan Terakhir</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->pendidikan;?></th>
                                    </tr>
                                    <tr>
                                        <th>Divisi</th>
                                        <th>:</th>
                                        <th><?=$get_kariawan->nama_divisi;?></th>
                                    </tr>
                                    
                                    
                                </thead>
                              </table>
                              <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Data nilai kriteria </h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                        <th>Gap</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($get_kr_pn as $key => $value) { ?>
                                    <tr>
                                        <td><?=$value->nama_kriteria;?></td>
                                        <th style="text-align:center;"><?=$value->nilai;?></th>
                                        <th style="text-align:center;"><?=$value->nilai_gap;?></th>
                                        <th style="text-align:center;"><?=$value->nilai_bobot;?></th>
                                    </tr>
                             <?php } ?> 
                                </tbody>
                              </table>
                              <br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Data nilai core, secondary, total dan akhir </h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nilai Core Factor</th>
                                        <th>:</th>
                                        <th>
                                        <?php if (empty($kariawan_data->nilai_cf)) {
                                            echo "0";
                                        }else{
                                            echo $kariawan_data->nilai_cf;
                                        }
                                        ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Secondary Fsctor</th>
                                        <th>:</th>
                                        <th>
                                        <?php if (empty($kariawan_data->nilai_sf)) {
                                            echo "0";
                                        }else{
                                            echo $kariawan_data->nilai_sf;
                                        }
                                        ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Total</th>
                                        <th>:</th>
                                        <th>
                                        <?php if (empty($kariawan_data->nilai_total)) {
                                            echo "0";
                                        }else{
                                            echo $kariawan_data->nilai_total;
                                        }?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Akhir</th>
                                        <th>:</th>
                                        <th>
                                        <?php if (empty($kariawan_data->nilai_ra)) {
                                            echo "0";
                                        }else{
                                            echo $kariawan_data->nilai_ra;
                                        }?>
                                        </th>
                                    </tr>
                                    
                                </thead>
                              </table>
                              <br>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /#wrapper -->
