		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$allarray	= explode(",",$validatefilter);
		?>
			
		<div class="container  slider-content">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li><a href="#">Product</a></li>
							  <li class="active">Wish List</li>
							</ol>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12 category">						
							<div class=" col-xs-12 col-md-12 col-sm-12 top-catalog ">
								<h3>
									Wish List
								</h3>
							</div>
							
							<div class=" col-xs-12 col-md-12 col-sm-12 all-catalog ">
								
								<?php
							//		echo "<pre>";
					//print_r($detail_prod);
					//echo "</pre>sdfa";
					//exit;
								foreach($detail_prod as $listProduct){
									
								?>
								<div class="col-xs-12 col-md-2 col-sm-2 lst-ctl">
									
									<div class="thumbnail thumb-wh">
										
										<a class="liprod" href="<?php echo base_url()."detailproduct/".$listProduct->productid; ?>">
										
											<img src='http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->productid?>&width=200&height=200' alt="resized image" class="img-thumbnail image" />
											<?php
												$src = 'http://cl.maisya.co.id:5060/api/ProductImages2?kodeitem='.$listProduct->productid.'&width=10&height=10';

												if (@getimagesize($src))
												{
											?>
												<div class="overlay">
													<img src="http://cl.maisya.co.id:5060/api/ProductImages2?kodeitem=<?php echo $listProduct->productid?>&width=210&height=200" class="img-thumbnail image">
												</div>
											<?php
												}
											?>
											<div class="caption">
												<p><?php echo $listProduct->productname?></p>
												<a class="btn btn-google btn-lg btn-block col-xs-6 col-md-6 col-sm-6" href="<?php echo base_url()?>wishlist/remove/<?php echo $listProduct->productid ?>">
													Remove
												</a>
												<a class="btn btn-google btn-lg btn-block col-xs-6 col-md-6 col-sm-6" href="<?php echo base_url()."detailproduct/".$listProduct->productid; ?>">
													Buy
												</a>
											</div>
										</a>
									</div>
								</div>
								<?php
									}
								?>
								
							</div>
							<div class="col-xs-12 col-md-12 col-sm-12 text-center">
								<div id="pagingHere" class="text-center"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>


