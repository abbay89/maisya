		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			
		?>
		<div class="container slider">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li><a href="#">Product</a></li>
							  <li><?php echo $detail_product->ProductName ?></li>
							</ol>
							
							
						</div>
					<?php
						//print_r($detail_product);
					?>
						<input type="hidden" id="kodeitem" value="<?php echo $detail_product->ProductID?>" />
						<div class="col-xs-12 col-md-6 col-sm-6 center">
							<div id="img-detail">
								<img id="zoom_03f" src="https://www.maisya.id:5060/api/<?php echo $url ?>?kodeitem=<?php echo $detail_product->ProductID?>&width=500&height=500" data-zoom-image="https://www.maisya.id:5060/api/<?php echo $url ?>?kodeitem=<?php echo $detail_product->ProductID?>&width=1000&height=1000" class="img-responsive " alt="<?php echo $detail_product->ProductName;?>">
								<div id="gallery_01f" style="width=500px;float:left; ">
									<?php
										$i = 1;
										foreach($thumbimage as $ls_coll){ 
									?>
										
										<a  href="#" class="elevatezoom-gallery active" data-update="" data-image="https://www.maisya.id:5060/api/imageById?id=<?php echo $ls_coll->Id?>&width=500&height=500" 
										data-zoom-image="https://www.maisya.id:5060/api/imageById?id=<?php echo $ls_coll->Id?>&width=1000&height=1000">
											<img src="https://www.maisya.id:5060/api/imageById?id=<?php echo $ls_coll->Id?>&width=100&height=100" alt="<?php echo $detail_product->ProductName.' '.$i;?>"/>
										</a>	
										
									 
									<?php
											$i++;
										}
									?>
									
								</div>
							</div>
							
							<div class="col-xs-12 col-md-12 col-sm-12">
								<?php 
									if($detail_product->VideoUrl){
									$data = explode("/",$detail_product->VideoUrl); ?>
								<iframe width="80%" height="300" 
									src="https://www.youtube.com/embed/<?php echo $data[3] ?>?autoplay=1&mute=1&rel=0">
								</iframe>
								<?php
									}
								?>
								
							</div>
						</div>
						<div class="col-xs-12 col-md-6 col-sm-6  desc-detail">
						
							<h1><?php echo $detail_product->ProductName?></h1>
							<table  class="table table-striped">
								<tr>
									<td class="col-xs-4 col-md-4 col-sm-4">ID </td><td class="col-xs-1 col-md-1 col-sm-1">:</td> <td><?php  echo $detail_product->ProductID?></td>
								</tr>
								<?php
									if($detail_product->WeightGold != '')
									{
								?>
								<tr>	
									<td>Weight</td><td>:</td><td> <?php echo $detail_product->WeightGold  ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->HeightCincin != '')
									{
								?>								
								<tr>
									<td>Height Cincin</td><td>:</td><td> <?php echo $detail_product->HeightCincin ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->WidthCincin != '')
									{
								?>
								<tr>
									<td>Width Cincin</td><td>:</td> <td><?php echo $detail_product->WidthCincin ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->LengthBracelet != '')
									{
								?>
								<tr>
									<td>Lenght Bracelet</td><td>:</td> <td> <?php echo $detail_product->LengthBracelet ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->SizeCincin != '')
									{
								?>
								<tr>
									<td>Size Ring</td><td>:</td> <td> <?php echo $detail_product->SizeCincin ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->metal_type != '')
									{
								?>
								<tr>
									<td>Metal Type</td><td>:</td><td> <?php echo $detail_product->metal_type ?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if(($detail_product->kadar_emas != '') or ($detail_product->kadar_emas == 0))
									{
								?>
								<tr>
									<td>Kadar Logam </td><td>:</td><td> <?php echo $detail_product->kadar_emas?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->Backing != '')
									{
								?>
								<tr>
									<td>Backing </td><td>:</td><td> <?php echo $detail_product->Backing?></td>
								</tr>
								<?php
									}
								?>
								<?php
									if($detail_product->Claps != '')
									{
								?>
								<tr>
									<td>Claps </td><td>:</td><td> <?php echo $detail_product->Claps?></td>
								</tr>
								<?php
									}
								?>
							</table>
							<br />
							<?php
								$xx = 1;
								foreach($stoneinformation as $dtl_stone){
							?>
									<table  class="table table-striped"  style="font-family: RalewayRegular;">
										<tr>
											<th colspan="3">Stone Information <?php echo  $xx ?></th>
										</tr>
										<?php
											if($dtl_stone->tipe != '-')
											{
										?>
										<tr>	
											<td class="col-xs-4 col-md-4 col-sm-4">Type</td><td class="col-xs-1 col-md-1 col-sm-1">:</td><td> <?php echo $dtl_stone->tipe ?></td>
										</tr>
										<?php } ?>
										
										<?php
											if($dtl_stone->pieces != '-')
											{
										?>
										<tr>
											<td>Pieces</td><td>:</td><td> <?php echo $dtl_stone->pieces ?></td>
										</tr>
										<?php } ?>
										<?php
											if($dtl_stone->shape != '-')
											{
										?>
										<tr>
											<td>Shape</td><td>:</td> <td><?php echo $dtl_stone->shape ?></td>
										</tr>
										<?php } ?>
										<?php
											if($dtl_stone->weight != '-')
											{
										?>
										<tr>
											<td>Weight</td><td>:</td> <td> <?php echo $dtl_stone->weight ?></td>
										</tr>
										<?php } ?>
										<?php
											if(($dtl_stone->average_color != '-') or ($dtl_stone->average_color != ' '))
											{
										?>
										<tr>
											<td>Average Color</td><td>:</td><td> <?php echo $dtl_stone->average_color ?></td>
										</tr>
										<?php } ?>
										<?php
											if($dtl_stone->average_clarity != '-')
											{
										?>
										<tr>
											<td>Average Clarity </td><td>:</td><td> <?php echo $dtl_stone->average_clarity ?></td>
										</tr>
										<?php } ?>
									</table>
							<?php
									$xx++;
								}
							?>
							
							
							<h2 id="nominal-detail">
							
							IDR <?php echo number_format($detail_product->UnitPrice)?>&nbsp;<span class="sugestprice">IDR <?php echo number_format($detail_product->SuggestPrice)?></span><br/>
							<span class="saveprice">You Save : <?php echo number_format($detail_product->SuggestPrice - $detail_product->UnitPrice)?></span>							
							<span style="font-size:18px;
	color:#907829;"> <?php echo number_format($detail_product->DiscountPrice)?>% OFF</span>
							</h2>
							
							<div class="row">
                            <?php 
								if(!$this->session->userdata('cust_name')){
							?>	
								<div class="col-xs-6 col-md-6 col-sm-6">
									<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-buynow btn-lg btn-block"><i class="fa fa-shopping-cart faclear"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buy Now</a>
								</div>
								<div class="col-xs-6 col-md-6 col-sm-6">
									<a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-buynow btn-lg btn-block"><i class="far fa-heart"></i> Wishlist</a>
								</div>				
							
							<?php	
								}else{
							?>
								<div class="col-xs-6 col-md-6 col-sm-6">
									<a href="<?php echo base_url()?>product/addcart/<?php echo $detail_product->ProductID; ?> " class="btn btn-buynow btn-lg btn-block"><i class="fa fa-shopping-cart faclear"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buy Now</a>
								</div>
								<div class="col-xs-6 col-md-6 col-sm-6">
									<a href="<?php echo base_url()?>product/addcart/<?php echo $detail_product->ProductID; ?> " class="btn btn-buynow btn-lg btn-block"><i class="far fa-heart"></i> Wishlist</a>
								</div>
							<?php } ?>	
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="sharethis-inline-share-buttons"></div>
									<br />
								</div>
							</div>
						</div>
						<div style="float:left;width:100%;font-size: 16px;margin-bottom: 18px;margin-top: 18px;" align="center">Maisya Jewellery Pusat Penjualan Cincin Berlian | Cincin Emas | Cincin Tunangan | Cincin Kawin | Cincin Nikah | Kalung Berlian | Kalung Emas | Liontin Berlian | Liontin Emas | Diamond Jewellery | Gold Jewellery | Gold Ring | Pearl Gold | Diamond Ring Harga Dijamin Murah.</div>
						<?php
							$src = base_url()."assets/uploads/box/".$img_box.".jpg";

							if (@getimagesize($src))
							{
						?>
						
							<div class="col-xs-12 col-md-12 col-sm-12 ">
								<h2>
									Shipping Detail
								</h2>
								<div class="col-xs-12 col-md-5 col-sm-5">
									<img class="img-responsive" src="<?php echo base_url()?>assets/uploads/box/<?php echo $img_box; ?>.jpg" alt="Box <?php $img_box;?>"/>
								</div>
								<div class="col-xs-12 col-md-7 col-sm-7 box-desc">
									<p>
										Setiap produk Maisya Jewellery telah di buat dan diinspeksi memenuhi standar tertinggi. Dengan motto Nature's & Beauty, kami persembahkan bahan material terbaik serta pemilihan produk yang natural sebagai appresiasi tertinggi kami untuk seluruh customer. 
									</p>
									<p>
										Dalam pengiriman kami sertakan surat sertifikat yang berstandar internasional ataupun         inhouse certificate serta dilengkapi dengan boks jewellery untuk mempercantik koleksi jewellery.
									</p>


								</div> 
							</div>
						<?php
							}
							if ($img_box == 'ring')
							{
						?>
							<div class="col-xs-12 col-md-12 col-sm-12 ">	
								<div class="col-xs-12 col-md-12 col-sm-12">	
									<a target="_BLANK" class="btn btn-danger pull-right " href="<?php echo base_url()?>assets/uploads/box/ringsize.pdf">Dowload Ring Size .pdf</a>
								</div>
								<img class="img-responsive" src="<?php echo base_url()?>assets/uploads/box/ringsize.jpg" />		
							</div>
								
						<?php
							}
						?>
							
					</div>
				</div>
				<br />
				<br />
			</div>
		</div>
        
        <div class="container">				
			<div class="">
				<div class="row">		
					<div class="col-xs-12 col-md-12 col-sm-12 collection-img">
						<h2>
							Similiar Products
						</h2>
						
						<div id="bestSeller">	
							<?php 
								$i =1;
								//print_r($all_collection);
								
								foreach($detail_prod as $listProduct){
								
							?>
								  <div class="box-best thumbnail thumb-detail">
										
										<div class="icon-wh" style="z-index:1;">
											<a href="#" class="wishlist">
												<i class="far fa-heart love" <?php echo $style ?>></i>
												<input type="hidden" value="<?php echo urlencode($listProduct->ProductName); ?>" class="nameid" />
												<input type="hidden" value="<?php echo $listProduct->ProductID; ?>" class="idprod" />
												<input type="hidden" value="<?php echo $this->session->userdata('cust_username'); ?>" class="iduser" />
											</a>
										</div>
										<a class="liprod" href="<?php echo  base_url()."detailproduct/".$category."/".str_replace(".","",str_replace(" ","-",$listProduct->ProductName)."--k--".$listProduct->ProductID); ?>">
										
											<img src='https://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>&width=300&height=300' alt="maisya_<?php echo substr($listProduct->ProductName,0,28)?>" title="maisya_<?php echo substr($listProduct->ProductName,0,28)?>"class="img-thumbnail image hidden-xs hidden-sm "/>
											
											<img src='https://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>&width=200&height=200' alt="maisya_<?php echo substr($listProduct->ProductName,0,28)?>" title="maisya_<?php echo substr($listProduct->ProductName,0,28)?>" class="img-thumbnail image hidden-lg" />
											
											<div class="caption-bestseller">
												<!--<p><?php echo $listProduct->ProductID?></p>-->
												<p class="title_p"><b><?php echo $listProduct->ProductName?></b></p>
												<p class="sugestprice">
													<span>IDR <?php echo number_format($listProduct->SuggestPrice)?></span>
													<b>IDR <?php echo number_format($listProduct->UnitPrice)?></b>
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
		
		
		
		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b7548f430e12f00128ff989&product=inline-share-buttons' async='async'></script>
		<!--END Slider -->
		<?php
			$this->load->view('template/footer');
		?>
		<script src="<?php echo base_url()?>assets/js/jquery.elevatezoom.js"></script>
		<script type="text/javascript">
		

			$(function() {
				
				$(".dropdown").hover(
					function() { $('.dropdown-menu', this).stop().fadeIn("fast");
					},
					function() { $('.dropdown-menu', this).stop().fadeOut("fast");
					}
				);
				
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
				
				if (jQuery(window).width() < 900) {
					$('#bestSellerDetail').slick({
					  slidesToShow: 2,
					  slidesToScroll: 1,
					});
				}else{
					$('#bestSellerDetail').slick({
					  slidesToShow: 4,
					  slidesToScroll: 1,
					});
				}
//initiate the plugin and pass the id of the div containing gallery images
				
				
				
				$(document).ready(function () {
					$("#zoom_03f").elevateZoom({ zoomType: "lens", containLensZoom: true, gallery:'gallery_01f', cursor: 'pointer', galleryActiveClass: "active"}); 

					$("#zoom_03f").bind("click", function(e) {  
					  var ez =   $('#zoom_03f').data('elevateZoom');
					  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
						$.fancybox(ez.getGalleryList());     
						
					  return false;
					}); 

				}); 

							
			});
			
		</script>


