		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<div class="container slider">				
			<div class="space-top">
				<div class="">
					<div class="col-xs-12 col-md-12 col-sm-12 text-about">
						<div class="row">
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li><a href="#">Help</a></li>
							  <li class="active">Contact us</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form>
								<legend><i class="fas fa-building"></i> Our office</legend>
								<address class="addresscontact">
									<strong>Twitter, Inc.</strong><br>
									Gedung Maisya<br>
									 Jln. Pahlawan Revolusi No.2<br>
									Pondok Bambu<br>
									Jakarta 13430 
									<abbr title="Phone">
										P:</abbr>
									0818 148 982
								</address>
								<address>
									<strong>Customer Service</strong><br>
									<a href="mailto:maisyajewelleryid@yahoo.com">maisyajewelleryid@yahoo.com</a>
								</address>
								</form>
							</div>
							<div  class="col-md-12">
								<h2>Get in Touch With Us</h2>
								<p>You can contact us using the below Contact Form for Product & Service related feedbacks.For any other enquiries, please send an email to support@maisyajewellery.com </p>
							</div>
						</div>
						<div class="col-md-12">
							<form method="post" action="<?php echo base_url()?>about_us/savecontact">
								<div class="row">
								<div class="col-md-12 frmContact">
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
									<div class="col-md-12 ">
										<div class="form-group">
											<label for="name">
												Message</label>
											<textarea name="message" id="message" name="contactmsg" class="form-control" rows="9" cols="25" required="required"
												placeholder="Message"></textarea>
										</div>
										
									</div>
									<div class="col-md-12 ">
										<div class="form-group">
											<button class="btn btn-signin " type="submit">Send Message</button>
										</div>
									</div>
								</div>
								</div>
							</form>
						</div>
						
					
					
					</div>						
				</div>
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
	</body>
</html>

