		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$allarray	= explode(",",$validatefilter);
		?>
			
		<div class="container  slider-content">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li class="active">Order Confirmation</li>
							</ol>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12 category">						
							<div class=" col-xs-12 col-md-12 col-sm-12 top-catalog ">
								<h3>
									Order Confirmation
								</h3>
							</div>
							<?php
							//	print_r($this->session->all_userdata());
							?>
							<div class=" col-xs-12 col-md-12 col-sm-12 frmpaymentconfirm ">								
								<form method="post" action="<?php echo base_url()?>konfirmasi/save">
								  <div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('cust_username') ?>" id="email" placeholder="Email">
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Invoice No</label>
									<input type="text" class="form-control" name="invoiceid" value="<?php echo $idinvoice ?>" id="invoiceNo" placeholder="Email">
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Rekening No</label>
									<input type="text" class="form-control" name="rekno" id="rekno" placeholder="Rekening No">
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Rekening Name</label>
									<input type="text" class="form-control" name="rekname" id="rekname" placeholder="Rekening Name">
								  </div>
								  <div class="form-group col-xs-6 col-md-6 col-sm-6 ">
									<label for="exampleInputEmail1">Pay from</label>
									<input type="text" class="form-control" name="frombank" id="frombank" placeholder="BCA">
								  </div>
								  <div class="form-group col-xs-6 col-md-6 col-sm-6 ">
									<label for="exampleInputEmail1">To</label>
									<input type="text" class="form-control" name="tobank" id="tobank" placeholder="MANDIRI">
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Payment Date</label>
									<input type="text" id="datepicker" class="form-control" name="konfirmasidate" placeholder="Choose Date">
								  </div>
								  <div class="form-group">
									<button type="submit" class="btn btn-google">Send</button>
								  </div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<script type="text/javascript">
			  $( function() {
				$( "#datepicker" ).datepicker();
				$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			  } );
		</script>  
		<?php
			$this->load->view('template/footer');
		?>


