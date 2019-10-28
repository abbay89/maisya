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
						  <div class="menu-main-header"><span> Beranda > Belanja > Checkout </span></div>
						</div>
					  </div>
					</div>	
					<div class="space-30"></div>
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="row">
						
							<div class="col-xs-8 col-md-8 col-sm-8 detail-cart">	
								<div class="panel panel-default">
									 <div class="btn btn-danger">Alamat Pengiriman</div>
									  <div id="sign-in" class="panel-body">
										<?php
											if(empty($listAddress)){
												echo ' <div class="col-xs-12 btn btn-danger">Tidak Alamat Pengiriman, Silahkan isi alamat pengiriman di halaman profile Klik [ <a href="'.base_url().'profile">Disini</a> ]</div>';
											}
											$i = 0;
											foreach ($listAddress as $lstAdd){
												//print_r($lstAdd->Id);
												if($i%2 == 0){
													$style = 'style="background-color:#f2f2f2;"';
												}else{
													$style = '';
												}
												//print_r($lstAdd);
										?>
											<div class="col-xs-12 col-md-12 col-sm-12" <?php echo $style?>>
												<div class="col-xs-1 col-md-1 col-sm-1" style="text-align:center;">
													
													<p style="margin-top:30px;">
													<input type="radio" name="address_id" class="address_id" class="form-check-input" value="<?php echo $lstAdd->cust_ad_id?>">
													</p>
												</div>
												<div class="col-xs-10 col-md-10 col-sm-10">
													<h4>
														<?php echo $lstAdd->LabelAlamat ?>
													</h4>
													<b>
														Nama Penerima : &nbsp;<?php echo $lstAdd->cust_name ?><br />
													</b>
													Alamat Kirim : <br /><?php echo $lstAdd->cust_ad_address ?>,&nbsp;
													Kota : &nbsp;<?php echo $lstAdd->kecamatan ?>,&nbsp;
													Kode Pos : &nbsp;<?php echo $lstAdd->cust_postel_code ?>,&nbsp;
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
								<div class="panel panel-default">
									<?php					
										foreach($cart as $lstChart)
										{
											
											print_r($cart);
									?>
										<div class="col-xs-12 col-md-12 col-sm-12 detail-cart">	
											<div class="panel panel-default">
												<div id="sign-in" class="panel-body">
													<div class="col-xs-12 col-md-12 col-sm-12">
														<p>
															<b>Penjual : </b> Maisya
														</p>
														<div class="col-xs-5 col-md-2 col-sm-2">
															<a href="<?php echo base_url()."detailproduct/".$lstChart['id']; ?>/1">
															<img src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $lstChart['id']?>&width=100&height=100" class="img-thumbnail image">
															</a>
														</div>
														<div class="col-xs-7 col-md-5 col-sm-5 "  style="padding-left:20px;">
															<b>
																<a href="<?php echo base_url()."detailproduct/".$lstChart['id']; ?>/1">
																<?php echo $lstChart['name']; ?>
																</a></b>
															<p>
																<input type="hidden" name="price[]" value="<?php echo $lstChart['price']?>" />
																
																	Rp. <?php echo number_format($lstChart['price']); ?><br />
																	Weight : <?php echo $lstChart['weight_item']; ?> Gr
																
															</p>
														</div>
														<div class="col-xs-6 col-md-2 col-sm-2">
															<div class="plus-min">
																<a href="<?php echo base_url()?>checkout/minuschart/<?php echo $lstChart['id']; ?>/<?php echo $lstChart['qty']; ?>">
																	<i class="fa fa-minus"></i>
																</a>
																	&nbsp;&nbsp;
																	<?php echo $lstChart['qty']; ?>
																	&nbsp;&nbsp;
																<a href="<?php echo base_url()?>checkout/pluschart/<?php echo $lstChart['id']; ?>/<?php echo $lstChart['qty']; ?>">
																	<i class="fa fa-plus"></i>
																</a>
															</div>
														</div>
														<div class="col-xs-3 col-md-2 col-sm-2 pull-right">
															<input type="hidden" name="qty[]" value="<?php echo $lstChart['qty']?>" />
															<h4><?php echo number_format($lstChart['qty'] * $lstChart['price']); ?></h4>&nbsp;
														</div>
														<div class="col-xs-2 col-md-1 col-sm-1 plus-min">
															<a href="<?php echo base_url()?>checkout/minuschart/<?php echo $lstChart['id']; ?>/1">
																<i class="fa fa-trash"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php
											$subtotal = $subtotal + ($lstChart['qty'] * $lstChart['price']);
										}
									?>
								</div>
							</div>
							<div class="col-xs-4 col-md-4 col-sm-4 " >
								<div class="row">
									<div class="col-xs-12 col-md-12 col-sm-12 pull-right" >
										<div class="panel panel-default" style="background-color:#efefef;border:1px solid #cfcfcf;">
											<div class="btn btn-danger">Ringkasan Belanja</div>
											<div id="sign-in" class="panel-body">
												<div class="row">
													<div class="col-xs-12 col-md-12 col-sm-12" >
														<div class="col-xs-5 col-md-5 col-sm-5"><b>Total </b> </div>
														<div class="col-xs-7 col-md-7 col-sm-7 side-right">
															<h2><?php echo  number_format($subtotal) ?></h2>&nbsp;&nbsp;
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
														</div>
													</div>
													<input type="hidden" id="idalamat" name="idalamat" />
													<div class="col-xs-12 col-md-12 col-sm-12" style="margin-left:15%;">	<br />
													<br />						  
														<input type="button" value="Continue to checkout" id="checkout" class="btn btn-warning">
													</div>							
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div><!--/.content-->
			</div>
		</div>
		<?php
			$this->load->view('template/footer_cnt');
		?>


