 <!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Maisya :: Propolis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcout icon" href="assets/img/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>assets/img/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/apple-touch-icon.png">
 <link href="<?php echo base_url()?>assets_front/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets_front/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>templates/hexa/assets/css/combined.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
      <link rel='stylesheet' href="<?php echo base_url() ?>templates/hexa/assets/css/style5.css" />
    
      <link rel='stylesheet' href="<?php echo base_url() ?>templates/hexa/assets/css/style-login.css" />
      <link rel='stylesheet' href="<?php echo base_url()?>assets_front/css/jquery-ui.min.css" />
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  
  <script src='<?php echo base_url() ?>templates/hexa/assets/js/kilatte.js'></script>

    


  <style type="text/css">
    .navbar .navbar-brand .logo img {
      border: none;
      border-radius: 0px;
      height: 60px;
    }

    .navbar .navbar-brand a {
      padding-left: 0px;
    }
  </style>

      
  </head>


<body  >
<div class="container nav-small">
        <div class="row">
          <nav class="navbar" role="navigation">
            <div class="navbar-header">
              <div class="navbar-brand">
                <a href="<?php echo base_url()."customer"?>">
					<img src="<?php echo base_url()?>assets_front/images/logo.png" class="img-circle" style="width:30px; height:30px;" >
					<span style="font-size:14px;">Maisya :: Propolis</span>
                </a>
              </div>
              <i class="fa fa-bars fa-lg btn-nav-toggle-responsive"></i>
            </div>
          </nav>
        </div>
      </div>

      <div class="site-holder container ">
		 <div class="box-holder">
			<div class="left-sidebar">
				<div title="" data-original-title="" class="sidebar-holder">
					<ul class="nav nav-list">      
					  <li class="left-header">
							<a style ="
								background-color: #fff;
								border: none;
								color: #ffffff;
								font-size: 14px;
								font-weight: 400;
								margin: 0px;
								padding: 0px;
								text-align: center;
								width: 100%;
							"
							href="<?php echo base_url()."customer"?>">
								<img style="width: 20%;height: 20%" src="<?php echo base_url()?>assets_front/images/logo_2.png" />
							</a>
							<b>PT. Maisya Makmur</b>
							
							<br />
					  </li>
					  <li class="profil <?php echo $profile ?>">
						<a style="background:#fff;" href="<?php echo base_url() ?>profile">
							<span class="left-login">
								Hi, <?php echo $profilename ?>
							</span>
						</a>
					  </li>
					  <?php
						if(!$this->session->userdata("status")){
					  ?>
					  <li>
						<a data-original-title="Login" href="<?php echo base_url() ?>customer">Beranda</a> 
					  </li> 
					  
					  <li class="<?php echo $membership ?>">
						<a data-original-title="Order" href="#">Membership<i class="icon icon-arrow-right"></i> </a> 
							<ul class="child_menu cmembership">
								<li> <a href="#">Saldo & Point </a></li>
								<li <?php echo $afiliasi?>> <a href="<?php echo base_url()?>afiliasi">Afiliasi </a> </li>
							</ul>
						
					  </li>
					  <li class="<?php echo $pembelian ?>">
						<a data-original-title="Order" href="<?php echo base_url() ?>pembelian">Pembelian</a>
					  </li>
					  <li class="<?php echo $dukungan ?>">
						<a data-original-title="Order" href="#">Dukungan</a>
							<ul class="child_menu cmembership">
								<li> <a href="#">Chat </a></li>
								<li <?php echo $afiliasi?>> <a href="<?php echo base_url()?>alatbantu">Alat Pemasaran </a> </li>
							</ul>
					  </li>
					  <?php
						}else{
					  ?>
						<li class="<?php echo $pembelian ?>">
							<a data-original-title="Login" href="<?php echo base_url() ?>pembelian/paket">Paket Platinum</a> 
						  </li>
					  <?php
						}
					  ?>
					  <li class="<?php echo $promo ?>">
						<a data-original-title="Order" href="<?php echo base_url() ?>promo">Promo</a>
					  </li>
					</ul>
				   
				</div>
				<div style="position:absolute;margin-left:20px;color: #fff; width:200px;bottom:2%">
					Copyright @ 2018
				</div>
			</div> 
			
			<?php
				if($open_child == 'openchild')
				{
			?>	
					<script>
						$(document).ready(function(){
							$(".cmembership").show();
						});
					</script>
			<?php
				}
			?>