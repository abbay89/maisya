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
						  <div class="menu-main-header"><span> Beranda > Belanja > Detail Product</span></div>
						</div>
					  </div>
					</div>	
					<div class="space-30"></div>
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="col-xs-12">
									<h3><?php echo $detailprod->Deskripsi ?></h3>
									<img src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $detailprod->KodeItem ?>&width=400&height=400" class="img-responsive">
								</div>
								<div class="col-xs-12">
								
								</div>
							</div>
							<!--<div class="col-xs-12 col-md-6 right-content">-->
							<div class="col-xs-12 col-md-6">
								<h3>Overview</h3>
								<?php echo $detailprod->Overview ?>
								<h2>IDR <?php echo number_format($price) ?></h2>
							</div>
							<div class="col-xs-12 col-md-6">
							</div>
							<div class="col-xs-12 col-md-6">
								<hr />
								<a href="<?php echo base_url()?>pembelian/addcart/<?php echo $detailprod->OID ?>" class="col-xs-12 btn btn-warning" role="button">
								<i class="fa fa-shopping-cart"></i>
											Add To Cart
								</a>
								<br />
								<br />
								<br />
								<div class="btn-group group-sosmed col-xs-12" role="group" aria-label="Basic example">
									<div class="row">
									  <button type="button" class="btn btn-sosmed  col-xs-3">Left</button>
									  <button type="button" class="btn btn-sosmed col-xs-3">Middle</button>
									  <button type="button" class="btn btn-sosmed col-xs-3">Right</button>
									  <button type="button" class="btn btn-sosmed col-xs-3">Right</button>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div id="Detail" class="tab-pane" role="tabpanel">	
									<h3>Detail</h3>
									<?php echo $detailprod->Details ?>
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


