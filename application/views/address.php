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
        
		<?php $this->load->view("template/nav");?>
		
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
						<h3 class="text-themecolor m-b-0 m-t-0">Beranda</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">Profile </li>
							<li class="breadcrumb-item active">Address </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">							
                            <div class="card-body">
								<h4 class="card-title">Add New Address</h4>
								<form class="floating-labels m-t-40" method="post" action="<?php echo site_url()?>/cruddata/saveaddress">
									<div class="row">
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="address_name">
												<span class="bar"></span>
												<label for="input4">Address Name</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="receipt_name">
												<span class="bar"></span>
												<label for="input4">Receipt Name</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="phone_number">
												<span class="bar"></span>
												<label for="input4">Phone Number</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="address">
												<span class="bar"></span>
												<label for="input4">Address</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="city">
												<span class="bar"></span>
												<label for="input4">City</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												
												<input type="text" class="form-control" name="poscode">												
												<span class="bar"></span>
												<label for="input4">Poscode</label>
											</div>
										</div>
										<div class="col-lg-5 col-xlg-5 col-md-5">
												<input type="hidden" class="form-control" name="id_platinum_member" value="<?php echo $id_member?>">
												<input type="hidden" class="form-control" name="country" value="indonesia">
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<input type="submit" class="btn btn-success" value="Add Address" />
										</div>
									</div>
								</form>
							</div>
							<div class="card-body">
								 <div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Address Name</th>
												<th>Receipt Name</th>
												<th>Phone</th>
												<th>Address</th>
												<th>City</th>
												<th>Poscode</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($data_address as $lst_address){
											?>
												<tr>
													<td><?php echo $lst_address['address_name'] ?></td>
													<td><?php echo $lst_address['receipt_name'] ?></td>
													<td><?php echo $lst_address['phone_number'] ?></td>
													<td><?php echo $lst_address['address_name'] ?></td>
													<td><?php echo $lst_address['city'] ?></td>
													<td><?php echo $lst_address['poscode'] ?></td>
													<td><a class="btn btn-warning btn-circle" href="<?php echo site_url()?>/cruddata/deleteaddress/<?php echo $lst_address['id'] ?>"><i class="fa fa-times"></i> </a></td>
												</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
					   
							</div>
						 </div>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>