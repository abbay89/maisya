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
						  <div class="menu-main-header"><span> Beranda > Dukungan </span></div>
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
											Brosur
										</a>
									</li>
									<li role="presentation">
										<a data-toggle="tab" href="#hisorder">
											Spanduk
										</a>
									</li>
									<li role="presentation">
										<a data-toggle="tab" href="#hisorder">
											Hasil Penelitian
										</a>
									</li>
								</ul>
								<div class="tab-content">	
									<div id="family" class="tab-pane active" role="tabpanel">
										
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


