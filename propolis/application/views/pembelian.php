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
										<li class="login"><a href="<?php echo base_url()?>profile/logout"><span class="icon icon-power" aria-hidden="true"></span> Logout</a></li>
									  </ul>
									</div>
								</nav>
							</div>						  
						</div>
					</div>
					<div class="menu-main">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="menu-main-header"><span> Beranda > Pembelian </span></div>
						</div>
					  </div>
					</div>	
					<div class="space-30"></div>
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="row">
							<div class="col-xs-12 no-padding" role="tablist">
								<ul id="tabs" class="nav nav-tabs">
									<li role="presentation" class="active">
										<a data-toggle="tab" href="#stsorder">
											Status Pembelian
										</a>
									</li>
									<li role="presentation">
										<a data-toggle="tab" href="#hisorder">
											History Pembelian
										</a>
									</li>
								</ul>
								<div class="tab-content">	
									<div id="family" class="tab-pane active" role="tabpanel">
										<div class="container">
											<div class="row">
												<div class=" col-xs-12 col-md-12 col-sm-12">
													<div class="col-xs-12 col-md-12 col-sm-12 lst-order-h">
														<div class="col-xs-6 col-md-2 col-sm-2">
															<label>No Invoice</label>								
														</div>
														<div class="col-xs-3 col-md-3 col-sm-3 price hidden-xs hidden-sm">
															<label>Total Amount</label>
														</div>
														<div class="col-xs-2 col-md-2 col-sm-2 hidden-xs hidden-sm">
															<label>Status</label>
														</div>
														<div class="col-xs-6 col-md-2 col-sm-2">
															<label>JNE Tracking</label>
														</div>
														<div class="col-xs-3 col-md-3 col-sm-3 hidden-xs hidden-sm">
															
															<div class="col-xs-6 col-md-6 col-sm-6">
																<label>Show</label>
															</div>
															<div class="col-xs-6 col-md-6 col-sm-6">
																<label>Status</label>
															</div>
														</div>
													</div>
													<?php
										
														foreach($detail_prod as $listProduct){
															//print_r("select konfirmasidate from konfirmasi_order where invoiceid = '".$listProduct->order_code."'");
															$row		= $this->db->query("select konfirmasidate from konfirmasi_order where invoiceid = '".$listProduct->order_code."'")->row();
															$datebayar  = date("d M Y",strtotime($listProduct->order_date));
														?>
															<div class="col-xs-12 col-md-12 col-sm-12 lst-order">
																<div class="col-xs-6 col-md-2 col-sm-2">
																	<?php echo $listProduct->order_code?>										
																</div>
																<div class="col-xs-3 col-md-3 col-sm-3 price hidden-xs hidden-sm">
																	<?php 
																		$getamount = $this->db->query("select sum(ord_det_price) as total from order_detail where order_id = '".$listProduct->order_id."'")->row();
																		echo  number_format($getamount->total);
																	?>
																</div>
																<div class="col-xs-2 col-md-2 col-sm-2 hidden-xs hidden-sm" >
																	<?php 
																		if($listProduct->order_status)
																		{
																			echo "Sudah Dibayar <br />Tanggal :".$datebayar;
																		}
																		else
																		{
																			echo  "Belum Di Bayar";
																		}
																	?>
																</div>
																<div class="col-xs-6 col-md-2 col-sm-2">
																	<a style="text-decoration:underline;"  href="#">
																			<?php echo $listProduct->jne_id ?>
																	</a>
																</div>
																<div class="col-xs-3 col-md-3 col-sm-3 hidden-xs hidden-sm">
																	<div class="col-xs-6 col-md-6 col-sm-6">
																		<a style="text-decoration:underline;" href="<?php echo base_url()?>invoice/detail/<?php echo $listProduct->order_code?>">
																				Detail
																		</a>
																	</div>
																	<div class="col-xs-6 col-md-6 col-sm-6">
																	<?php
																		if(!$listProduct->order_status)
																		{
																	?>
																		<a class="btn btn-confirm" href="<?php echo base_url()?>konfirmasi/formconfirm/<?php echo $listProduct->order_code?>">
																				Confirm
																		</a>	
																	<?php
																		}else{
																	?>
																			<a class="btn btn-signincomplete" href="#">
																				Lunas
																			</a>
																	<?php
																		}
																	?>
																	</div>
																</div>
															</div>
														<?php
															}
														?>
													
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
	</div>
		<?php
			$this->load->view('template/footer_cnt');
		?>


