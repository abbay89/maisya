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
														<th>Date</th>
														<th>Invoice</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($transaksi_unpaid as $lstrans){
															$gettotal = $this->db->query("select sum(ord_det_net) as total from order_detail where order_id = '".$lstrans['order_id']."'")->row();
															
													?>
														<tr>
															<td>
																<?php echo date("d M Y",strtotime($lstrans['order_date']))?>
															</td>
															<td>
																<a href="<?php echo  site_url()?>/checkout/invoice/<?php echo $lstrans['order_code']?>">
																	<?php echo $lstrans['order_code']?>
																</a>
															</td>
															<td>Rp. <?php echo number_format($gettotal->total)?></td>
															<td>
																<?php if ($lstrans['order_status'] == 0){?>
																<div class="label label-table label-warning">Un Paid</div>
																<?php }else{ ?>
																<div class="label label-table label-success">Paid</div>
																<?php } ?>
															</td>
															<td>
																<a href="<?php echo  site_url()?>/customer/conf_pembelian/<?php echo $lstrans['order_id']?>" class="btn btn-danger">Konfirmasi</a>
															</td>
														</tr>
													<?php
														}
													?>
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
														<th>Date</th>
														<th>Invoice</th>
														<th>Amount</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($transaksi_paid as $lstranspaid){
															$gettotal = $this->db->query("select sum(ord_det_net) as total from order_detail where order_id = '".$lstranspaid['order_id']."'")->row();
															
													?>
														<tr>
															<td>
																<?php echo date("d M Y",strtotime($lstranspaid['order_date']))?>
															</td>
															<td>
																<a href="javascript:void(0)">
																	<?php echo $lstranspaid['order_code']?>
																</a>
															</td>
															<td>Rp. <?php echo number_format($gettotal->total)?></td>
															<td>
																<?php if ($lstranspaid['order_status'] == 0){?>
																<div class="label label-table label-warning">Un Paid</div>
																<?php }else{ ?>
																<div class="label label-table label-success">Paid</div>
																<?php } ?>
															</td>
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
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>