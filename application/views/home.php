		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<!--SLider -->
		<div class="">
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
								<img src="<?php echo base_url()?>assets/uploads/slideshow/<?php echo $lst_slide->slideshow_image?>" alt="<?php echo $lst_slide->slideshow_image?>"  title="<?php echo $lst_slide->slideshow_image?>"/>
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
		<h1 style="display:none;">Welcome To Maisya Jewellery Online Shop</div>
		<div class="col-xs-12 col-md-12 col-sm-12 welcome-home">
			Welcome To Maisya Jewellery Online Shop
		</div>	
		<div class="container">				
			<div class="">
				<div class="">
					
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class="row">
							<?php foreach ($all_promo as $lst_promo){ 
									if($lst_promo->wh_type == 'Small'){
							?>
										<div class="col-xs-6 col-md-6 col-sm-6">
											<a href="<?php echo $lst_promo->wh_url ?>">
											<img  src="<?php echo base_url()?>assets/uploads/promo/<?php echo $lst_promo->wh_image_thumb_url?>" class="img-responsive"  alt="<?php echo $lst_promo->wh_image_thumb_url?>" title="<?php echo $lst_promo->wh_image_thumb_url?>">
											</a>
										</div>
							<?php
									}else{
							?>
										<div class="col-xs-12 col-md-12 col-sm-12">
											<a href="<?php echo $lst_promo->wh_url ?>">
											<img width="100%" src="<?php echo base_url()?>assets/uploads/promo/<?php echo $lst_promo->wh_image_thumb_url?>" class="img-responsive" alt="<?php echo $lst_promo->wh_image_thumb_url?>" title="<?php echo $lst_promo->wh_image_thumb_url?>">
											</a>
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
			<div class="">
				<div class="row">		
					<div class="col-xs-12 col-md-12 col-sm-12 collection-img">
						<h2>
							Best Sellers
						</h2>
						
							<div id="bestSeller">	
							<?php 
								$i =1;
								//print_r($all_collection);
								foreach ($all_collection as $ls_coll){ 
								
							?>
								  <div class="box-best thumbnail thumb-detail">
										
										<div class="icon-wh" style="z-index:1;">
											<a href="#" class="wishlist">
												<i class="far fa-heart love" <?php echo $style ?>></i>
												<input type="hidden" value="<?php echo urlencode($ls_coll['ProductName']); ?>" class="nameid" />
												<input type="hidden" value="<?php echo $ls_coll['ProductID']; ?>" class="idprod" />
												<input type="hidden" value="<?php echo $this->session->userdata('cust_username'); ?>" class="iduser" />
											</a>
										</div>
										<a class="liprod" href="<?php echo base_url()."detailproduct/all/".str_replace(" ","-",$ls_coll['ProductName'])."--k--".$ls_coll['ProductID']; ?>">
										
											<img src='https://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $ls_coll['ProductID']?>&width=300&height=300' alt="maisya_<?php echo substr($ls_coll['ProductName'],0,28)?>" title="maisya_<?php echo substr($ls_coll['ProductName'],0,28)?>"class="img-thumbnail image hidden-xs hidden-sm "/>
											
											<img src='https://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $ls_coll['ProductID']?>&width=200&height=200' alt="maisya_<?php echo substr($ls_coll['ProductName'],0,28)?>" title="maisya_<?php echo substr($ls_coll['ProductName'],0,28)?>" class="img-thumbnail image hidden-lg" />
											
											<div class="caption-bestseller">
												<!--<p><?php echo $ls_coll['ProductID']?></p>-->
												<p class="title_p"><b><?php echo substr($ls_coll['ProductName'],0,28)?></b></p>
												<p class="sugestprice">
													<span>IDR <?php echo number_format($ls_coll['SuggestPrice'])?></span>
													<b>IDR <?php echo number_format($ls_coll['UnitPrice'])?></b>
												</p>
											</div>
										</a>
									</div>
							<?php
									
								}
							?>
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
											<div class="col-xs-6 col-sm-6 col-md-3 instafeed">
												<div class="img-featured-container">
													<a target="_blank" href="<?php echo $lst_events['link']?>">
														<div class="img-backdrop"></div>
														<figure>
															<img class="img-responsive" alt="<?php echo $lst_events['thumbnail']?>" title="<?php echo $lst_events['thumbnail']?>"  src="<?php echo $lst_events['thumbnail']?>">
														</figure>
														<div class="description-container">
															<p class="caption">
																<?php echo substr($lst_events['caption'],0,20)?> ....
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
							<div class="col-xs-12 col-sm-12 col-md-3 box-testimonial">
								<div class="thumbnail testi-1">
									<a href="#">
										<?php
											if($testimonial1->pic_user){
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $testimonial1->pic_user?>" class="img-circle" width="150" height="150" alt="maisya_<?php echo $testimonial1->pic_user?>" title="maisya_<?php echo $testimonial1->pic_user?>"> 
										<?php
											}else{
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/logo.png" width="150"  height="150" class="img-circle" alt="maisya.id" title="maisya"/>
										<?php	
											}
										?>
										
										<div class="caption">
											<?php echo substr($testimonial1->testi_desc,0,150)?> ....
										</div>
									</a>
								</div>
								<div class="title-testi">
									<h3><?php echo $testimonial1->cust_name?></h3>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 box-testimonial">
								<div class="thumbnail testi-2">
									<a href="#">
										<?php
											if($testimonial2->pic_user){
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $testimonial2->pic_user?>" class="img-circle" width="150"    height="150" alt="maisya_<?php echo $testimonial2->pic_user?>" title="maisya_<?php echo $testimonial2->pic_user?>"> 
										<?php
											}else{
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/logo.png" width="150"   height="150" class="img-circle" alt="maisya.id" title="maisya"/>
										<?php	
											}
										?> 
										<div class="caption">
											<?php echo substr($testimonial2->testi_desc,0,150)?> ....
										</div>
									</a>
								</div>
								<div class="title-testi">
									<h3><?php echo $testimonial2->cust_name?></h3>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 box-testimonial-last">
								<div class="thumbnail testi-3">
									<a href="#">
										<?php
											if($testimonial3->pic_user){
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $testimonial3->pic_user?>" class="img-circle" width="150"   height="150"  alt="maisya_<?php echo $testimonial3->pic_user?>" title="maisya_<?php echo $testimonial3->pic_user?>"> 
										<?php
											}else{
										?>
												<img src="<?php echo base_url()?>assets/uploads/foto/logo.png"  width="150"   height="150" class="img-circle" alt="maisya.id" title="maisya"/>
										<?php	
											}
										?>
										<div class="caption">
											<?php echo substr($testimonial3->testi_desc,0,150)?> ....
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
		<script type="text/javascript">
			$(function() {
				 
				jQuery('#demo1').skdslider({
				  slideSelector: '.slide',
				  delay:5000,
				  animationSpeed:3000,
				  showNextPrev:false,
				  showPlayButton:false,
				  autoSlide:true,
				  animationType:'fading'
				});
				
				//alert(jQuery(window).width());
				if (jQuery(window).width() < 900) {
					$('#bestSeller').slick({
					  slidesToShow: 1,
					  slidesToScroll: 1,
					});
				}else{
					$('#bestSeller').slick({
					  slidesToShow: 3,
					  slidesToScroll: 1,
					});
				}
			});
			
			
		</script>
		<!--END Slider -->
