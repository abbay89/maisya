		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<!--SLider -->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 slider">
				<div id="demo1">
					<?php foreach ($all_slide as $lst_slide){ 
						if($lst_slide->slideshow_url)
						{
							$url = $lst_slide->slideshow_url;
						}
						else
						{
							$url = "#";
						}
					?>
						<div class="slide">
							<a href="<?php echo $url; ?>">
								<img src="<?php echo base_url()?>assets/uploads/slideshow/<?php echo $lst_slide->slideshow_image?>" />
								<?php
									if($lst_slide->slideshow_desc){
								?>
								<div class="slide-desc">
									<h2><?php echo $lst_slide->slideshow_title?></h2>
									<p><?php echo strip_tags($lst_slide->slideshow_desc)?></p>
								</div>
								<?php
									}
								?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!--end SLider -->
				
		<div class="container">				
			<div class="space-top">
				<div class="">
					<div class="col-xs-12 col-md-12 col-sm-12 ">
						<img  src="assets/img/banner/welcome.png" align="center" class="img-responsive center" alt="">
					</div>
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class="row">
							<?php foreach ($all_promo as $lst_promo){ 
									if($lst_promo->wh_type == 'Small'){
							?>
										<div class="col-xs-6 col-md-6 col-sm-12">
											<img  src="<?php echo base_url()?>assets/uploads/promo/<?php echo $lst_promo->wh_image_thumb_url?>" class="img-responsive" alt="">
										</div>
							<?php
									}else{
							?>
										<div class="col-xs-12 col-md-12 col-sm-12">
											<img src="<?php echo base_url()?>assets/uploads/promo/<?php echo $lst_promo->wh_image_thumb_url?>" class="img-responsive" alt="">
										</div>
							<?php
									}
								}
							?>
						</div>
						
					</div>	
				</div>
			</div>
		</div>
		<div class="container">				
			<div class="space-top">
				<div class="row">		
					<div class="col-xs-12 col-md-12 col-sm-12 collection-img">
						<h2>
							Best Sellers
						</h2>
						<div class="carousel carousel-showmanymoveone slide" id="carousel123">
							<div class="carousel-inner"> 
							
								<?php 
									$i =1;
									
									foreach ($all_collection as $ls_coll){ 
									if($i == 1)
									{
										echo  '<div class="item active">';
									}
									else
									{
										echo  '<div class="item">';
									}
								?>
									
										<div class="col-xs-3 col-sm-3 col-md-3">
											<a href="<?php echo $ls_coll->coll_link?>"><img src="<?php echo base_url()?>/assets/uploads/img_menu/<?php echo $ls_coll->coll_url ?>" class="img-responsive img-carousel"></a>
											<p>
												<?php echo substr($ls_coll->coll_cate,0,28); ?>
											</p>
										</div>
									</div>
								<?php
										$i++;
									}
								?>
							 </div>
							<a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="fas fa-chevron-circle-left"></i></a>
							<a class="right carousel-control" href="#carousel123" data-slide="next"><i class="fas fa-chevron-circle-right"></i></a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
					<div class="col-xs-12 col-md-12 col-sm-12 event-img">
						<div class="container">				
							<div class="space-top">
								<div class="row">
									<h2>
										As Seen on Our Instagram								
									</h2>
									<?php foreach ($all_events as $lst_events){ 
									?>
										<!--
										<div class="col-xs-12 col-md-3 col-sm-3">
											<img alt="nyc subway" src="<?php echo $lst_events['thumbnail']?>">
											<span class="postdate">
												<i class="far fa-heart love"></i> &nbsp; <?php echo $lst_events['likes']?>&nbsp;&nbsp;
												<i class="fal fa-comments"></i> &nbsp; <?php echo $lst_events['comments']?>
											</span>
										</div>
										-->
											<div class="col-xs-6 col-sm-4 col-md-3 instafeed">
												<div class="img-featured-container">
													<a target="_blank" href="<?php echo $lst_events['link']?>">
														<div class="img-backdrop"></div>
														<figure>
															<img class="img-responsive" src="<?php echo $lst_events['thumbnail']?>">
														</figure>
														<div class="description-container">
															<p class="caption">
																<?php echo substr($lst_events['caption'],0,25)?> ....
															</p>
															<span class="likes">
																<i class="fas fa-heart icon-like-fill"></i>
																<span class="hidden-xs">Likes</span> 
																<span class="font-arial"><?php echo $lst_events['likes']?></span>
															</span>
															<span class="comments">
																<i class="fas fa-comment "></i>
																<span class="hidden-xs">Comments</span> 
																<span class="font-arial"><?php echo $lst_events['comments']?></span>
															</span>
														</div>
													</a>
												</div>
											</div>
									<?php } ?>
										
								</div>
							</div>
						</div>
					</div>
		<div class="container">				
			<div class="space-top">
				<div class="">				
					<div class="col-xs-12 col-md-12 col-sm-12 testimonial">
						<div class="row">
							<h2>
								Customer Testimonial
							</h2>
							<div class="col-xs-12 col-md-4 col-sm-4 box-testimonial">
								<div class="thumbnail testi-1">
									<a href="/w3images/lights.jpg">
										<?php
											if($testimonial1->pic_user){
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $testimonial1->pic_user?>" class="img-circle" width="150" height="150"  alt="e"> 
										<?php
											}else{
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/logo.png" width="150" height="150" class="img-circle" alt="e"/>
										<?php	
											}
										?>
										
										<div class="caption">
											<?php echo substr($testimonial1->testi_desc,0,100)?> ....
										</div>
									</a>
								</div>
								<div class="title-testi">
									<h3><?php echo $testimonial1->cust_name?></h3>
								</div>
							</div>
							<div class="col-xs-12 col-md-4 col-sm-4 box-testimonial">
								<div class="thumbnail testi-2">
									<a href="/w3images/lights.jpg">
										<?php
											if($testimonial2->pic_user){
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $testimonial2->pic_user?>" width="150" height="150"  class="img-circle" alt="e"> 
										<?php
											}else{
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/logo.png" width="150" height="150" class="img-circle" alt="e"/>
										<?php	
											}
										?> 
										<div class="caption">
											<?php echo substr($testimonial2->testi_desc,0,100)?> ....
										</div>
									</a>
								</div>
								<div class="title-testi">
									<h3><?php echo $testimonial2->cust_name?></h3>
								</div>
							</div>
							<div class="col-xs-12 col-md-4 col-sm-4 box-testimonial-last">
								<div class="thumbnail testi-3">
									<a href="/w3images/lights.jpg">
										<?php
											if($testimonial3->pic_user){
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $testimonial3->pic_user?>" width="150" height="150"  class="img-circle" alt="e"> 
										<?php
											}else{
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/logo.png"  width="150" height="150" class="img-circle" alt="e"/>
										<?php	
											} 
										?>
										<div class="caption">
											<?php echo substr($testimonial3->testi_desc,0,100)?> ....
										</div>
									</a>
								</div>
								<div class="title-testi">
									<h3><?php echo $testimonial3->cust_name?></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-12 col-sm-12">
						&nbsp;
					</div>
				</div>
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
		
		<!--END Slider -->
