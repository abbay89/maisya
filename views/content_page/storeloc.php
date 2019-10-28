		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<div class="container slider-content">				
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
						
						<!----End Modal --->
						<div class="col-xs-12 col-md-12 col-sm-12  location ">
							<h2>
								Maisya @SOGO Dept Store 
							</h2>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="open-AddBookDialog btn btn-danger" data-toggle="modal" data-id="-6.1277#106.7887309" data-target="#addBookDialog">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>SOGO Emporium Pluit Mall</p>
							<p><a href="#" class="btn btn-danger">
								Show Map</a></p>
						</div>
						
						<div class="col-xs-12 col-md-12 col-sm-12 location">
							<h2>Jakarta Store </h2>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>MAISYA JEWELLERY GEMS CENTER</p>
							<p>Lantai 1 AKS5-6 Jatinegara Jakarta timur 13410</p>
							<a href="#" class="btn btn-danger">
								Show Map</a>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>MAISYA JEWELLERY CIPINANG INDAH MALL</p>
							<p>Jl.Kali Malang Raya Lt.1 KV.88 No.20-21 Jakarta timur 13410</p> 
							<a href="#" class="btn btn-danger">
								Show Map</a>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
							<p>MAISYA JEWELLERY ALUN-ALUN GRAND INDONESIA</p>
							<p>Grand Indonesia West Mall Lantai 3, Jl. Mh Thamrin Kav. 28 - 30 Menteng, Kb. Melati Jakarta Pusat 10350</p> <a href="#" class="btn btn-danger">
								Show Map</a>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12 location">
							<h2>Bogor Store </h2>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
						<p>MAISYA JEWELLERY BOGOR</p>
						<p>Jl.Pajajaran No.10 Bogor 16153 </p> 
							<a href="#" class="open-AddBookDialog btn btn-danger" data-toggle="modal" data-id="ISBN-001122" data-target="#addBookDialog">
								Show Map</a>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12 location">
							<h2>Medan Store </h2>
						</div>
						<div class="col-xs-4 col-md-4 col-sm-4 boxctn ">
						<p>MAISYA JEWELLERY MEDAN</p>
						<p>Jl. Suryo No. 9 Medan </p> 
							<a href="#" class="btn btn-danger">
								Show Map</a>
						</div>
					</div>						
				</div>
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
		<script>
		$(document).on("click", ".open-AddBookDialog", function () {
			 var myBookId = $(this).data('id');
			 //console.log(myBookId);
evt.preventDefault();			
			var cordinat 	= myBookId.split("#");
			 var lat 		= cordinat[0];
			 var lon		= cordinat[1];
			 
			latlng = new google.maps.LatLng(lat,lon)
			map.setCenter(latlng)
			 /*
			 var uluru = {lat: lat, lng: longi};
			 var map = new google.maps.Map(document.getElementById('map'), {
			  zoom:17,
				mapTypeId:google.maps.MapTypeId.HYBRID,
			  center: uluru
			 });
			 //$(".modal-body #bookId").val( myBookId );
			 */
		});
		
	   var latlng = new google.maps.LatLng(52.000,17.1100);
       var myOptions = {
         zoom: 12,
         center: latlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
       };
       var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
       function initialize() {
         var marker = new google.maps.Marker({
           position: latlng,
           map: map,
         });

         var infoWindow = new google.maps.InfoWindow({
           position: latlng,
           content: '<b>Theater Address:</b>'
         });
        infoWindow.open(map);
      }

      initialize();
		
		/*
		function initMap() {
			var marker = new google.maps.Marker({
			  position: uluru,
			  map: map,
			  title: 'Uji Caba',
			  icon : base_url + 'assets/img/map.png'
			});
		}*/
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOVfpPuuh3VHFvtoas3ZuNTt2Kp9KIkTU&callback=initMap"
async defer></script>
	</body>
</html>

