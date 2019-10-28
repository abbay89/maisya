<?php $this->load->view("template/header_cnt") ?>
  <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- User profile -->
				<div class="user-profile" style="background: url(<?php echo base_url()?>/assets/images/logo_2.png) no-repeat center; height:150px">
					<!-- User profile image -->
					<!-- User profile text-->
					<br />
					<br />
					<br />
					<br />
					<br />
					</div>
				</div>
			</div>
		</aside>
		
		 <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
				<div class="row page-titles">
					<div class="col-md-5 col-8 align-self-center">
						<h3 class="text-themecolor m-b-0 m-t-0">Registration New Member</h3>
						
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<form class="floating-labels m-t-40" method="post" action="<?php echo site_url()?>/registration/register">
						<div class="card">							
                            <div class="card-body">
								<h4 class="card-title">Profile :</h4>
								
									<div class="row">
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="Nama">
												<label for="input4">Type Your Name</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control"  name="Username">
												<label for="input4">Type Your Username</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="password" class="form-control" name="RealPassword">
												<label for="input4">Type Your Password</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="NoHp">
												<label for="input4">Type Your Phone Number</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="email" class="form-control" name="Email">
												<label for="input4">Type Your Email</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<select name="JenisKelamin" class="form-control">
													<option value="L">Male</option>
													<option value="P">Female</option>
												</select>
											</div>
											<input type="hidden" class="form-control" name="Sponsor_id" value="<?php echo $sponsor ?>">
										</div>
									</div>
								
							</div>
						 </div>
						 <div class="card">							
                            <div class="card-body">
								<h4 class="card-title">Bank :</h4>
								<div class="row">
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="text" class="form-control" name="NamaBank">
											<label for="input4">Type Your Bank Name</label>
										</div>
									</div>
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="text" class="form-control" name="NamaAkunBank">
											<label for="input4">Type Your Rekening Name</label>
										</div>
									</div>
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="text" class="form-control" name="NomorRekening">
											<label for="input4">Type Your Rekening No</label>
										</div>
									</div>
								</div>	
							</div>
						</div>
						<div class="card">							
                            <div class="card-body">
								<h4 class="card-title">Family :</h4>
								<div class="row">
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="text" class="form-control" name="Nama_keluarga">
											<label for="input4">Type Your Other Contact</label>
										</div>
									</div>
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="text" class="form-control" name="NoHP_keluarga">
											<label for="input4">Type Your Other Phone No.</label>
										</div>
									</div>
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="text" class="form-control" name="Email_keluarga">
											<label for="input4">Type Your Other Email</label>
										</div>
									</div>
									<div class="col-lg-5 col-xlg-5 col-md-5">
									</div><div class="col-lg-5 col-xlg-5 col-md-5">
									</div>
									<div class="col-lg-6 col-xlg-6 col-md-6">
										<div class="form-group m-b-40">
											<input type="submit" class="btn btn-primary" value="Register Now">
										</div>
									</div>
								</div>
									
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>