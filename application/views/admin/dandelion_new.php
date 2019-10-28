<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="<?php echo base_url() ?>assets-front/img/favicon.ico" rel="icon" type="image/x-icon" />
        <title>HokBen Admin</title>
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
                                        <h1 style="margin-bottom: 0px !important; font-weight: bold">HokBen - ADMIN PANEL</h1>
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

                        <!-- Sidebar -->
                        <div id="da-sidebar">
							<?php
								if($this->session->userdata('who') != 13)
								{
							?>
                            <!-- Main Navigation -->
                            <div id="da-main-nav" class="da-button-container">
                                <ul>
                                    <li class="<?php echo $nav == 'order' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/order">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/shopping_basket.png" alt="Order" />
                                            </span>
                                            Order
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'menu' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/menu">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/plate_diner.png" alt="Menu" />
                                            </span>
                                            Menu
                                        </a>
                                        <ul class="<?php echo $nav == 'menu' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/menu/category">Categories</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/menu/">Menu</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/menu/menu_special">Special</a></li>
                                        </ul>
                                    </li>

<!--                                    <li class="<?php echo $nav == 'promo' ? 'active' : '' ?>">
    <a href="<?php echo base_url() ?>admin/promo">
         Icon Container 
        <span class="da-nav-icon">
            <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/presentation.png" alt="Menu" />
        </span>
        What's Hot
    </a>
</li>-->
                                    <li class="<?php echo $nav == 'reff' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/reff">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/tools.png" alt="Setting" />
                                            </span>
                                            Setting
                                        </a>
                                        <ul class="<?php echo $nav == 'reff' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/reff/changeMessage">Change Message</a></li>
                                             <li><a href="<?php echo base_url() ?>admin/reff/ingredient">Ingredient</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/reff/menu_show">Show Time</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/reff/city">City</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/reff/address_type">Address Type</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/reff/feature_store">Feature Store</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/reff/slideshow">Slideshow</a></li>
											<li><a href="<?php echo base_url() ?>admin/reff/setting">Setting</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?php echo $nav == 'loc' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/location">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/tags_2.png" alt="Location" />
                                            </span>
                                            Store Location
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'hot' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/whatshot">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/pacman.png" alt="Whats Hot" />
                                            </span>
                                            Whats Hot
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'customer' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/customer">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/user.png" alt="Customer" />
                                            </span>
                                            Customer
                                        </a>
                                        <ul class="<?php echo $nav == 'customer' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/customer">List Customer</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/customer/reservation">Reservation</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/customer/contact_us">Contact</a></li>
                                        </ul>
                                    </li>
									 <li class="<?php echo $nav == 'apps_backend' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/customer">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/iphone_4.png" alt="Apps Backend" />
                                            </span>
                                            Apps Backend
                                        </a>
                                        <ul class="<?php echo $nav == 'apps_backend' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/promo_apps">Banner Promo Apps</a></li>
											<li><a href="<?php echo base_url() ?>admin/promo_apps/setting_promo">Setting promo</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/detail_order_apps">Detail Order Apps</a></li>
											<li><a href="<?php echo base_url() ?>admin/tracking_store">Tracking Store Around Me</a></li>
											<li><a href="<?php echo base_url() ?>admin/promo_apps/minimum_fee">Minimum Fee</a></li>
											<li><a href="<?php echo base_url() ?>admin/mobile">Push Notification</a></li>
											<li><a href="<?php echo base_url() ?>admin/hokbentrivia">Hokben Trivia</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="<?php echo $nav == 'admin' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/user">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/locked.png" alt="Admin" />
                                            </span>
                                            Administration
                                        </a>
                                        <ul class="<?php echo $nav == 'admin' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/user">Users</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/user/department">Department</a></li>

                                            <li><a href="<?php echo base_url() ?>admin/user/career">Career</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/user/career_app_form">Who Apply</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/user/csr">CSR Activity</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/user/milestone">Milestone</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/user/sharetolove">Image ShareToLove</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/user/deliverycharge">Delivery Charge</a></li>
                                            
                                        </ul> 
                                    </li>
                                    <li>
                                        <div align="center"><img src="<?php echo base_url() ?>assets-front/img/logo.png"/></div>
                                    </li>
                                </ul>
                            </div> 
							<?php
								}else{
							?>
								<div id="da-main-nav" class="da-button-container">
									<ul>
										 <li class="<?php echo $nav == 'apps_backend' ? 'active' : '' ?>">
											<a href="<?php echo base_url() ?>admin/customer">
												<!-- Icon Container -->
												<span class="da-nav-icon">
													<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/iphone_4.png" alt="Apps Backend" />
												</span>
												Apps Backend
											</a>
											<ul class="<?php echo $nav == 'apps_backend' ? '' : 'closed' ?>">
												<li><a href="<?php echo base_url() ?>admin/promo_apps">Banner Promo Apps</a></li>
												<li><a href="<?php echo base_url() ?>admin/promo_apps/setting_promo">Setting promo</a></li>
												<li><a href="<?php echo base_url() ?>admin/detail_order_apps">Detail Order Apps</a></li>
												<li><a href="<?php echo base_url() ?>admin/tracking_store">Tracking Store Around Me</a></li>
												<li><a href="<?php echo base_url() ?>admin/promo_apps/minimum_fee">Minimum Fee</a></li>
												<li><a href="<?php echo base_url() ?>admin/mobile">Push Notification</a></li>
												<li><a href="<?php echo base_url() ?>admin/promobank">Tombol Promo</a></li>
											</ul>
										</li>
									</ul>	
								</div>
							<?php
								}
							?>
                        </div>
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
                        <p>Copyright 2014. HokBen. All Rights Reserved.
                    </div>
                </div>

            </div>

        </body>
</html>
