<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Deep Blue Admin</title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Blue_admin')?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Blue_admin')?>/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Blue_admin')?>/css/local.css" />

    <script type="text/javascript" src="<?= base_url('assets/Blue_admin')?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/Blue_admin')?>/bootstrap/js/bootstrap.min.js"></script>   
</head>
<body background = "<?= base_url('assets/img/login.jpg')?>">
        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12 text-center v-center">

                	<ul class="timeline">
                <li>
                	<br>
                	<br>
                	<br>
                	<br>
                	<br>
                    
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                             <h4 class="timeline-title" align="left">Login</h4> 
                        </div>
                        <div>
                        	<p align="left">SPK Penentuan Bonus Kariawan</p>
                        </div>
                        <div class="timeline-body">
                           <form class="user" action="<?= base_url('auth/proses_login');?>" method="post">
                    <div class="form-group">
                      <input type="number" class="form-control form-control-user" name="nik" id="nik" aria-describedby="NIP" placeholder="Masukan NIP" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan pasword" required="">
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block" name="login">
                      Login
                    </button>
	                        
                        </div>
                    </div>
                </li>
            </ul>
        </form>
            <br>
                	<br>
                	<br>
                	<br>
                	<br>

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
  
</body>
</html>