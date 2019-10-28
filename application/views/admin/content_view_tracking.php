<?php echo $map['js']; ?>
<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">:: Map Tracking Store ::</h3>
			  </div>
			  <div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">						
						<div class="clearfix padbot-20 marbot-20 borbot">
							<div id="iframe-cont" class="marbot-30" style="padding-top: 0px !important; height: 450px">
								<?php echo $map['html']; ?> </div>
						</div>
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
</script>