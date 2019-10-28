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
						  <div class="menu-main-header"><span> Beranda > Belanja > Paket Platinum </span></div>
						</div>
					  </div>
					</div>	
					<div class="space-30"></div>
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped">
									<thead>
									  <tr>
										<th>Image</th>
										<th>Item Code</th>
										<th>Name</th>
										<th>Quantity</th>
										<th>Price</th>
										<th>Discount</th>
										<th>Net</th>
									  </tr>
									</thead>
									<tbody>
									<?php
										foreach($listprodu as $lst_prod){
											
											$detail	= json_decode(file_get_contents('http://maisya.id:6070/api/ItemCodes?oid='.$lst_prod->ItemCode_oid));
											//print_r($detail); 
									?>
										  <tr>
											<td>
												<img src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $detail->KodeItem ?>&width=100&height=100" class="img-responsive" alt="no image">
											</td>
											<td><?php echo $detail->KodeItem?></td>
											<td><?php echo $detail->Deskripsi?></td>
											<td><?php echo number_format($lst_prod->Quantity) ?></td>
											<td><?php echo number_format($lst_prod->Price) ?></td>
											<td><?php echo number_format($lst_prod->DiscountAmount) ?></td>
											<td><?php echo number_format($lst_prod->Net) ?></td>
										  </tr>
									<?php
											$total = $total + $lst_prod->Net;
										}
									?>
									</tbody>
									<tr>
										<th><h2>Total</h2></th>
										<th colspan="6"  style='text-align: right'>
											<h2 ><?php echo number_format($total) ?></h2>
										</th>
									</tr>
									<tr>
										<th colspan="7">
											<a href="<?php echo base_url()?>pembelian/proc_paket" class="btn btn-danger btn-sm col-xs-12" role="button">
											<i class="fa fa-shopping-cart"></i>
												Buy Now
											</a>
										</th>
									</tr>
								</table>
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


