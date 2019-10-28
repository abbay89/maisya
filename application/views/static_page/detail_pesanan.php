		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
			
		<div class="container slider-content">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12 ">
					
						
						<div class="col-xs-4 col-md-4 col-sm-12 center">
							<img id="img_01" src="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?>" data-zoom-image="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?>"
							class="img-responsive " width="300px">
							<!--
							<div id="gal1">
							 
							  <a href="#" data-image="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?>" data-zoom-image="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?> ">
								<img id="img_01" src="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?>" width="50px"/>
							  </a>
							   

							</div>
							-->
						</div>
						<div class="col-xs-8 col-md-8 col-sm-12">
							<h1><?php echo $detail_product->ProductName?></h1>
							<b>ID : <?php echo $detail_product->ProductID?> </b>
								<!--
								<ul>
									<li>Metal : Gold</li>
									<li>Color : White Gold</li>
									<li>Quality : 18ct</li>
									<li>Weight : 5.80gr</li>
									<li>Stone : 6 Fancy Color Diamond</li>
								</ul>
								-->
							<p>
							<h2>IDR <?php echo number_format($detail_product->UnitPrice)?></h2>
							<a href="<?php base_url()?>product/addcart/<?php echo $detail_product->ProductID; ?> " class="btn btn-primary btn-lg btn-block"><i class="fa fa-shopping-cart"></i> Buy Now</a>
						</div>
					
					</div>
				</div>
			</div>
		</div>
		
		<script src="<?php echo base_url()?>assets/js/jquery.elevatezoom.js"></script>
		<script type="text/javascript">
			$(function() {
				$("#img_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'}); 

					//pass the images to Fancybox
					$("#img_01").bind("click", function(e) {  
					  var ez =   $('#img_01').data('elevateZoom');	
						$.fancybox(ez.getGalleryList());
					  return false;
					});
				$(".dropdown").hover(
					function() { $('.dropdown-menu', this).stop().fadeIn("fast");
					},
					function() { $('.dropdown-menu', this).stop().fadeOut("fast");
					}
				);
				
			});
		</script>
		<!--END Slider -->
		<?php
			$this->load->view('template/footer');
		?>


