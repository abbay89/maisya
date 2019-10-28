		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<div class="container slider-content">				
			<div class="space-top">
				<div class="">
					<div class="col-xs-12 col-md-12 col-sm-12 text-about">
						<div class="row">
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li class="active"><?php echo $titlepage?></li>
							</ol>
						</div>
					
						<?php echo $contentpage ?>
						
						<?php
							if($urlpage == 'contact'){
						?>
							<div class="col-md-12">
								<form method="post" action="<?php echo base_url()?>about_us/savecontact">
									<div class="row">
									<div class="col-md-12">
										<div class="col-md-5">
											<div class="form-group">
												<label for="name">
													Name</label>
												<input type="text" name="contact_name" class="form-control" id="name" placeholder="Enter name" required="required" />
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label for="email">
													Email Address</label>
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
													</span>
													<input type="email" name="contact_email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label for="name">
													Phone</label>
												<input type="text" name="contact_phone" class="form-control" id="name" placeholder="Enter name" required="required" />
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label for="name">
													Country</label>
												<input type="text" class="form-control" name="contact_country" id="name" placeholder="Enter name" required="required" />
											</div>
										</div>
										<div class="col-md-5 ">
											<div class="form-group">
												<label for="name">
													Message</label>
												<textarea name="message" id="message" name="contactmsg" class="form-control" rows="9" cols="25" required="required"
													placeholder="Message"></textarea>
											</div>
											<div class="form-group">
												<button class="btn btn-signin " type="submit">Send Message</button>
											</div>
										</div>
									</div>
									</div>
								</form>
							</div>
						<?php
							}
						?>
					</div>						
				</div>
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
	</body>
</html>

