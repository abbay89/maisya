
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
						<div class="col-xs-12 col-md-12 col-sm-12">
							
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="col-xs-3 col-md-3 col-sm-3">
								<a href="<?php echo base_url()?>"  class="img-responsive" target="_self" title="Maisya" ><img src='<?php echo base_url() ?>/assets/img/logo.png' alt="maisya_jewellery"  title="maisya_jewellery" border='0' class='logo' alt="logo maisya" height="50px"></a>
							
										
									
                            </div>
                            <div class="col-xs-4 col-md-4 col-sm-4" align="right">
                            			<ul class="nav navbar-nav navbar-right">
											<li style="margin-right:20px;margin-top:10px">
											
												<form id="postSearch" method="post" action="<?php echo base_url()?>product/search/">	
													<input id="searchText" type="text" class="form-control Search" name="searchtext" placeholder="Search Product...">
												</form>
											</li>
										</ul>
                            </div>
							<div class="col-xs-5 col-md-5 col-sm-5   pull-right mtmenu">
								<div class="col-xs-12 col-md-12 col-sm-12 right-logo">
									
									<div class="col-xs-4 col-md-4 col-sm-4 top-menu">
										<div class="col-xs-3 col-md-3 col-sm-3">
										
										</div>
										<div class="col-xs-9 col-md-9 col-sm-9">
                                        <?php
												//echo $this->session->userdata('cust_username');
												if($this->session->userdata('cust_username')){
											?>
											&nbsp;	<i class="far fa-heart"></i>&nbsp;<a href="http://www.maisya.id/wishlist">&nbsp;Wishlist </a> <span id="totalwhs" class="badge bagetop">0</span>
											<?php } ?>
                                        </div>
									</div>
									<div class="col-xs-4 col-md-4 col-sm-4  top-menu">
										
										<div class="col-xs-10 col-md-10 col-sm-10">
                                        <?php
												//echo $this->session->userdata('cust_username');
												if($this->session->userdata('cust_username')){
											?><i class="fas fa-shopping-bag"></i>
											<a href="<?php echo  base_url()?>checkout" >Shopping Bag </a><span class="badge bagetop"><?php if($totalqty){echo $totalqty;}else{ echo '0'; }?></span>
										<?php } ?>
                                        </div>
									</div>
									<div class="col-xs-4 col-md-4 col-sm-4 top-menu">
										
										<div class="col-xs-12 col-md-12 col-sm-12">
											<?php
												//echo $this->session->userdata('cust_username');
												if(!$this->session->userdata('cust_username')){
											?>
													&nbsp;<i class="fa fa-user faclear"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a id="btn-signin" href="#" data-toggle="modal" data-target="#myModal" data-backdrop="static">Sign In / Register</a>
											<?php
												}else{
											?>
																								

													<div class="dropdown">
														&nbsp;<i class="fa fa-user faclear"></i>&nbsp;&nbsp;<a href="#" data-toggle="dropdown" class="dropdown-toggle">
															&nbsp;
															<?php 
																
																echo $this->session->userdata('cust_name'); 
															?>
															<b class="caret"></b>
														</a>
														<ul class="dropdown-menu" style="z-index:10000;">

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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="">
				<div class="">
					<div class="">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="navbar navbar-default navbar-static-top">
							   <div class="container">
									<div class="row">
								  <div class="navbar-header col-xs-12 col-md-12 col-sm-12 hidden-lg topMenu" >
									<div class="head-icon col-xs-1 col-md-1 col-sm-1">
										<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
									</div>
									<div class="head-icon col-xs-4 col-md-4 col-sm-4">
										<a href="<?php echo base_url()?>"><img alt="Logo" src="<?php echo base_url() ?>/assets/img/logo.png" class="img-responsive" alt="maisya_jewellery" title="maisya_jewellery"></a>
									</div>
									<div class="head-icon col-xs-5 col-md-5 col-sm-5 pull-right">
										<div class="hidden-lg col-xs-4 col-md-4 col-sm-4">
											<a href="<?php echo  base_url()?>wishlist">
												<i class="far fa-heart" style=" color: #8c1c21;"></i><span class="badge bagetop" id="totalwhs"><?php echo $totalwhs ?></span>
											</a>
										</div>
										<div class="hidden-lg col-xs-5 col-md-5 col-sm-5">
											<a href="<?php echo  base_url()?>checkout" >
											<i class="fas fa-shopping-bag"  style=" color: #8c1c21;"></i> <span class="badge bagetop" id="totalwhs"><?php if($totalqty){echo $totalqty;}else{ echo '0'; }?></span>
											</a>
										</div>
										<div class="hidden-lg col-xs-2 col-md-2 col-sm-2">
											<i class="fa fa-search"></i>
										</div>
									</div>
								  </div>
								  <div style="display:none;" class="navbar-header col-xs-12 col-md-12 col-sm-12 hidden-lg topMenu frm-header" >
										<form  id="postSearchM" method="post" action="<?php echo base_url()?>product/search">	
											<input id="searchTextM" type="text" class="form-control Search" name="searchtext" placeholder="Search Product...">
										</form>
								  </div>
								  <div class="navbar-inverse in hidden-xs hidden-sm">
									<div class="col-xs-12 col-md-12 col-sm-12"> 
										 <ul>
											<li>
											   <a href="#" >CINCIN<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/all">Koleksi Cincin</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/berlian-fancy">Cincin Berlian Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/berlian">Cincin Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/batu-permata">Cincin Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/emas">Cincin Emas</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/solitaire">Cincin Solitaire</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/mutiara">Cincin Mutiara</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/cincin-nikah">Cincin Nikah</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/perak">Cincin Perak</a></li>
														
													 </ul>
												  </li>
												  <li class="col-sm-3 price-mn">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														CINCIN
														</h2>
													</div>
													<div class="col-sm-12 col-md-12" > 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Rings ?>" class="pull-right" height="210px" alt="maisya_ring_<?php echo $Rings ?>" title="maisya_ring_<?php echo $Rings ?>">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" >ANTING<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/all">Koleksi Anting</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/emas">Anting Emas</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/berlian">Anting Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/batu-permata">Anting Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/color_diamond">Anting Berlian Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/mutiara">Anting Mutiara</a></li>
														
														<li><a href="<?php echo base_url() ?>category/anting/type/perak">Anting Perak</a></li>
														
													 </ul>
												  </li>
												  <li class="col-sm-3  price-mn">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														ANTING
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<div class="col-sm-12 col-md-12"> 
															<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Earrings ?>" class="pull-right" height="210px" alt="maisya_earring_<?php echo $Earrings ?>" title="maisya_earring_<?php echo $Earrings ?>">
														</div>
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" >GELANG<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/all">Koleksi Gelang</a></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/bangle">Bangle</a></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/chain">Chain</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3  price-mn">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/gelang/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														GELANG
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Bracelets ?>" class="pull-right" height="210px" alt="maisya_bracelets_<?php echo $Bracelets ?>" title="maisya_bracelets_<?php echo $Bracelets ?>">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" >BATU PERMATA<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/all">Koleksi Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/alexandrite">Batu Alexandrite</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/cateye">Batu Cateye</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/berlian">Batu Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/emerald">Baru Emerald</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/ruby">Batu Rubi</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/sapphire">Batu Saphir</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3  price-mn">
													  <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														BATU PERMATA
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Gemstone ?>" class="pull-right" height="210px" alt="maisya_gemstone_<?php echo $Gemstone ?>" title="maisya_gemstone_<?php echo $Gemstone ?>" >
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" >KALUNG<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/all">Koleksi Kalung</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-fancy">Kalung Permata Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-berlian">Kalung Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-mutiara">Kalung Mutiara</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-batu-mulia">Kalung Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-solitaire">Kalung Solitaire</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-nikah">Kalung Pernikahan</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3 price-mn">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6 hidden-sm" style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														KALUNG
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Jewellery ?>" class="pull-right" height="210px" alt="jewellery_maisya_<?php echo $Jewellery ?>" title="jewellery_maisya_<?php echo $Jewellery ?>">
													</div>
												  </li>
											   </ul>
											</li>
											<li>
											   <a href="#" >LIONTIN<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all">Koleksi Liontin</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/emas">Liontin Emas</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/berlian">Liontin Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/batu-permata">Liontin Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/color_diamond">Liontin Berlian Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/mutiara">Liontin Mutiara</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/perak">Liontin Perak</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3  price-mn">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/50.000.000">IDR 50.000.000+</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-6"  style="padding-right:1%;">
													<div class="col-sm-12 header-megamenu hidden-sm">
														<h2>
														LIONTIN
														</h2>
													</div>
													<div class="col-sm-12 col-md-12 hidden-sm"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $Engangement ?>" alt="maisya_Engangement_<?php echo $Engangement ?>" title="maisya_Engangement_<?php echo $Engangement ?>" class="pull-right" height="210px">
													</div>
												  </li>
											   </ul>
											</li>
											<!--
											<li>
											   <a href="#" >NECKLACE<b class="caret hidden-lg"></b></a>          
											   <ul class="dropdown">
													
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Collection</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all">All Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/emas">Gold Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/berlian">Diamond Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/batu-permata">Gemstone Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/color_diamond">Color Diamond Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/mutiara">Pearl Pendant</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/perak">Silver Pendant</a></li>
													 </ul>
												  </li>
												  <li class="col-sm-3">
													 <ul>
														<li class="dropdown-header">By Price</li>
														<li class="divider"></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/1/100.000-5.000.000">IDR 100.000 - 5.000.000</a></li>
														<li><a href="<?php echo base_url() ?><?php echo base_url() ?>category/liontin/type/all/page/1/5.000.000-10.000.000">IDR 5.000.000 - 10.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/10.000.000-50.000.000">IDR 10.000.000 - 50.000.000</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/all/page/50.000.000">IDR 50.000.000+</a></li>
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
											-->
											<li>
											    <a href="#" >PROMO !<b class="caret hidden-lg"></b></a>
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
														PROMO !
														</h2>
													</div>
													<div class="col-sm-12 col-md-12"> 
														<img src="<?php echo base_url() ?>/assets/uploads/img_menu/<?php echo $sale ?>" alt="maisya_sale_<?php echo $sale ?>" title="maisya_sale_<?php echo $sale ?>"  class="pull-right" height="210px">
													</div>
												  </li>
												</ul>
											</li>
                                            <li>
											    <a href="<?php echo base_url() ?>blog/">MAISYA BLOG<b class="caret hidden-lg"></b></a>
                                                </li>
										 </ul>
									</div>
									
								  </div>
							   
									<div class="navbar-inverse side-collapse in">
									  <nav role="navigation" class="navbar-collapse">
										<ul class="nav navbar-nav">
											<li>
												<?php 
													if(!$this->session->userdata('cust_name')){
												?>	
													
													<a href="#" style="color:#000;padding:10px;background-color:#fff;border:#ccc 1px solid" class="btn btn-signinmob" data-toggle="modal" data-target="#myModal">Sign in / Register</a>
												<?php	
													}else{
												?>
													<div class="col-xs-8 col-md-8 col-sm-8">
														<a href="<?php echo base_url() ?>profile" class="btn btn-profile-m">
															&nbsp;
															<?php 
																$data = explode(" ",$this->session->userdata('cust_name'));
																echo $data[0]; 
															?>
														</a>
													</div>
													<div class="col-xs-2 col-md-2 col-sm-2">
														<a  class="btn btn-google" href="<?php echo base_url() ?>home/logout">
															&nbsp;<i class="fas fa-sign-out-alt"></i>&nbsp;
														</a>
													</div>
												<?php
													}
												?>
												<br />
											</li>
											<li>
												<a href="#" class="dropdown-toggle mob-menu" data-toggle="dropdown">CINCIN
													<b class="caret"></b>
												</a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														 <ul>
															
														<li><a href="<?php echo base_url() ?>category/cincin/type/all">Koleksi Cincin</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/berlian-fancy">Cincin Berlian Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/berlian">Cincin Berlian</li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/batu-permata">Cincin Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/emas">Cincin Emas</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/solitaire">Cincin Solitaire</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/mutiara">Cincin Mutiara</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/cincin-nikah">Cincin Nikah</a></li>
														<li><a href="<?php echo base_url() ?>category/cincin/type/perak">Cincin Perak</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle  mob-menu" data-toggle="dropdown">ANTING<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/anting/type/all">Koleksi Anting</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/emas">Anting Emas</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/berlian">Anting Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/batu-permata">Anting Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/color_diamond">Anting Berlian Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/anting/type/mutiara">Anting Mutiara</a></li>
														
														<li><a href="<?php echo base_url() ?>category/anting/type/perak">Anting Perak</a></li>
															
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle  mob-menu" data-toggle="dropdown">GELANG<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/gelang/type/all">Koleksi Gelang</a></li>
															<li><a href="<?php echo base_url() ?>category/gelang/type/bangle">Bangle</a></li>
															<li><a href="<?php echo base_url() ?>category/gelang/type/chain">Chain</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle  mob-menu" data-toggle="dropdown">BATU PERMATA<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/all">Koleksi Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/alexandrite">Batu Alexandrite</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/cateye">Batu Cateye</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/berlian">Batu Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/emerald">Baru Emerald</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/ruby">Batu Rubi</a></li>
														<li><a href="<?php echo base_url() ?>category/batu-permata/type/sapphire">Batu Saphir</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<li>
											   <a href="#" class="dropdown-toggle  mob-menu" data-toggle="dropdown">KALUNG<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/all">Koleksi Kalung</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-fancy">Kalung Permata Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-berlian">Kalung Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-mutiara">Kalung Mutiara</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-batu-mulia">Kalung Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-solitaire">Kalung Solitaire</a></li>
														<li><a href="<?php echo base_url() ?>category/perhiasan-emas/type/kalung-nikah">Kalung Pernikahan</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											<!--
											<li>
											   <a href="#" class="dropdown-toggle  mob-menu" data-toggle="dropdown">ENGAGEMENT<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li class="col-sm-3">
														<ul>
															
															<li><a href="<?php echo base_url() ?>category/engangement/type/bridalsets">Bridal Sets</a></li>
														 </ul>
													</li>
												</ul>
											</li>
											-->
											<li>
											   <a href="#" class="dropdown-toggle mob-menu" data-toggle="dropdown">LIONTIN<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
														<li><a href="<?php echo base_url() ?>category/liontin/type/all">Koleksi Liontin</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/emas">Liontin Emas</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/berlian">Liontin Berlian</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/batu-permata">Liontin Batu Permata</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/color_diamond">Liontin Berlian Fancy</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/mutiara">Liontin Mutiara</a></li>
														<li><a href="<?php echo base_url() ?>category/liontin/type/perak">Liontin Perak</a></li>
												</ul>
											</li>
											<!--
											<li>
											   <a href="#" >NECKLACE<b class="caret"></b></a>          
											   <ul class="dropdown">
													
												
													<li><a href="<?php echo base_url() ?>category/liontin/type/all">All Pendant</a></li>
													<li><a href="<?php echo base_url() ?>category/liontin/type/emas">Gold Pendant</a></li>
													<li><a href="<?php echo base_url() ?>category/liontin/type/berlian">Diamond Pendant</a></li>
													<li><a href="<?php echo base_url() ?>category/liontin/type/batu-permata">Gemstone Pendant</a></li>
													<li><a href="<?php echo base_url() ?>category/liontin/type/color_diamond">Color Diamond Pendant</a></li>
													<li><a href="<?php echo base_url() ?>category/liontin/type/mutiara">Pearl Pendant</a></li>
													<li><a href="<?php echo base_url() ?>category/liontin/type/perak">Silver Pendant</a></li>
												</ul>
											</li>
											-->
											<li>
											   <a href="#" class="dropdown-toggle  mob-menu" data-toggle="dropdown">DISCOUNT<b class="caret"></b></a>          
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
											<li>
											    <a href="<?php echo base_url() ?>blog/">MAISYA BLOG</b></a>
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
			</div>
		</header>
		
		<div class="side-collapse-container">