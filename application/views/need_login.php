		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$allarray	= explode(",",$validatefilter);
		?>
			
		<div class="container  slider">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12 login-page">
						
						
						<div class="col-xs-12 col-md-5 col-sm-5 box-loginpage">
							<div class="collection-img">
								<h2>
									LOGIN
								</h2>
								<p>
									Already have an account? Let’s login and start shopping!
								</p>
							</div>
							<form action="<?php echo base_url() ?>home/login" method="post">
								<div class="form-group">
									<input type="text" class="form-control" id="email" name="username" placeholder="email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="password">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-signin col-xs-12 ">Sign In</button>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1" class="col-xs-12 col-md-12 col-sm-12">
									<a href="#" data-toggle="modal" data-target="#forgotpass" data-backdrop="static">Forgot Password</a></label>							
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1" class="col-xs-12 col-md-12 col-sm-12">Or sign in with these accounts</label>
								</div>
								<div class="form-group">
									<!--<button type="button"  onClick="fblogin()"  class="btn btn-primary col-xs-12 ">Sign In with Facebook</button>-->
									<a  href="<?php echo base_url()?>fblogin/fbconfig.php" class="btn btn-primary col-xs-12 ">Register with Facebook</a>
								</div>
								<div class="form-group">
									<!--<button type="button" onclick="googlelogin()" class="btn btn-google col-xs-12 ">Sign In with Google</button>-->
									<?php

									/* Google App Client Id */
									define('CLIENT_ID', '199030119534-c5ucg8tqi67b27ibhb1lhd87i2dsn6bi.apps.googleusercontent.com');
									/* Google App Client Secret */
									define('CLIENT_SECRET', 'i28Vwu3PWesNNyaTBJ7gkscE');
									/* Google App Redirect Url */
									define('CLIENT_REDIRECT_URL', 'https://www.maisya.id/home/validatelogingoogle');

									$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

								?>
								<a  href="<?php echo $login_url?>" class="btn btn-google col-xs-12 ">Register with Google</a>
								</div>
							</form>
						</div>
						<div class="col-xs-2 col-md-2 col-sm-2">
						
						</div>
						<div class="col-xs-12 col-md-5 col-sm-5 box-loginpage">
							<div class="collection-img">
								<h2>
									REGISTER
								</h2>
								<p>
									New to Maisya Jewellery? Let’s create an account to start shopping!
								</p>
							</div>
							<form action="<?php echo base_url()?>home/register" onsubmit="return validateForm()"  name="frmReg" method="post">
								<div class="form-group">
									<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="email" name="email" placeholder="email">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="password">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="checkAgree">
									<label class="form-check-label" for="exampleCheck1">
										I Agree to the terms of use and privacy statement
									</label>
								</div>
								<div class="form-group">
									<button type="submit" id="btn-register" class="btn btn-signin col-xs-12 ">Register Now</button>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1" class="col-xs-12 col-md-12 col-sm-12">
									<a href="#" data-toggle="modal" data-target="#forgotpass" data-backdrop="static">Forgot Password</a>Forgot Password</a></label>
									
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1" class="col-xs-12 col-md-12 col-sm-12">Or sign in with these accounts</label>
								</div>
								<div class="form-group">
									<button type="button" onClick="fblogin()" class="btn btn-primary col-xs-12 ">Sign In with Facebook</button>
								</div>
								<div class="form-group">
								<?php

									/* Google App Client Id */
									define('CLIENT_ID', '199030119534-c5ucg8tqi67b27ibhb1lhd87i2dsn6bi.apps.googleusercontent.com');
									/* Google App Client Secret */
									define('CLIENT_SECRET', 'i28Vwu3PWesNNyaTBJ7gkscE');
									/* Google App Redirect Url */
									define('CLIENT_REDIRECT_URL', 'https://www.maisya.id/home/validatelogingoogle');

									$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

								?>
								<a  href="<?php echo $login_url?>" class="btn btn-google col-xs-12 ">Register with Google</a>
									<!--<button type="button" class="btn btn-google col-xs-12 ">Sign In with Google</button>-->
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


