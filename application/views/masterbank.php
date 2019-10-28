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
							<li class="breadcrumb-item active">Master Bank </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">							
                            <div class="card-body">
								<h4 class="card-title">Add New Bank</h4>
								<form class="floating-labels m-t-40" method="post" action="<?php echo site_url()?>/cruddata/savebank">
									<div class="row">
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="bank_name">
												<span class="bar"></span>
												<label for="input4">Bank Name</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="bank_rek">
												<span class="bar"></span>
												<label for="input4">Rekening No.</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6">
											<div class="form-group m-b-40">
												<input type="text" class="form-control" name="bank_an">
												<span class="bar"></span>
												<label for="input4">Rekening Name</label>
											</div>
										</div>
										<div class="col-lg-6 col-xlg-6 col-md-6"></div>
										<div class="col-lg-5 col-xlg-5 col-md-5">
												<input type="hidden" class="form-control" name="id_platinum_member" value="<?php echo $id_member?>">
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
												<th>Bank Name</th>
												<th>Rekening No</th>
												<th>Rekening Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($data_bank as $lst_bank){
											?>
												<tr>
													<td><?php echo $lst_bank['bank_name'] ?></td>
													<td><?php echo $lst_bank['bank_rek'] ?></td>
													<td><?php echo $lst_bank['bank_an'] ?></td>
													<td><a class="btn btn-warning btn-circle" href="<?php echo site_url()?>/cruddata/deletebank/<?php echo $lst_bank['id'] ?>"><i class="fa fa-times"></i> </a></td>
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