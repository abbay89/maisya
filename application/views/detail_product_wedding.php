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
							  <li>Wedding</li>
							</ol>
							
							
						</div>
					<?php
						
					//echo $product->Nama;exit;
					
					$image =  'data:image/gif;base64,' . $product->Gambar ;
						
					?>
						<div class="row">
						<div class="col-xs-12 col-md-4 col-sm-4 center">
						<div id="img-detail">
								<img id="zoom_03f" src="<?php echo $image; ?>" data-zoom-image="<?php  echo $image; ?>" class="img-responsive ">
								<div id="gallery_01f" style="width=500px;float:left; ">
									
								</div>
								<br><br>
							
							</div>
						</div>
						<div class="col-xs-12 col-md-8 col-sm-8  desc-detail">
						<h2 id="nominal-detail">
							
							IDR <span id="totalUnit"><?php echo number_format(abs($product->UnitPrice))?></span>&nbsp;<span class="sugestprice">IDR <span id="totalSugest"><?php echo number_format($product->SuggestPrice)?></span></span><br/>
							
							<span class="saveprice">You Save : <span id="saveP"><?php echo number_format($product->SuggestPrice-abs($product->UnitPrice))?></span></span>							
						
							</h2>
							<h1><?php echo $product->Nama;?></h1>
							<div class="col-xs-12 col-md-5 col-sm-5  desc-detail">
							<input id="ringPria" class="checkRing" checked type="checkBox" name="gender" value="<?php echo $dataPria->SuggestPrice.'|'.$dataPria->UnitPrice;?>" />&nbsp;Cincin Pria

							<table  class="table table-striped">
								<tr>
									<td class="col-xs-5 col-md-5 col-sm-5">ID </td><td class="col-xs-1 col-md-1 col-sm-1">:</td> <td><?php  echo $dataPria->ProductID?></td>
								</tr>
								
								<tr>	
									<td>Berat</td><td>:</td><td> <?php echo $dataPria->WeightGold;  ?></td>
								</tr>
													
								<tr>
									<td style="vertical-align:middle">Ukuran Cincin</td><td style="vertical-align:middle">:</td> <td> 
									
									<?php
									echo '<select style="width:100px;height:30px" class="form-control" name="ukuranPria" >';
									for($i=6;$i<=30;$i++){
										if($i==$dataPria->SizeCincin){
											echo '<option selected>'.$i.'</option>';
										}else{
										echo '<option>'.$i.'</option>';
										}
									}
									echo '</select>'
								
									
									
									?></td>
								</tr>
								
								<tr>
									<td>Tipe Metal</td><td>:</td><td> <?php echo $dataPria->metal_type; ?></td>
								</tr>
							
								<tr>
									<td>Kadar Logam </td><td>:</td><td> <?php  echo  $dataPria->kadar_emas;?></td>
								</tr>
								<tr>
									<td style="vertical-align:middle">Nama Grafier</td><td style="vertical-align:middle">:</td><td> <input style="width:150px;" class="form-control" type="text" /></td>
								</tr>
								<tr>
									<td colspan="3">
									<a href="#" data-toggle="modal" data-target="#modalPria" data-backdrop="static">
									<div class="btn btn-signin col-xs-12 ">Stone Information</div>
									</a></td>
								</tr>
								
								
							</table>
							</div>
							<div class="col-xs-12 col-md-1 col-sm-1  desc-detail">
							</div>
							<div class="col-xs-12 col-md-5 col-sm-5 desc-detail">
							<input id="ringWanita" class="checkRing" checked type="checkBox" name="gender" value="<?php echo $dataWanita->SuggestPrice.'|'.$dataWanita->UnitPrice;?>" />&nbsp;Cincin Wanita
							<table  class="table table-striped">
							<tr>
									<td class="col-xs-5 col-md-5 col-sm-5">ID </td><td class="col-xs-1 col-md-1 col-sm-1">:</td> <td><?php  echo $dataWanita->ProductID?></td>
								</tr>
								
								<tr>	
									<td>Berat</td><td>:</td><td> <?php echo  $dataWanita->WeightGold;  ?></td>
								</tr>
													
								<tr>
									<td style="vertical-align:middle">Ukuran Cincin</td><td style="vertical-align:middle">:</td> <td> 
									<?php
									echo '<select style="width:100px;height:30px" class="form-control" name="ukuranPria" >';
									for($i=6;$i<=30;$i++){
										if($i==$dataWanita->SizeCincin){
											echo '<option selected>'.$i.'</option>';
										}else{
										echo '<option>'.$i.'</option>';
										}
									}
									echo '</select>'
								
									
									
									?></td>
								</tr>
								
								<tr>
									<td>Tipe Metal</td><td>:</td><td> <?php echo  $dataWanita->metal_type; ?></td>
								</tr>
							
								<tr>
									<td>Kadar Logam </td><td>:</td><td> <?php  echo   $dataWanita->kadar_emas;?></td>
								</tr>
								
								<tr>
									<td style="vertical-align:middle">Nama Grafier</td><td style="vertical-align:middle"> :</td><td> <input style="width:150px;" class="form-control" type="text" /></td>
								</tr>
								<tr>
									<td colspan="3">
									<a href="#" data-toggle="modal" data-target="#modalWanita" data-backdrop="static">
									<div class="btn btn-signin col-xs-12 ">Stone Information</div>
									</a>
									</td>
								</tr>
								
							</table>
							</div>
							<br />
							
							
							<br />
							<br><br>
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
						
							
					</div></div>
					
					
			</div>
		</div>
        
		<div class="modal fade" id="modalPria" role="dialog">
		<div class="modal-dialog">
    
		<!-- Modal content-->
		<div class="modal-content">
        <div class="modal-header">Stone Info<button type="button" class="close" data-dismiss="modal">×</button></div>
		<?php
								$xx = 1;
								foreach($dataPria->StoneInformations as $dtl_stone){
							?>
									<table  class="table table-striped"  style="font-family: RalewayRegular;">
										<tr>
											<th colspan="3"><?php  echo $dataPria->ProductID?></th>
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
		</div></div></div>
		
		<div class="modal fade" id="modalWanita" role="dialog">
		<div class="modal-dialog">
    
		<!-- Modal content-->
		<div class="modal-content">
        <div class="modal-header">Stone Info<button type="button" class="close" data-dismiss="modal">×</button></div>
		<?php
								$xx = 1;
								foreach($dataWanita->StoneInformations as $dtl_stone){
							?>
									<table  class="table table-striped"  style="font-family: RalewayRegular;">
										<tr>
											<th colspan="3"><?php  echo $dataWanita->ProductID?></th>
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
		</div></div></div>
        
		
		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b7548f430e12f00128ff989&product=inline-share-buttons' async='async'></script>
		<!--END Slider -->
		<?php
			$this->load->view('template/footer');
		?>
		<script src="<?php echo base_url()?>assets/js/jquery.elevatezoom.js"></script>
		<script type="text/javascript">
		
		
			
			$('.checkRing').change(function(e) {
				
					var totalUnit = 0
					var totalSuggest =  0
				
				$(".checkRing:checked").each(function(){
					var str = $(this).val()
					var data = str.split("|");
					var suggestP = data[0]
					var unitP = data[1]
					
					totalUnit += parseInt(unitP)
					totalSuggest += parseInt(suggestP)
					
				});
				
				
				$('#totalUnit').text(formatNumber(totalUnit))
				$('#totalSugest').text(formatNumber(totalSuggest))
				$('#saveP').text(formatNumber(totalSuggest-totalUnit))
				e.unbind()
			
			})
			
			function formatNumber(num) {
				return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
			}
	
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
					$("#zoom_03f").elevateZoom({constrainType:"height", constrainSize:500, zoomType: "lens", containLensZoom: true, gallery:'gallery_01f', cursor: 'pointer', galleryActiveClass: "active"}); 

					$("#zoom_03f").bind("click", function(e) {  
					  var ez =   $('#zoom_03f').data('elevateZoom');
					  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
						$.fancybox(ez.getGalleryList());     
						
					  return false;
					}); 
					
					$("#zoom_04f").elevateZoom({constrainType:"height", constrainSize:500, zoomType: "lens", containLensZoom: true, gallery:'gallery_02f', cursor: 'pointer', galleryActiveClass: "active"}); 

					$("#zoom_04f").bind("click", function(e) {  
					  var ez =   $('#zoom_04f').data('elevateZoom');
					  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
						$.fancybox(ez.getGalleryList());     
						
					  return false;
					}); 

				}); 

							
			});
			
		</script>


