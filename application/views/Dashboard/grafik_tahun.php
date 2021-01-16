        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Grafik <small>Grafik</small> </h1>
                    <hr size="10px">
                </div>

                <div class="container">
                <div class="row">
                                <div class="col-sm-8 btn-group">
                                 <button type="button" class="btn btn-default">Pilih Tahun</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($gt_tn as $key => $value) { ?>
                                            <li><a href="<?=base_url('Dashboard/grafik_tahun/')?>?tahun=<?=$value->tahun?>"><?=$value->tahun?></a></li>
                                       <?php } ?>
                                        
                                    </ul>
                                    <a href="<?=base_url('Dashboard/grafik_tahun_pdf')?>" class="btn btn-warning"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                                </div>
                </div>
                </div>
            
            <br>
                
            </div>
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Grafik Nilai Akhir</h3>
                        </div>
                        <div class="panel-body">
                            <canvas id="speedChart2" width="100" height="35"></canvas>
                        </div>
                    </div>
        </div>
    </div>
    <!-- /#wrapper -->