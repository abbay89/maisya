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
					<div class="col-lg-8 col-xlg-8 col-md-8">
						<div class="card">							
                            <div class="card-body">
								<div class="table-responsive">
									<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
										<thead>
											<tr>
												<th>Product</th>
												<th style="text-align:right">Qty</th>
												<th style="text-align:right">Net</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$totalprice = 0;
												foreach($this->cart->contents() as $cart){
											?>
											<tr>
												<td><?php echo $cart['name'] ?></td>
												<td align="right"><?php echo number_format($cart['qty'])?></td>
												<td align="right"><?php echo number_format($cart['price'])?></td>
											</tr>
											<?php
													$totalprice = $totalprice + $cart['price'];
												}
											?>
											
										</tbody>
									</table>
								</div>
							</div>		
						</div>
					</div>
					<div class="col-lg-4 col-xlg-4 col-md-4">
						<div class="card">							
                            <div class="card-body">
								<h2>Total : <?php echo number_format($totalprice)?> </h2>
								<form method="post" action="<?php echo site_url()?>/checkout/proc_order_new">
									<textarea style="display:none;" name="data"><?php echo json_encode($this->cart->contents())?> </textarea>
									<input type="submit" class="btn btn-danger" value="Check Out" />
								</form>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			
			
		</div>
	</div>
		
<?php $this->load->view("template/footer_cnt") ?>