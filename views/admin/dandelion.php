<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="<?php echo base_url() ?>assets-front/img/favicon.ico" rel="icon" type="image/x-icon" />
        <title>Maisya Admin</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets-front/css/style.css" />
		<style>
		 input.btn-gabung[type="submit"] {
				background: #d42227 none repeat scroll 0 0;
				border-radius: 2px;
				color: #fff;
				display: inline-block;
				font-family: "gothammedium",sans-serif;
				font-size: 110%;
				font-weight: normal;
				margin: 2.5% auto 0;
				padding: 1.2%;
				position: relative;
				text-align: center;
				text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
				text-transform: uppercase;
				width: 23%;
			}
		</style>
        <!-- CSS Reset -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/reset.css" media="screen" />
        <!--  Fluid Grid System -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/fluid.css" media="screen" />
        <!-- Theme Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/dandelion.theme.css" media="screen" />
        <!--  Main Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/dandelion.css" media="screen" />
        <!-- Demo Stylesheet -->
		<?php echo $css_header ?>
        <meta charset="utf-8" />
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
		
		
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
		
        <script src="<?php echo base_url() ?>assets/grocery_crud/js/dandelion.core.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets-front/css/bootstrap.min.css" media="screen" />
        <body>

            <!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
            <div id="da-wrapper" class="fluid">

                <!-- Header -->
                <div id="da-header">

                    <div id="da-header-top">

                        <!-- Container -->
                        <div class="da-container clearfix">

                            <!-- Logo Container. All images put here will be vertically centere -->
                            <div id="da-logo-wrap">
                                <div id="da-logo">
                                    <div id="da-logo-img">
                                        <h1 style="margin-bottom: 0px !important; font-weight: bold">Maisya - ADMIN PANEL</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Toolbar Menu -->
                            <div id="da-header-toolbar" class="clearfix">
                                <div id="da-header-button-container">
                                    <ul>
                                        <li class="da-header-button logout">
                                            <a href="<?php echo base_url() ?>admin/home/logout">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="da-header-bottom">
                        <!-- Container -->
                        <div class="da-container clearfix">
                            <!-- Breadcrumbs -->
                            <div id="da-breadcrumb">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>admin"><img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/16/home.png" alt="Home" />Dashboard</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div id="da-content">
                    <!-- Container -->
                    <div class="da-container clearfix">

                        <!-- Sidebar Separator do not remove -->
                        <div id="da-sidebar-separator"></div>
							
							<?php
								$this->load->view("admin/nav"); 
							?>
                       
                        <div id="da-content-wrap" class="clearfix">
                            <!-- Content Area -->
                            <div id="da-content-area">
                                <?php echo $output ?>
								<?php echo $js_footer ?>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div id="da-footer">
                    <div class="da-container clearfix">
                        <p>Copyright 2018. Maisya. All Rights Reserved.
                    </div>
                </div>

            </div>

        </body>
</html>
