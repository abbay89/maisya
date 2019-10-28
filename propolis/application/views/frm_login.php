<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Propolis :: Maisya </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets_front/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>assets_front/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>assets_front/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url()?>assets_front/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url()?>assets_front/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url()?>assets_front/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>assets_front/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>assets_front/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
      <div class="col-xs-12 col-md-12 col-sm-12">
		<div class="col-xs-12 col-md-12 col-sm-12 ">
			<div class="col-xs-0 col-md-9 col-sm-9">
			
			</div>
			<div class="col-xs-12 col-md-3 col-sm-3 conten-login">
				<div class="header_login">
					<img src="<?php echo base_url()?>assets_front/images/logo_2.png" />
					<div id="title">
						PT. Maisya Makmur
					</div>
				</div>
				<div class="formlogin">
					<form action="<?php echo base_url()?>login/submitnow" method="POST">
					  <div class="form-group">
						<input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					  </div>
					  <div class="form-group">
						<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>
					  <div class="form-group">
						<input type="submit" class="form-control btn btn-login" value="LOGIN">
					  </div>
					</form>
				</div>
				<?php	
					//print_r($_REQUEST);
					if($_REQUEST['err'] == 'new'){
				?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
								
								<p>
									Selamat data Anda telah tercatat dalam datbase kami,  untuk mengaktifkan akun anda silahkan lakukan belanja paket platinum yang telah kami sediakan,silahkan klik link berikut
								</p>
							
						</div>
					</div>
				<?php
					}
				?>
				
			</div>
		</div>
		
	  </div>

	<!-- jQuery -->
    <script src="<?php echo base_url()?>assets_front/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets_front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
	<script>
	
		$(document).ready(function() {
			
			windowHeight = screen.height * (100/100);
			$('.conten-login').css({'height':screen.height,'background':'#fff'}); 
			 
		});
	</script>
  </body>
</html>
