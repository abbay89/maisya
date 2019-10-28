		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<div class="container slider">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12 text-about">
						<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li class="active">Store Location</li>
							</ol>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="vertical-alignment-helper">
								<div class="modal-dialog vertical-align-center">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

											</button>
											 <h4 class="modal-title" id="myModalLabel">Modal title</h4>

										</div>
										<div class="modal-body">
											<div id="map"></div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<?php
							foreach($list_store as $store){
						?>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn">
							<p><?php echo $store['location_name_en'] ?></p>
							<p><?php echo $store['location_address_idn '] ?></p>
							<p><a href="#" class="open-AddBookDialog btn btn-danger" data-toggle="modal" data-id="<?php echo $store['location_lat'] ?>#<?php echo $store['location_long'] ?>#<?php echo $store['location_name_en'] ?>" data-target="#addBookDialog">
								Show Map</a></p>
						</div>
						<?php
							}
						?>
				</div>
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
		<script>
		$(document).on("click", ".open-AddBookDialog", function () {
			 var myBookId = $(this).data('id');
			
			 var res = myBookId.split("#");
			 $(".modal-title").html(res[2]);
			 //$(".modal-body #bookId").val( myBookId );
				var uluru = {lat: parseFloat(res[0]), lng: parseFloat(res[1])};
				console.log(uluru);
				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom:17,
					mapTypeId:google.maps.MapTypeId.HYBRID,
				  center: uluru
				});
			var marker = new google.maps.Marker({
			  position: uluru,
			  map: map,
			  title: 'Uji Caba',
			  icon : base_url + 'assets/img/map.png'
			});
		});
		function initMap(lat,longt) {
			
		}
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOVfpPuuh3VHFvtoas3ZuNTt2Kp9KIkTU&callback=initMap"
async defer></script>
	</body>
</html>

