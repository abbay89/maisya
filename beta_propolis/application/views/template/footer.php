 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright @ 2018
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets_front/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets_front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets_front/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>assets_front/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url()?>assets_front/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url()?>assets_front/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url()?>assets_front/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets_front/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url()?>assets_front/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>assets_front/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url()?>assets_front/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url()?>assets_front/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url()?>assets_front/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>assets_front/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets_front/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	 <!-- Ion.RangeSlider -->
	 <!-- jquery.inputmask -->
    <script src="<?php echo base_url()?>assets_front/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    
	<!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets_front/js/custom.js"></script>
	<script src=" <?php echo  base_url()?>assets_front/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
   <script> 
		$(document).ready(function(){
			if ($('#lineChart').length ){				
			  var ctx = document.getElementById("lineChart");
			  var lineChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: <?php echo  json_encode($label) ?>,
				  datasets: [{
					label: "Data Bandwidth Usage BOD",
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
