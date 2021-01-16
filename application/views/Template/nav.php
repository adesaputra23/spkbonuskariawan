<div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <div class="row">
                <div class="col-md-6">
                <img style="margin-top:3px;margin-left:3px;" src="<?= base_url('assets/img/logo2.png'); ?>" alt="">
                </div>
            </div>
            
                
                
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
             <ul class="nav navbar-nav side-nav">

            <?php if ($this->session->userdata('id_level') == '1') { ?>

                    <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="<?= base_url('Kriteria'); ?>"><i class="fa fa-database" aria-hidden="true"></i> Data Kriteria</a></li>
                    <li><a href="<?= base_url('Divisi'); ?>"><i class="fa fa-database" aria-hidden="true"></i> Data Divisi</a></li>
                    <li><a href="<?= base_url('Kariawan'); ?>"><i class="fa fa-database" aria-hidden="true"></i> Data Karyawan</a></li>
                    <li><a href="<?= base_url('Penilaian'); ?>"><i class="fa fa-tasks"></i> Penilaian</a></li>
                    <li><a href="<?= base_url('Perangkingan'); ?>"><i class="fa fa-list-ol" aria-hidden="true"></i> Perangkingan</a></li>
                    <li><a href="<?= base_url('Dashboard/grafik/')?>?tahun=<?=date('Y')?>"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grafik</a></li>
                    <li><a href="<?= base_url('User'); ?>"><i class="fa fa-database" aria-hidden="true"></i>  Data Pengguna</a></li>
               
                <?php } ?>

                <?php if ($this->session->userdata('id_level') == '2') { ?>

                    <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="<?= base_url('Pimpinan/view_kriteria'); ?>"><i class="fa fa-database" aria-hidden="true"></i>  Kriteria</a></li>
                    <li><a href="<?= base_url('Pimpinan/view_divisi'); ?>"><i class="fa fa-database" aria-hidden="true"></i>  Divisi</a></li>
                    <li><a href="<?= base_url('Pimpinan/view_kariyawan'); ?>"><i class="fa fa-database" aria-hidden="true"></i>  Karyawan</a></li>
                    <li><a href="<?= base_url('Pimpinan/laporan_penilaian'); ?>"><i class="fa fa-file" aria-hidden="true"></i>  Laporan Penilaian</a></li>
                    <li><a href="<?= base_url('Pimpinan/perangkingan'); ?>"><i class="fa fa-list-ol" aria-hidden="true"></i>  Perangkingan</a></li>
                    <li><a href="<?= base_url('Dashboard/grafik/')?>?tahun=<?=date('Y')?>"><i class="fa fa-bar-chart" aria-hidden="true"></i>  Grafik</a></li>

                <?php } ?>

                <?php if ($this->session->userdata('id_level') == '3') { ?>

                    <li><a href="<?= base_url('Dashboard/kariawan_index'); ?>"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="<?= base_url('Dashboard/kriteria_kariawan'); ?>"><i class="fa fa-database" aria-hidden="true"></i>  Kriteria</a></li>
                    <li><a href="<?= base_url('Dashboard/kariawan_perangkingan'); ?>"><i class="fa fa-list-ol" aria-hidden="true"></i>  Perangkingan</a></li>
                    <li><a href="<?= base_url('Dashboard/data_nilai_kariawan')?>?nik=<?=$this->session->userdata('nik');?>"><i class="fa fa-list-ol" aria-hidden="true"></i>  Data Nilai</a></li>
                    <li><a href="<?= base_url('Dashboard/grafik/')?>?tahun=<?=date('Y')?>"><i class="fa fa-bar-chart" aria-hidden="true"></i>  Grafik</a></li>

                <?php } ?>

                 </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata('nama_pengguna'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('User/profil/')?>?nik=<?=$this->session->userdata('id_pengguna');?>"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="<?= base_url('User/tentang_sistem')?>"><i class="fa fa-th-large"></i> Tentang Sistem</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url('Auth/Logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>