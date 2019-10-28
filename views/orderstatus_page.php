		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$allarray	= explode(",",$validatefilter);
		?>
			
		<div class="container  slider-content">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li class="active">Order Status</li>
							</ol>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12 category">						
							<div class=" col-xs-12 col-md-12 col-sm-12 top-catalog ">
								<h3>
									Order Status
								</h3>
							</div>
							
							<div class=" col-xs-12 col-md-12 col-sm-12">
								<div class="col-xs-12 col-md-12 col-sm-12 lst-order-h">
									<div class="col-xs-3 col-md-3 col-sm-3">
										<label>No Invoice</label>								
									</div>
									<div class="col-xs-3 col-md-3 col-sm-3 price">
										<label>Total Amount</label>
									</div>
									<div class="col-xs-2 col-md-2 col-sm-2">
										<label>Status</label>
									</div>
									<div class="col-xs-4 col-md-4 col-sm-4">
										<label>Action</label>										
									</div>
								</div>
								<?php
							//		echo "<pre>";
					//print_r($detail_prod);
					//echo "</pre>sdfa";
					//exit;	
								foreach($detail_prod as $listProduct){
									//print_r("select konfirmasidate from konfirmasi_order where invoiceid = '".$listProduct->order_code."'");
									$row		= $this->db->query("select konfirmasidate from konfirmasi_order where invoiceid = '".$listProduct->order_code."'")->row();
									$datebayar  = date("d M Y",strtotime($row->konfirmasidate));
								?>
									<div class="col-xs-12 col-md-12 col-sm-12 lst-order">
										<div class="col-xs-3 col-md-3 col-sm-3">
											<?php echo $listProduct->order_code?>										
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 price">
											<?php 
												$getamount = $this->db->query("select sum(ord_det_price) as total from order_detail where order_id = '".$listProduct->order_id."'")->row();
												echo  number_format($getamount->total);
											?>
										</div>
										<div class="col-xs-2 col-md-2 col-sm-2">
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
										<div class="col-xs-2 col-md-2 col-sm-2">
											<a class="btn btn-status" href="<?php echo base_url()?>invoice/detail/<?php echo $listProduct->order_code?>">
													Detail
											</a>
																						
										</div>
										<div class="col-xs-2 col-md-2 col-sm-2">
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
								<?php
									}
								?>
								
							</div>
							<div class="col-xs-12 col-md-12 col-sm-12 text-center">
								<div id="pagingHere" class="text-center"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>


