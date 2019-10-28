<?php $this->load->view("template/header_cnt") ?>
  <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
		<?php $this->load->view("template/nav_newmember");?>
		
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
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Paket For New Member</li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">							
                            <div class="card-body">
								<div class="table-responsive">
									<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
										<thead>
											<tr>
												<th>ID #</th>
												<th>Product</th>
												<th style="text-align:right">Qty</th>
												<th style="text-align:right">Price</th>
												<th style="text-align:right">Discount</th>
												<th style="text-align:right">Net</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$totalprice = 0;
												$totaldisc	=  0;
												$totalNet	=  0;
												//print_r($listproduct);
												foreach($listproduct as $lstProd){
												//print_r($lstProd);	
												$dtl_prod = file_get_contents("https://maisya.id:6070/api/ItemCodes?oid=".$lstProd->ItemCode_oid);
												$parse_data = json_decode($dtl_prod);
											?>
											<tr>
												<td><?php echo $parse_data->KodeItem ?></td>
												<td>
													<a href="javascript:void(0)"><img src="https://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $parse_data->KodeItem ?>&width=200&height=200" alt="user" class="img-circle" /> <?php echo $parse_data->Deskripsi ?></a>
												</td>
												
												<td align="right"><?php echo number_format($lstProd->Quantity)?></td>
												<td align="right"><?php echo number_format($lstProd->Price)?></td>
												<td align="right"><?php echo number_format($lstProd->DiscountAmount)?></td>
												<td align="right"><?php echo number_format($lstProd->Net)?></td>
											</tr>
											<?php
													$totalprice = $totalprice + $lstProd->Price;
													$totaldisc	= $totaldisc + $lstProd->DiscountAmount;
													$totalNet	= $totalNet + $lstProd->Net;
												}
											?>
											<tr>
												<th></th>
												<th></th>
												<th>
													Total
												</th>
												<th  style="text-align:right"><?php echo number_format($totalprice)?></th>
												<th   style="text-align:right"><?php echo number_format($totaldisc)?></th>
												<th   style="text-align:right"><?php echo number_format($totalNet)?></th>
											</tr>
											<tr class="btn-warning" style="display:none">
												<th></th>
												<th></th>
												<th>
													Bonus Sponsor
												</th>
												<th  style="text-align:right"></th>
												<th   style="text-align:right"></th>
												<th   style="text-align:right"><?php echo number_format($this->config->item('new_reg_bonus'))?></th>
											</tr>
											<tr  class="btn-warning">
												<th></th>
												<th></th>
												<th>
													Grand Total
												</th>
												<th colspan="3" style="text-align:right"><?php echo number_format($totalNet)?></th>
											</tr>
											<tr >
												<th colspan="6" style="text-align:right">
													<div class="row">
														<a class="btn btn-warning col-lg-12 col-xlg-12 col-md-12" href="<?php echo site_url()?>/checkout/newmember/<?php echo $lstProd->ItemCode_oid?>">Buy Packet Now</a>
													</div>
												</th>
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
		
<?php $this->load->view("template/footer_cnt") ?>