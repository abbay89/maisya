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
							<li class="breadcrumb-item active">Pembelian </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">
                            <!-- Nav tabs -->
                            <ul role="tablist" class="nav nav-tabs profile-tab">
                                <li class="nav-item"> <a role="tab" href="#status" data-toggle="tab" class="nav-link active">Status Pembelian</a> </li>
                                <li class="nav-item"> <a role="tab" href="#history" data-toggle="tab" class="nav-link">History Pembelian</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" id="status" class="tab-pane active">
                                    <div class="card-body">
										 <div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th>Invoice</th>
														<th>Amount</th>
														<th>Status</th>
														<th>JNE</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="javascript:void(0)">Order #26589</a></td>
														<td>$45.00</td>
														<td>
															<div class="label label-table label-success">Paid</div>
														</td>
														<td>EN</td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
                               
									</div>
                                </div>
								<div role="tabpanel" id="history" class="tab-pane">
                                    <div class="card-body">
										 <div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th>Invoice</th>
														<th>User</th>
														<th>Date</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Country</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="javascript:void(0)">Order #26589</a></td>
														<td>Herman Beck</td>
														<td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
														<td>$45.00</td>
														<td>
															<div class="label label-table label-success">Paid</div>
														</td>
														<td>EN</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0)">Order #58746</a></td>
														<td>Mary Adams</td>
														<td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 12, 2017</span> </td>
														<td>$245.30</td>
														<td>
															<div class="label label-table label-danger">Shipped</div>
														</td>
														<td>CN</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0)">Order #98458</a></td>
														<td>Caleb Richards</td>
														<td><span class="text-muted"><i class="fa fa-clock-o"></i> May 18, 2017</span> </td>
														<td>$38.00</td>
														<td>
															<div class="label label-table label-info">Shipped</div>
														</td>
														<td>AU</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0)">Order #32658</a></td>
														<td>June Lane</td>
														<td><span class="text-muted"><i class="fa fa-clock-o"></i> Apr 28, 2017</span> </td>
														<td>$77.99</td>
														<td>
															<div class="label label-table label-success">Paid</div>
														</td>
														<td>FR</td>
													</tr>
												</tbody>
											</table>
										</div>
                               
									</div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>