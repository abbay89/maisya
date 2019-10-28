			</div><!--/.content-->
		</div>
	</div>
	</div>
	
	<script src='<?php echo base_url() ?>templates/hexa/assets/js/bootstrap.min.js'></script>
	<script src='<?php echo base_url() ?>templates/hexa/assets/js/bootstrap-switch.min.js'></script>
	<script src='<?php echo base_url() ?>templates/hexa/assets/js/owl.carousel.js'></script>
	<script src='<?php echo base_url() ?>templates/hexa/assets/js/jquery.slimscroll.min.js'></script>
	<script src='<?php echo base_url() ?>templates/hexa/assets/js/cookie.js'></script>
	<script src='<?php echo base_url() ?>templates/hexa/assets/js/whmcs.js'></script>
	
	<!-- Chart.js -->
    <script src="<?php echo base_url()?>assets_front/vendors/Chart.js/dist/Chart.min.js"></script>
    
    <script src="<?php echo base_url()?>assets_front/js/jquery-ui.min.js"></script>
	 <!-- jquery.inputmask -->
    <script src="<?php echo base_url()?>assets_front/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	<script src=" <?php echo  base_url()?>assets_front/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
	<!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>assets_front/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url()?>assets_front/js/custom.js"></script>
	
	<script>
	$(document).ready(function(){
		if ($('#lineChart').length ){				
		  var ctx = document.getElementById("lineChart");
		  var lineChart = new Chart(ctx, {
			type: 'bar',
			data: {
			  labels: <?php echo  json_encode($label) ?>,
			  datasets: [{
				label: "Current Bandwidth Scheme",
				backgroundColor: "rgba(38, 185, 154, 0.31)",
				borderColor: "rgba(38, 185, 154, 0.7)",
				pointBorderColor: "rgba(38, 185, 154, 0.7)",
				pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
				pointHoverBackgroundColor: "#fff",
				pointHoverBorderColor: "rgba(220,220,220,1)",
				pointBorderWidth: 1,
				data: <?php echo  json_encode($value) ?>
			  }]
			},
		  });
		
		}
		
		$("#ionRangeSlider").ionRangeSlider({
		  type: "double",
		  min: 50,
		  max: 150,
		  from: 0,
		  to: 100
		});
	});
	</script>
</body>
</html>