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
			<div class="header-top hidden-xs hidden-sm">
				<?php
					if($banner_top){
						
						echo '<div class="col-xs-12 col-md-12 col-sm-12 bannerbt"><div class="container">';
						//print_r($banner_top);
						foreach($banner_top as $lsttop){
						
				?>
								
						<div class="col-xs-4 col-md-4 col-sm-4">
							<a href="<?php echo $lsttop->banner_link; ?>" target='parent'>
								<?php echo $lsttop->banner_text; ?>
							</a>
						</div>
				<?php
						}
						echo "</div></div>";
					}
				?>
				<div class="col-xs-12 col-md-12 col-sm-12 div-search">
					<div class="container">
						<div class="col-xs-9 col-md-9 col-sm-9">
							
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3  pull-right">
							<input type="text" class="form-control Search" placeholder="Search for...">
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="col-xs-9 col-md-9 col-sm-9">
								<a href="<?php echo base_url()?>"  class="img-responsive" target="_self" title="Maisya" ><img src='<?php echo base_url() ?>/assets/img/logo.png' border='0' class='logo'  height="70px"></a>
							</div>
							<div class="col-xs-3 col-md-3 col-sm-3   pull-right mtmenu">
								<div class="col-xs-12 col-md-12 col-sm-12 right-logo">
									<div class="col-xs-12 col-md-12 col-sm-12 top-menu">
										<div class="col-xs-1 col-md-1 col-sm-1">
											<i class="fa fa-user"></i>
										</div>
										<div class="col-xs-10 col-md-10 col-sm-10">
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


													<!--<a class="btn btn-profile col-xs-4 col-md-4 col-sm-4" href="<?php echo base_url() ?>profile">Profile</a>
													<a class="btn btn-danger col-xs-2 col-md-2 col-sm-2" href="<?php echo base_url() ?>home/logout"><i class="fas fa-sign-out-alt"></i></a>-->
											<?php	
												}
											?>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12 top-menu">
										<div class="col-xs-1 col-md-1 col-sm-1">
											<i class="fas fa-heart"></i>
										</div>
										<div class="col-xs-7 col-md-7 col-sm-7">
											<a href="<?php echo  base_url()?>wishlist" >Wishlist </a>
										</div>
										<div class="col-xs-1 col-md-1 col-sm-1">
											<span class="badge bagetop" id="totalwhs"><?php echo $totalwhs ?></span>
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12  top-menu">
										<div class="col-xs-1 col-md-1 col-sm-1">
											<i class="fas fa-briefcase"></i>
										</div>
										<div class="col-xs-7 col-md-7 col-sm-7">
											<a href="<?php echo  base_url()?>checkout" >Shopping Bag </a>
										</div>
										<div class="col-xs-1 col-md-1 col-sm-1">
											<span class="badge bagetop"><?php echo $totalqty?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="topMenu">
				<div class="">
					<div class="row">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="navbar navbar-default navbar-static-top">
							   <div class="container">
								  <div class="navbar-header" >
									 <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
									 <a class="navbar-brand" href="<?php echo base_url()?>"><img alt="Logo" src="<?php echo base_url() ?>/assets/img/logo.png"></a>
									 <div class="hidden-lg head-icon">
										 <i class="fas fa-heart"></i> &nbsp;<span class="badge bagetop" id="totalwhs"><?php echo $totalwhs ?></span>
										 <i class="fas fa-briefcase"></i> &nbsp;<span class="badge bagetop" id="totalwhs"><?php echo $totalqty ?></span>
									</div>
									 
								  </div>
								  <div class="navbar-inverse in hidden-xs hidden-sm">
										 <ul>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">RINGS<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/all">All Rings</a></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/gemstone">Gemstone Rings</a></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/engagement">Engagement Rings</a></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/solitaire">Solitaire Rings</a></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/wedding">Wedding Rings</a></li>
														
													 </ul>
												  </li>
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?><?php echo base_url() ?>category/rings/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/rings/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														RINGS
														</h2>
													</div>
													<div class="col-sm-12 col-md-12" > 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Rings ?>" class="pull-right" height="210px">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">EARRINGS<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/all">All Earrings</a></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/everyday">Everyday</a></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/solitaireearrings">Solitaire Earrings</a></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/littlelovelies">Little Lovelies</a></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/studearrings">Stud Earrings</a></li>
														
													 </ul>
												  </li>
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?><?php echo base_url() ?>category/earrings/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/earrings/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														EARRINGS
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<div class="col-sm-12 col-md-12"> 
															<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Earrings ?>" class="pull-right" height="210px">
														</div>
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">BRACELETS<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/all">All Bracelets</a></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/bangle">Bangle</a></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/chain">Chain</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/bracelet/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														BRACELETS
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Bracelets ?>" class="pull-right" height="210px">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">GEMSTONE<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/all">All Stone</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/alexandrite">Alexandrite Stone</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/cateye">Cat Eyes Stone</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/diamond">Diamond Stone</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/emerald">Emerald Stone</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/ruby">Ruby Stone</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/sapphire">Shappire Stone</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3">
													  <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?><?php echo base_url() ?>category/gemstone/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/gemstone/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														GEMSTONE
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Gemstone ?>" class="pull-right" height="210px">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">JEWELLERY<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/all">All Jewellery</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/diamond_jewellery">Diamond Jewellery</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/colorstonejew">Color Stone Jewellery</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/pearljew">Pearl Jewellery	pearljew</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/fancy_color_jewellery">Fancy Colour Diamond Jewellery</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/solitairejew">Solitaire Jewellery</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/weddingjew">Wedding Jewellery</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?><?php echo base_url() ?>category/jewellery/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/jewellery/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														JEWELLERY
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Jewellery ?>" class="pull-right" height="210px">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">PENDANT<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/all">All Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/diamond">Diamond Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/gemstone">Gemstone Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/color_diamond">Color Diamond Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/pearl">Pearl Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/silver">Silver Pendant</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?><?php echo base_url() ?>category/pendant/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6"  style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														PENDANT
														</h2>
													</div>
													<div class="col-sm-12 col-md-12 hidden-sm"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Engangement ?>" class="pull-right" height="210px">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											    <a href="#" class="dropdown-toggle" data-toggle="dropdown">SALE !<b class="caret hidden-lg"></b></a>
											   <ul class="dropdown">
													
												  <li class="col-sm-6">
													 <ul>
														<li class="dropdown-header">Discount</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>disc/10">Discount 10%</a></li>
														<li><a href="<?php echo base_url() ?>disc/20">Discount 20%</a></li>
														<li><a href="<?php echo base_url() ?>disc/30">Discount 30%</a></li>
														<li><a href="<?php echo base_url() ?>disc/40">Discount 40%</a></li>
														<li><a href="<?php echo base_url() ?>disc/50">Discount 50% and Above</a></li>
													 </ul>
												  </li>
												   <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														SALE !
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $sale ?>" class="pull-right" height="210px">
													</div>
												  </li>
												</ul>
											</li>
										 </ul>
										 <ul class="nav navbar-nav navbar-right">
											
										</ul>
								  </div>
							   
									<div class="navbar-inverse side-collapse in">
									  <nav role="navigation" class="navbar-collapse">
										<ul class="nav navbar-nav">
											<li>
												<?php 
													if(!$this->session->userdata('cust_name')){
												?>	
													
													<a href="#" class="btn btn-signinmob" data-toggle="modal" data-target="#myModal">Login / Sign Up</a>
												<?php	
													}else{
												?>
											   
												   <a href="#" class="btn btn-signinmob">
														Hi, &nbsp;
														<?php 
															$data = explode(" ",$this->session->userdata('cust_name'));
															echo $data[0]; 
														?>
													</a>
												<?php
													}
												?>
											</li>
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">RINGS
													<b class="caret"></b>
												</a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														 <ul>
															
															<li><a href="<?php echo base_url() ?>category/rings/type/all">All Rings</a></li>
															<li><a href="<?php echo base_url() ?>category/rings/type/gemstone">Gemstone Rings</a></li>
															<li><a href="<?php echo base_url() ?>category/rings/type/engagement">Engagement Rings</a></li>
															<li><a href="<?php echo base_url() ?>category/rings/type/solitaire">Solitaire Rings</a></li>
															<li><a href="<?php echo base_url() ?>category/rings/type/wedding">Wedding Rings</a></li>
															
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">EARRINGS<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/earrings/type/all">All Earrings</a></li>
															<li><a href="<?php echo base_url() ?>category/earrings/type/everyday">Everyday</a></li>
															<li><a href="<?php echo base_url() ?>category/earrings/type/solitaireearrings">Solitaire Earrings</a></li>
															<li><a href="<?php echo base_url() ?>category/earrings/type/littlelovelies">Little Lovelies</a></li>
															<li><a href="<?php echo base_url() ?>category/earrings/type/studearrings">Stud Earrings</a></li>
															
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">BRACELETS<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/bracelet/type/all">All Bracelets</a></li>
															<li><a href="<?php echo base_url() ?>category/bracelet/type/bangle">Bangle</a></li>
															<li><a href="<?php echo base_url() ?>category/bracelet/type/chain">Chain</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">GEMSTONE<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/gemstone/type/all">All Stone</a></li>
															<li><a href="<?php echo base_url() ?>category/gemstone/type/alexandrite">Alexandrite Stone</a></li>
															<li><a href="<?php echo base_url() ?>category/gemstone/type/cateye">Cat Eyes Stone</a></li>
															<li><a href="<?php echo base_url() ?>category/gemstone/type/diamond">Diamond Stone</a></li>
															<li><a href="<?php echo base_url() ?>category/gemstone/type/emerald">Emerald Stone</a></li>
															<li><a href="<?php echo base_url() ?>category/gemstone/type/ruby">Ruby Stone</a></li>
															<li><a href="<?php echo base_url() ?>category/gemstone/type/sapphire">Shappire Stone</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">JEWELLERY<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/jewellery/type/all">All Jewellery</a></li>
															<li><a href="<?php echo base_url() ?>category/jewellery/type/pendant">Pendant Diamond</a></li>
															<li><a href="<?php echo base_url() ?>category/jewellery/type/fancy_color_jewellery">Collered Diamond</a></li>
															<li><a href="<?php echo base_url() ?>category/jewellery/type/diamond_jewellery">Diamond Jewellery</a></li>
															<li><a href="<?php echo base_url() ?>category/jewellery/type/gemstone_jewellery">Gemstone Jewellery</a></li>
															<li><a href="<?php echo base_url() ?>category/jewellery/type/pearl">Pearl Jewellery</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">ENGAGEMENT<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/engangement/type/bridalsets">Bridal Sets</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">PENDANT<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/all">All Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/diamond">Diamond Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/gemstone">Gemstone Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/color_diamond">Color Diamond Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/pearl">Pearl Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/pendant/type/silver">Silver Pendant</a></li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown">DISCOUNT<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															<li><a href="<?php echo base_url() ?>disc/10">Discount 10%</a></li>
															<li><a href="<?php echo base_url() ?>disc/20">Discount 20%</a></li>
															<li><a href="<?php echo base_url() ?>disc/30">Discount 30%</a></li>
															<li><a href="<?php echo base_url() ?>disc/40">Discount 40%</a></li>
															<li><a href="<?php echo base_url() ?>disc/50">Discount 50% and Above</a></li>
														 </ul>
													</li>
												</ul>
											</li>
										</ul>
									  </nav>
									</div>
							   </div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</header>
		<script>
			$(document).ready(function() {   
				var sideslider = $('[data-toggle=collapse-side]');
				var sel = sideslider.attr('data-target');
				var sel2 = sideslider.attr('data-target-2');
				sideslider.click(function(event){
					$(sel).toggleClass('in');
					$(sel2).toggleClass('out');
				});
				
				
			});
		</script>
		<div class="side-collapse-container">