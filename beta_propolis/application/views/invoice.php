<?php $this->load->view("template/header_cnt") ?>
	<link href="<?php echo base_url()?>/css/select2.css" rel="stylesheet">
  <style>
	.table td, .table th { padding: 0px; }
  </style>
  <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
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
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<form method="post" action="<?php echo site_url()?>/checkout/proc_order" class="col-lg-12 col-xlg-12 col-md-12">
					<div class="row">
						<div class="col-lg-7 col-xlg-7 col-md-7">
							<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
								<thead>
									<tr style="display:none;">
										<th>Invoice No</th>
										<th></th>
									</tr>
									<tr>
										<th>Date</th>
										<th><?php echo date("d M Y")?></th>
										<input type="hidden" name="transdate" value="<?php echo date("Y-m-d")?>">
									</tr>
									<tr>
										<th>Alamat Kirim</th>
										<th>
											<?php 
												$alamat = $this->db->query("select * from platinum_member_address id where id = '".$data_cust->cust_ad_id."'")->row();
												echo $alamat->address;
											?>
										</th>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-5 col-xlg-5 col-md-5">
							<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>Customer Name</th>
										<th><?php echo $data_cust->Nama?></th>
										
									</tr>
									<tr>
										<th>Customer ID</th>
										<th><?php echo $data_cust->Email?></th>
									</tr>
									
								</tbody>
							</table>
									<!--
									<h2>Total : <?php echo number_format($totalprice)?> </h2>
									
										<textarea style="display:none;" name="data"><?php echo json_encode($this->cart->contents())?> </textarea>
										<input type="submit" class="btn btn-danger" value="Check Out" />
									-->
						</div>
						<div class="col-lg-12 col-xlg-12 col-md-12">
							<div class="card">							
								<div class="card-body">
									<div class="table-responsive">
										<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
											<thead>
												<tr>
													<th>Kode</th>
													<th>Description</th>
													<th style="text-align:right">Qty</th>
													<th style="text-align:right">Unit Price</th>
													<th style="text-align:right">Total Price</th>
													<th style="text-align:right">Total Discount</th>
													<th style="text-align:right">Net Price</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$disprice 	= 0;
												$totalprice = 0;
												$netprice 	= 0;
												if($this->cart->contents()){
													foreach($this->cart->contents() as $cart){
														$dtl_prod = file_get_contents("http://maisya.id:6070/api/ItemCodes?oid=".$cart['id']);
														$parse_data = json_decode($dtl_prod);
														
														$checkpoin	= $this->db->query("select * from master_repeat where kode_item = '".$parse_data->KodeItem."'")->row();
												?>	
												<input type="hidden" name="point[]" value="<?php echo $checkpoin->point?>" />
												<input type="hidden" name="bonus[]" value="<?php echo $checkpoin->bonus_sponsor?>" />
												<input type="hidden" name="discount[]" value="<?php echo $checkpoin->discount?>" />
												<tr>
													<td>
														<?php echo $parse_data->KodeItem ?>
														<input type="hidden" name="oid[]" value="<?php echo $cart['id'] ?>" />
														
														<input type="hidden" name="kditem[]" value="<?php echo $parse_data->KodeItem ?>" />
													</td>
													<td><?php echo $cart['name'] ?></td>
													<td align="right">
														<?php echo number_format($cart['qty'])?>

														<input type="hidden" name="qty[]" value="<?php echo $cart['qty'] ?>" />
													</td>
													<td align="right"><?php echo number_format($cart['price'])?></td>
													<td align="right"><?php echo number_format($cart['price'] * $cart['qty'])?>
														<input type="hidden" name="price[]" value="<?php echo $cart['price'] ?>" />
													</td>
													
													<td style="text-align:right"><?php echo number_format(($cart['price'] * $cart['qty']) * ($checkpoin->discount/100)) ?></td>
													<td style="text-align:right"><?php echo number_format(($cart['qty'] * ($cart['price']) - ($cart['price'] * $cart['qty']) * ($checkpoin->discount/100))) ?></td>
													
												</tr>
												<?php
														$disprice = $disprice + ($cart['price'] * $cart['qty']) * ($checkpoin->discount/100);
														$totalprice = $totalprice + ($cart['price'] * $cart['qty']);
														$netprice = $cart['qty'] * ($totalprice + ($cart['price'] - ($cart['price'] * ($checkpoin->discount/100))));
													}
												}
												?>
												
											</tbody>
										</table>
									</div>
								</div>		
							</div>
						</div>
						<div class="col-lg-7 col-xlg-7 col-md-7"></div>
						<div class="col-lg-5 col-xlg-5 col-md-5">
							<table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>Total Price</th>
										<th style="text-align:right"><?php echo number_format($totalprice)?></th>
									</tr>
									<tr>
										<th>Total Discount</th>
										<th style="text-align:right"><?php echo number_format($disprice)?></th>
									</tr>
									<tr>
										<th></th>
										<th></th>
									</tr>
									<tr>
										<th>Net Payment</th>
										<th style="text-align:right"><?php echo number_format($totalprice - $disprice)?></th>
									</tr>
								</tbody>
							</table>
									<!--
									<h2>Total : <?php echo number_format($totalprice)?> </h2>
									
										<textarea style="display:none;" name="data"><?php echo json_encode($this->cart->contents())?> </textarea>
										<input type="submit" class="btn btn-danger" value="Check Out" />
									-->
					</div>
					</form>
				</div>
			</div>
			
			
			
		</div>
	</div>
		
<?php $this->load->view("template/footer_cnt") ?>
 <script src="<?php echo base_url()?>js/select2.full.js"></script>
 <script>
	$(function(){
		   $('.address').select2({
			   minimumInputLength: 0,
			   allowClear: true,
			   placeholder: 'Select Your Address',
			   ajax: {
				  dataType: 'json',
				  url: '<?php echo site_url()?>/checkout/apiAddress',
				  delay: 800,
				  data: function(params) {
					return {
					  search: params.term
					}
				  },
				  processResults: function (data, page) {
				  return {
					results: data
				  };
				},
			  }
		  }).on('select2:select', function (evt) {
			 //var data = $(".address option:selected").text();
			 //alert("Data yang dipilih adalah "+data);
			 $(".btn_checkout").removeAttr('disabled');
		  });
	 });
 </script>