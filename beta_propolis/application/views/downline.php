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
							<li class="breadcrumb-item">Home </li>
							<li class="breadcrumb-item">Membership </li>
							<li class="breadcrumb-item active">Downline </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">							
                            <div class="card-body">
								<h4 class="card-title">List Downline
								</h4>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>Active</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($list_downline as $lst_downline){
													//print_r($lst_downline);
											?>	
											<tr>
												
												<td><?php echo $lst_downline['Nama']?></td>
												<td><?php echo $lst_downline['Email']?></td>
												<td><?php echo $lst_downline['NoHP']?></td>
												<td>
													<?php if($lst_downline['Active'] == 'Y') { ?>
														<div class="label label-table label-success">Yes</div>
													<?php }else{ ?>
														<div class="label label-table label-danger">No</div>
													<?php } ?>
												</td>
												<td><a href="<?php echo site_url()?>/cruddata/activatemember/<?php echo $lst_downline['id']?>" class="btn btn-warning">Activate Now</a></td>
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