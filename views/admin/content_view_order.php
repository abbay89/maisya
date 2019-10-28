<!--<?php echo $map['js']; ?>-->
<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">:: Header Transaction ::</h3>
			  </div>
			  <div class="panel-body">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-4">						
						<div class="clearfix padbot-20 marbot-20 borbot">
							<div id="iframe-cont" class="marbot-30" style="padding-top: 0px !important; height: 450px">
								<?php echo $map['html']; ?> </div>
						</div>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">						
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">:: Detail Transaction ::</h3>
						  </div>
						  <div class="panel-body">
							<div class="col-md-5 col-sm-5 col-xs-12">
								<address>
									<p>
										<strong>Invoice Id : </strong><br>
										<?php echo  $detail->noinvoice; ?>
									</p>
									<p>
										<strong>ID Trans : </strong><br>
										<?php echo  $detail->order_hokben_id; ?>
									</p>
									<p>
										<strong>Store Id : </strong><br>
										<?php echo  $detail->storeid; ?>
									</p>
									<p>
										<strong>Order Date : </strong><br>
										<?php echo  $detail->order_date; ?>
									</p>
									<p>
										<strong>Name : </strong><br>
										<?php echo  $detail->order_name; ?>
									</p>
									<p>
										<strong>Phone : </strong><br>
										<?php echo  $detail->order_phone; ?>
									</p>
									<p>
										<strong>Address : </strong><br>
										<?php echo  $detail->order_address; ?>
									</p>
									<p>
										<strong>Notes : </strong><br>
										<?php echo  $detail->order_notes; ?>
									</p>
									<p>
										<strong>Payment Type : </strong><br>
										<?php 
										if($detail->payment_method == 1)
										{
											echo "COD";
										}		
										else
										{
											echo  "PG";
										}
										?>
									</p>
								</address>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-12">
								<table class="table table-striped">
									<thead> 
										<tr> 
											<th>#</th> 
											<th>PLU ID</th> 
											<th>PLU NAME</th> 
											<th>Qty</th> 
											<th>Price</th> 
											<th>Total</th> 
										</tr> 
									</thead>
									<tbody>
										<?php
											//print_r($detail);
											foreach($detail_menu as $ls_det)
											{
										?>
												<tr> 
													<td>#</td> 
													<td><?php echo $ls_det['menu_id_hokben'] ?></td> 
													<td><?php echo $ls_det['title_en'] ?></td> 
													<td align="right"><?php echo $ls_det['ord_det_qty'] ?></td> 
													<td align="right"><?php echo number_format(($ls_det['ord_det_price'] * 1.1 )/$ls_det['ord_det_qty']) ?></td> 
													<td align="right"><?php echo number_format((($ls_det['ord_det_price']*1.1)/$ls_det['ord_det_qty']) *  $ls_det['ord_det_qty']) ?></td> 
												</tr> 
										<?php
												$total = $total + ((($ls_det['ord_det_price']*1.1)/$ls_det['ord_det_qty']) *  $ls_det['ord_det_qty']);
											}
										?>
									</tbody>
									<tfooter> 
										<tr> 
											<th colspan="5"><strong>Total</strong></th> 
											<th><strong><?php echo  number_format($total) ?></strong></th> 
										</tr> 
										<tr> 
											<th colspan="5"><strong>Delivery Charge</strong></th> 
											<th><strong><?php echo  number_format(($detail->delivery_charge * 1.1)) ?></strong></th> 
										</tr> 
										<tr> 
											<th colspan="5"><strong>Grand total</strong></th> 
											<th><strong><?php echo  number_format($total + ($detail->delivery_charge*1.1)) ?></strong></th> 
										</tr>										
									</tfooter>
								</table>
								
							</div>
							
						  </div>
						</div>						
					</div>
					<div class="alert alert-warning col-md-12 col-sm-12 col-xs-12">
						<form method="post" action="<?php echo base_url()?>admin/detail_order_apps/proc_transfer_order">
							<div class="col-md-2 col-sm-2 col-xs-12">
								Change Store Id: 
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" name="referenceid" value="<?php echo  $detail->noinvoice; ?>"/> * Reference Number
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" name='storeid' id='storeid' placeholder="Input Store Name" />
								<input type="hidden" name='val_storeid' id='val_storeid' placeholder="Input Store Name" />
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<input type="submit" name="submit" class="btn btn-info" value="Change Store" />
							</div>
						</form>	
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">:: Store Around Me ::</h3>
						  </div>
						  <div class="panel-body">
							<table class="table table-striped">
								<thead> 
									<tr> 
										<th>#</th> 
										<th>Store ID</th> 
										<th>Name</th> 
										<th>Open Hour</th> 
										<th>Weekend Open</th> 
										<th>Weekend Close</th> 
										<th>Distance</th> 
									</tr> 
								</thead>
								<tbody>
									<?php
										$i =  1;
										foreach($StoreAroundMe as $aroundMe)
										{
											if($aroundMe->store_id == $detail->storeid)
											{
												$style= 'class="danger"';
											}
											else
											{
												$style= "";
											}
									?>
											<tr <?php echo  $style?>> 
												<td><?php echo $i ?></td> 
												<td><?php echo  $aroundMe->store_id?></td> 
												<td><?php echo  $aroundMe->location_name_idn?></td> 
												<td><?php echo  $aroundMe->location_open_hour?></td> 
												<td><?php echo  $aroundMe->weekend_open?></td> 
												<td><?php echo  $aroundMe->weekend_close?></td> 
												<td><?php echo  number_format($aroundMe->distance * 1.609,2)." km" ?></td> 
											</tr>
									<?php
											$i++;
										}
									?>
								
								</tbody>
							</table>
							
						 </div>
					</div>	
				</div>
			  </div>
			</div>
		</div>
	</div>
</section>
<!--
<script type="text/javascript">
			var currentMarker;
			$(document).ready(function() {

				currentMarker = new google.maps.Marker({
					infowindow_content: 'Your Location'
				});
				currentMarker.setVisible(false);
			});
			function show_map(lat, lng) {
				var newCenter = new google.maps.LatLng(lat, lng);
				map.panTo(newCenter);
				map.setZoom(18);
				$('html, body').animate({scrollTop: $("#formplace").offset().top}, 500);
			}

			function getLocation()
			{
				if (navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(showPosition);
				}
				else {
					x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}

			function showPosition(position) {
				var newCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				map.panTo(newCenter);
				map.setZoom(15);
				var myLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				currentMarker.setVisible(true);
				currentMarker.setPosition(myLatLng);
				currentMarker.setTitle('Your Location');
				currentMarker.setMap(map);
			}
</script>
-->