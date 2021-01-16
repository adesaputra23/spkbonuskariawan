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
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-bars fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?=$jml_kriteria;?></p>
                                <p class="alerts-text">Kriteria</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-address-book fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?=$jml_kariawan;?></p>
                                <p class="alerts-text">Karyawan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-calculator fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?=$jml_penilaian;?></p>
                                <p class="alerts-text">Penilaian Tahun <?=date('Y')?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-user-circle-o fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"><?=$jml_pengguna;?></p>
                                <p class="alerts-text">User</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
    <!-- /#wrapper -->
