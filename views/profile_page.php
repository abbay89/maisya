		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		<br />
		<div class="container slider">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<?php if($msg){ ?>
						<div class="alert alert-danger">
						  <h2><strong>Important!</strong> <?php echo $msg ?></h2>
						</div>
						<?php } ?>
					</div>
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class="col-xs-12 col-md-3 col-sm-3 left-profile">
							<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $profile->pic_user?>" class="img-circle" alt="e"> 			
							<div class="caption cp-profile">
									<address>
									Name:<br>
									<?php echo $profile->cust_name?><br><br>
									Email:<br>
									<?php echo $profile->cust_email?><br><br>
									Phone:<br>
									<?php echo $profile->cust_phone?><br><br>
									Address:<br>
									<?php echo $profile->alamat_customer?>
								</address>
								
							</div>
							
						</div>
						<div class="col-xs-12 col-md-9 col-sm-9">
							<div class="panel panel-default margin-left ">
							  <div class="btn btn-google">Update Profile Information</div>
							  <div id="sign-in" class="panel-body">
								<form method="post" action="<?php echo base_url()?>profile/update" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" class="form-control" value="<?php echo $profile->cust_name?>" placeholder="Full Name" name="fullname">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email" value="<?php echo $profile->cust_email?>"  name="email">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="phone" value="<?php echo $profile->cust_phone?>"  name="phone">
									</div>
									<div class="form-group">
										<textarea class="form-control" placeholder="Address" name="address"><?php echo $profile->alamat_customer?></textarea>
									</div>
									<?php if((!$msg) or ($profile->cust_password)){ ?>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Old Password" name="oldpassword">
									</div>
									<?php } ?>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="New Password" name="newpassword">
									</div>
									<div class="form-group">
										<label for="exampleInputFile">Upload Picture <span>Max: 100 KB </span></label>
										<input type="file" name="pic_profile" id="exampleInputFile">
									</div>
									 <button type="submit" class="btn btn-signin">Update Profile</button>
								</form>
							  </div>
							</div>
							<div class="panel panel-default margin-left">
								<div class="btn btn-google">Send Testimonial</div>
								<div class="panel-body">
									<form method="post" action="<?php echo base_url()?>profile/sendtestimonial"> 
										<div class="form-group">
											<textarea class="form-control inp_testi" maxlength="160" placeholder="Maximum Text 160 Character" name="testi_desc"></textarea>
											<span id="rchars">160</span> characters remaining
										</div>
										 <input type="submit" class="btn btn-signin" value="Send Testimonial">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				var maxLength = 160;
				$('.inp_testi').keyup(function() {
				  var textlen = maxLength - $(this).val().length;
				  $('#rchars').text(textlen);
				});
			});
		</script>
		<?php
			$this->load->view('template/footer');
		?>


