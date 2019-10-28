		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
			
		<div class="container slider">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
					
						
						<div class="col-xs-6 col-md-6 col-sm-12 center">
							<img id="img_01" src="http://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?>&width=500&height=500" data-zoom-image="http://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $detail_product->ProductID?>&width=1000&height=1000"
							class="img-responsive ">
							<div class="col-xs-12 col-md-12 col-sm-12 img-thumb-det">
									<img alt="maisya" class="" src="<?php echo base_url() ?>assets/uploads/foto/4f485-jewellery.png">
									<img alt="maisya" class="" src="<?php echo base_url() ?>assets/uploads/foto/4f485-jewellery.png">
									<img alt="maisya" class="" src="<?php echo base_url() ?>assets/uploads/foto/4f485-jewellery.png">
								
							</div>
						</div>
						<div class="col-xs-6 col-md-6 col-sm-12  desc-detail">
							<h1><?php echo $detail_product->ProductName?></h1>
							<?php print_r($detail_product); ?>
							<table>
								<tr>
									<td>ID </td><td>:</td> <td><?php  echo $detail_product->ProductID?></td>
								</tr>
								<?php
									if($detail_product->StoneInformations[0]->tipe != '-')
									{
								?>
								<tr>	
									<td>Type</td><td>:</td><td> <?php echo $detail_product->StoneInformations[0]->tipe ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->StoneInformations[0]->pieces != '-')
									{
								?>								
								<tr>
									<td>Pieces</td><td>:</td><td> <?php echo $detail_product->StoneInformations[0]->pieces ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->StoneInformations[0]->shape != '-')
									{
								?>
								<tr>
									<td>Shape</td><td>:</td> <td><?php echo $detail_product->StoneInformations[0]->shape ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->StoneInformations[0]->weight != '-')
									{
								?>
								<tr>
									<td>Weight</td><td>:</td> <td> <?php echo $detail_product->StoneInformations[0]->weight ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->StoneInformations[0]->average_color != '-')
									{
								?>
								<tr>
									<td>Average Color</td><td>:</td><td> <?php echo $detail_product->StoneInformations[0]->average_color ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->StoneInformations[0]->average_clarity != '-')
									{
								?>
								<tr>
									<td>Average Clarity </td><td>:</td><td> <?php echo $detail_product->StoneInformations[0]->average_clarity ?></td>
								</tr>
								<?php
									}
								?>
							</table>
							<p>
							<h2>IDR <?php echo number_format($detail_product->UnitPrice)?></h2>
							<a href="<?php echo base_url()?>product/addcart/<?php echo $detail_product->ProductID; ?> " class="btn btn-buynow btn-lg btn-block"><i class="fa fa-shopping-cart"></i> Buy Now</a>
							<a href="<?php echo base_url()?>product/addcart/<?php echo $detail_product->ProductID; ?> " class="btn btn-wishlist btn-lg btn-block"><i class="far fa-heart"></i> Wish List</a>
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


