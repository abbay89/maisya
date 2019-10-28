		<?php
			$this->load->view('template/header_cnt');
		?>
		   
          <div class="content onload">
            <div class="row">   
				<div class="col-md-12 kilatte">
					<div class="container">
						<div class="row navbar-container">  
							<div class="navbar-right">
								<nav role="navigation" class="navbar">
									<div class="collapse navbar-collapse">
									  <ul id="user-menu" class="nav navbar-nav user-menu navbar-right">
										<li class="login" style="margin-right:10px;"><a href="<?php echo base_url()?>pembelian/checkout"><span class="icon icon-bag" aria-hidden="true"></span> Cart</a></li>
										<li class="login"><a href="<?php echo base_url()?>profile/logout"><span class="icon icon-power" aria-hidden="true"></span> Logout</a></li>
									  </ul>
									</div>
								</nav>
							</div>						  
						</div>
					</div>
					<div class="menu-main">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="menu-main-header"><span> Membership </span></div>
						</div>
					  </div>
					</div>	
				</div><!--/.content-->
			</div>
		</div>
	</div>
		<script>
			$(document).ready(function(){
				$('#birthday').daterangepicker({
				  singleDatePicker: true,
				  singleClasses: "picker_1",
				  timePicker : false,
				  timePicker24Hour : true,
				  timePickerSeconds: false,
				  locale: {
						format: 'YYYY-MM-DD'
					}
				}, function(start, end, label) {
				  console.log(start.toISOString(), end.toISOString(), label);
				});
				
				///
				$("#addaddress").click(function(){
					$("#frmAlamat").toggle("slow");
				});
				$("#addbank").click(function(){
					$("#frmBank").toggle("slow");
				});
				//
				$("#proctambah").click(function(){
					$.ajax({
					  method: "POST",
					  url: "<?php echo base_url()?>membership/addAddress",
					  data: $("#inpAlamat").serialize()
					})
					.done(function( msg ) {
						//alert( "Data Saved: " + msg );
						$("#frmAlamat").toggle();						
						$("#detAddress").append(msg);
					});
				});
				
				//
				$("#proctambahbank").click(function(){
					$.ajax({
					  method: "POST",
					  url: "<?php echo base_url()?>membership/addBank",
					  data: $("#inpBank").serialize()
					})
					.done(function( msg ) {
						//alert( "Data Saved: " + msg );
						$("#frmBank").toggle();						
						$("#detBank").append(msg);
					});
				});
			});
		</script>
		<?php
			$this->load->view('template/footer_cnt');
		?>


