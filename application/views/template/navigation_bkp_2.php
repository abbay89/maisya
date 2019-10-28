<script>
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 100) {
			$(".header-top").hide();
		}
		else {
			$(".header-top").show();
		}
	});
</script>
<header>
	<div class="header-top hidden-xs hidden-sm col-xs-12 col-md-12 col-sm-12 div-search">
		<div class="container ">
			<div class="col-xs-9 col-md-9 col-sm-9">
				
			</div>
			<div class="col-xs-3 col-md-3 col-sm-3 pull-right">
				<input type="text" class="form-control Search" placeholder="Search for...">
			</div>
		</div>
	</div>
	<div class="header-top hidden-xs hidden-sm col-xs-12 col-md-12 col-sm-12">
		<div class="container ">
			<div class="col-xs-9 col-md-9 col-sm-9 pull-left">
				<a href="<?php echo base_url()?>"  class="img-responsive" target="_self" title="Maisya" >
					<img src='<?php echo base_url() ?>/assets/img/logo.png' border='0' class='logo'  height="50px">
				</a>
			</div>
			<div class="col-xs-3 col-md-3 col-sm-3 pull-right">
				<div class= "right-mn">
					&nbsp;
				</div>
				<div class= "right-mn">
					<i class="fa fa-user"></i>&nbsp;
					<?php
						//echo $this->session->userdata('cust_username');
						if(!$this->session->userdata('cust_username')){
					?>
							<a href="#" data-toggle="modal" data-target="#myModal">Sign In / Register</a>
					<?php
						}else{
					?>
																		
					
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
									Hi, &nbsp;
									<?php 
										$data = explode(" ",$this->session->userdata('cust_name'));
										echo $data[0]; 
									?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">

									<li><a href="<?php echo base_url() ?>profile">Profile</a></li>

									<li><a href="<?php echo base_url() ?>home/logout">Logout</a></li>

								</ul>
							</div>
					<?php	
						}
					?>
				</div>
				<div class= "right-mn">
					<i class="fas fa-briefcase"></i>
					Wishlist <span class="badge">3</span>
				</div>
				<div class= "right-mn">
					<i class="fas fa-briefcase"></i>&nbsp;
					Shopping Bag <span class="badge"><?php echo $totalqty?></span>
				</div>
				
			</div>
		</div>
	</div>
	<div class="header-top hidden-xs hidden-sm col-xs-12 col-md-12 col-sm-12 div-menu">
		<div class="container ">
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="menu-container clearfix">
					<button class="nav_menu_toggler_icon"><span class="fa fa-bars"></span></button>
					<nav class="manu clearfix">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">About</a>
								<ul>
									<li><a href="#">School</a>
										<ul>
											<li><a href="#">Lidership</a></li>
											<li><a href="#">History</a></li>
											<li><a href="#">Locations</a></li>
											<li><a href="#">Careers</a></li>
										</ul>
									</li>
									<li><a href="#">Study</a>
										<ul>
											<li><a href="#">Undergraduate</a></li>
											<li><a href="#">Masters</a></li>
											<li><a href="#">International</a></li>
											<li><a href="#">Online</a></li>
										</ul>
									</li>
									<li><a href="#">Research</a>
										<ul>
											<li><a href="#">Undergraduate research</a></li>
											<li><a href="#">Masters research</a></li>
											<li><a href="#">Funding</a></li>
										</ul>
									</li>
									<li><a href="#">Something</a>
										<ul>
											<li><a href="#">Sub something</a></li>
											<li><a href="#">Sub something</a></li>
											<li><a href="#">Sub something</a></li>
											<li><a href="#">Sub something</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#">News</a>
								<ul>
									<li><a href="#">Today</a></li>
									<li><a href="#">Calendar</a></li>
									<li><a href="#">Sport</a></li>
								</ul>
							</li>
							<li><a href="#">Contact</a>
								<ul>
									<li><a href="#">School</a>
										<ul>
											<li><a href="#">Lidership</a></li>
											<li><a href="#">History</a></li>
											<li><a href="#">Locations</a></li>
											<li><a href="#">Careers</a></li>
										</ul>
									</li>
									<li><a href="#">Study</a>
										<ul>
											<li><a href="#">Undergraduate</a></li>
											<li><a href="#">Masters</a></li>
											<li><a href="#">International</a></li>
											<li><a href="#">Online</a></li>
										</ul>
									</li>
									<li><a href="#">Study</a>
										<ul>
											<li><a href="#">Undergraduate</a></li>
											<li><a href="#">Masters</a></li>
											<li><a href="#">International</a></li>
											<li><a href="#">Online</a></li>
										</ul>
									</li>
									<li><a href="#">Empty sub</a></li>
								</ul>
							</li>
							<li><a href="#">About Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>