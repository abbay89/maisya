		<?php
			$this->load->view('template/header_cnt');
		?>
		   
		<div class="content onload">
            <div class="row">   
				<div class="col-md-12 kilatte">
					<div class="container">
						<div class="row navbar-container">  
							<div class="navbar-right">
								<nav role="navigation" class="navbar">
									<div class="collapse navbar-collapse">
									  <ul id="user-menu" class="nav navbar-nav user-menu navbar-right">
										<li class="login" style="margin-right:10px;"><a href="<?php echo base_url()?>pembelian/checkout"><span class="icon icon-bag" aria-hidden="true"></span> Cart</a></li>
										<li class="login"><a href="<?php echo base_url()?>profile/logout"><span class="icon icon-power" aria-hidden="true"></span> Logout</a></li>&nbsp;
										
									  </ul>
									</div>
								</nav>
							</div>						  
						</div>
					</div>
					<div class="menu-main">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="menu-main-header"><span> Beranda > Belanja > First Order Confirmation </span></div>
						</div>
					  </div>
					</div>	
					<div class="space-30"></div>
					<form method="post" action="<?php echo base_url()?>pembelian/prosescheckout_reg">
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="row">
							<div class="col-xs-8 no-padding">
								<?php		
									//echo "<pre>";
									//print_r($cart);
									//echo "</pre>";
									foreach($cart as $lstChart)
									{
										
										$detail	= json_decode(file_get_contents('http://maisya.id:6070/api/ItemCodes?oid='.$lstChart->ItemCode_oid));
								?>
									<div class="col-xs-12 col-md-12 col-sm-12 detail-cart">	
										<div class="col-xs-2 col-md-2 col-sm-2">
											<img src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $detail->KodeItem ?>&width=100&height=100" class="img-responsive" alt="no image">
										</div>
										<div class="col-xs-5 col-md-3 col-sm-3 "  style="padding-left:20px;">
											<b>
												<?php echo $detail->KodeItem?><br />
												<?php echo $detail->Deskripsi?>
											</b>
											<p>
												<input type="hidden" name="itemname[]" value="<?php echo $detail->Deskripsi?>" />
												<input type="hidden" name="kditem[]" value="<?php echo $detail->KodeItem?>" />
												<input type="hidden" name="qty[]" value="<?php echo $lstChart->Quantity?>" />
												<input type="hidden" name="price[]" value="<?php echo $lstChart->Net?>" />
													Qty : <?php echo $lstChart->Quantity; ?><br />
													Rp. <?php echo number_format($lstChart->Price); ?><br />
													Discount :Rp. <?php echo number_format($lstChart->DiscountAmount); ?> 
												
											</p>
										</div>
										<div class="col-xs-5 col-md-3 col-sm-3 ">
											<p>
												<h3>Rp. <?php echo number_format($lstChart->Net); ?> </h3>
												
											</p>
										</div>
									</div>
								<?php
										$total = $total + $lstChart->Net;
									}
								?>
							</div>
							<div class="col-xs-4 no-padding">
								<div class="">
									<div class="col-xs-12 col-md-12 col-sm-12 " >
										<div class="panel panel-default" style="background-color:#efefef;border:1px solid #cfcfcf;">
											<div class="btn btn-danger">Alamat Pengiriman</div>
											<div id="sign-in" class="panel-body">
												<div class="">
													<?php
														$i = 0;
														foreach ($allAddress as $lstAdd){
															if($i%2 == 0){
																$style = 'style="background-color:#f2f2f2;"';
															}else{
																$style = '';
															}
															//echo "<pre>";
															//print_r($lstAdd);
															//echo "</pre>";
													?>
														<div class="col-xs-12 col-md-12 col-sm-12" <?php echo $style?>>
															<div class="col-xs-1 col-md-1 col-sm-1" style="text-align:center;">
																<br />
																<br />
																<input type="radio" name="address_id" class="address_id" class="form-check-input" value="<?php echo $lstAdd->cust_ad_id?>">
															</div>
															<div class="col-xs-10 col-md-10 col-sm-10">
																<b>
																<?php echo $lstAdd->cust_name ?><br />
																</b>
																<?php echo $lstAdd->cust_ad_address ?>,&nbsp;
																Kota : &nbsp;<?php echo $lstAdd->city_name ?>,&nbsp;
																Tlp : &nbsp;<?php echo $lstAdd->cust_phone ?><br />
															</div>
															<div  class="col-xs-1 col-md-1 col-sm-1" style="text-align:center;" >
																<a  href="<?php echo base_url()?>checkout/del_address/<?php echo $lstAdd->cust_ad_id ?>">
																	<br />
																	<br />
																	<i style="font-size:20px;" class="fas fa-trash-alt"></i>
																</a>
															</div>
														</div>
															
													<?php
															$i++;
														}
													?>				
												</div>
											</div>
										</div>
										<br />
										<div class="panel panel-default" style="background-color:#efefef;border:1px solid #cfcfcf;">
											<div class="btn btn-danger">Ringkasan Belanja</div>
											<div id="sign-in" class="panel-body">
												<div class="row">
													<div class="col-xs-12 col-md-12 col-sm-12" >
														<div class="col-xs-5 col-md-5 col-sm-5"><b>Total </b> </div>
														<div class="col-xs-7 col-md-7 col-sm-7 side-right">
															<h2><?php echo  number_format($total) ?></h2>&nbsp;&nbsp;
														</div>
													</div>
													<div class="col-xs-12 col-md-12 col-sm-12">
														<div class="col-xs-5 col-md-5 col-sm-5"><b>Kurir </b> </div>
														<div class="col-xs-7 col-md-7 col-sm-7  side-right">
															<select name="kurir">
																<option value="jnereguler">JNE Regular</option>
																<option value="jneexpress">JNE Express</option>
															</select>
														</div>
													</div>
													<div class="col-xs-12 col-md-12 col-sm-12">
														<br />
														<div class="col-xs-5 col-md-5 col-sm-5"><b>Apply Voucher </b> </div>
														<div class="col-xs-7 col-md-7 col-sm-7  side-right">
															<input type="name" name="voucher" />
															<input type="hidden" name="bonus_sponsor" value="<?php echo $bonussponsor ?>" />
															<input type="hidden" name="bonus_point" value="<?php echo $bonuspoint ?>" />
														</div>
													</div>
													<input type="hidden" id="idalamat" name="idalamat" />
													<div class="col-xs-12 col-md-12 col-sm-12" style="margin-left:15%;">	<br />
													<br />						  
														<input type="submit" value="Continue to checkout" id="checkout" class="btn btn-warning">
													</div>							
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div><!--/.content-->
			</div>
		</div>
		<?php
			$this->load->view('template/footer_cnt');
		?>


