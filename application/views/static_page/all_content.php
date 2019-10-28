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
							  <li class="active"><?php echo $titlepage?></li>
							</ol>
						
						<div class="col-xs-12 col-md-4 col-sm-4">
							<!--
							<ul class="list-group">
								<?php
									if($pagest == 'help')
									{
								?>
										<li class="list-group-item"><a href="<?php echo base_url()?>staticpage/page/help_aboutus" >About Us</a></li>
										<li class="list-group-item"><a href="<?php echo  base_url()?>staticpage/page/help_contact">Contact Us</a></li>
										<li class="list-group-item"><a href="<?php echo  base_url()?>staticpage/page/help_shop">Shop</a></li>
										<li class="list-group-item"><a href="<?php echo  base_url()?>staticpage/page/help_waranty">Warranty And Maintenance</a></li>
								<?php
									}
								?>
							</ul>
							-->
						<div class="footerLink">
							<?php
								if($pagest == 'help')
								{
							?>
								<a class="<?php if($titlepage == 'aboutus'){ echo 'visita';} ?>" href="<?php echo base_url()?>about-us" >
									<div class="list-group-item <?php if($titlepage == 'aboutus'){ echo 'visit';} ?>">
										About Us
										<?php
											if($titlepage == 'aboutus'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'contact'){ echo 'visita';} ?>" href="<?php echo  base_url()?>contact-us">
									<div class="list-group-item <?php if($titlepage == 'contact'){ echo 'visit';} ?>">
										Contact Us
										<?php
											if($titlepage == 'contact'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'shop'){ echo 'visita';} ?>" href="<?php echo  base_url()?>shop">
									<div class="list-group-item <?php if($titlepage == 'shop'){ echo 'visit';} ?>">
										Shop
										<?php
											if($titlepage == 'shop'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'waranty'){ echo 'visita';} ?>" href="<?php echo  base_url()?>waranty-and-maintanance">	
									<div class="list-group-item  <?php if($titlepage == 'waranty'){ echo 'visit';} ?>">
										Warranty And Maintenance
										<?php
											if($titlepage == 'waranty'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
							
							<?php
								} else if($pagest == 'information'){
							?>
								<a class="<?php if($titlepage == 'termpolicy'){ echo 'visita';} ?>" href="<?php echo base_url()?>terms-and-policy" >
									<div class="list-group-item <?php if($titlepage == 'termpolicy'){ echo 'visit';} ?>">
										Terms And Policy
										<?php
											if($titlepage == 'termpolicy'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'privpolicy'){ echo 'visita';} ?>" href="<?php echo  base_url()?>privacy-policy">
									<div class="list-group-item <?php if($titlepage == 'privpolicy'){ echo 'visit';} ?>">
										Privacy Policy
										<?php
											if($titlepage == 'privpolicy'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'buyback'){ echo 'visita';} ?>" href="<?php echo  base_url()?>exchange-policy">
									<div class="list-group-item <?php if($titlepage == 'buyback'){ echo 'visit';} ?>">
										Buy Back / Exchange Policy
										<?php
											if($titlepage == 'buyback'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'faq'){ echo 'visita';} ?>" href="<?php echo  base_url()?>faq">	
									<div class="list-group-item  <?php if($titlepage == 'faq'){ echo 'visit';} ?>">
										FAQ
										<?php
											if($titlepage == 'faq'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
																
							<?php
								}else if($pagest == 'guide'){
							?>
								<a class="<?php if($titlepage == 'payment'){ echo 'visita';} ?>" href="<?php echo base_url()?>staticpage/page/guide_payment" >
									<div class="list-group-item <?php if($titlepage == 'payment'){ echo 'visit';} ?>">
										Shopping & Payment
										<?php
											if($titlepage == 'payment'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
								<a class="<?php if($titlepage == 'term'){ echo 'visita';} ?>" href="<?php echo  base_url()?>delivery-terms">
									<div class="list-group-item <?php if($titlepage == 'term'){ echo 'visit';} ?>">
										Delivery Terms
										<?php
											if($titlepage == 'term'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
							<!--	<a class="<?php if($titlepage == 'material'){ echo 'visita';} ?>" href="<?php echo  base_url()?>material-guide">
									<div class="list-group-item <?php if($titlepage == 'material'){ echo 'visit';} ?>">
										Material Guide
										<?php
											if($titlepage == 'material'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>-->
								<a class="<?php if($titlepage == 'blog'){ echo 'visita';} ?>" href="<?php echo  base_url()?>news">	
									<div class="list-group-item  <?php if($titlepage == 'blog'){ echo 'visit';} ?>">
										News
										<?php
											if($titlepage == 'blog'){
										?>
											<i class="fas fa-caret-right"></i>
										<?php
											}else{
										?>										
											<i class="fas fa-caret-up"></i>
										<?php
											}
										?>
									</div>
								</a>
																
							<?php
								}
									
							?>
						</div>
					</div>
						<div class="col-xs-12 col-md-8 col-sm-8 text-about detail-content">
							<div class="detail-isi">
								<?php echo $contentpage ?>
								<?php
									if($urlpage == 'contact'){
								?>
									<div class="col-md-12">
										<form id='frmContact' method="post" action="<?php echo base_url()?>about_us/savecontact">
											<div class="row">
											<div class="col-md-12">
												<div class="col-md-6">
													<div class="form-group">
														<label for="name">
															Name</label>
														<input type="text" name="contact_name" class="form-control" id="name" placeholder="Enter name" required="required" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="email">
															Email Address</label>
														<div class="input-group">
															<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
															</span>
															<input type="email" name="contact_email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="name">
															Phone</label>
														<input type="text" name="contact_phone" class="form-control" id="name" placeholder="Enter name" required="required" />
													</div>
												</div>
												<div class="col-md-6">
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
														<textarea name="message" id="message" name="contactmsg" class="form-control" class="col-md-12 " rows="10" required="required"
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
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
	</body>
</html>

