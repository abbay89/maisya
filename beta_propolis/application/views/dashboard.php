<?php $this->load->view("template/header_cnt") ?>
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
							<li class="breadcrumb-item active">Beranda</li>
						</ol>
					</div>
				</div>
				<div class="row">
				<div class="col-12">
					<?php if(count($data_cust_notactive) > 0){ 
							if($data_cust->Sponsor_id == 0){
					?>
						<div class="alert alert-success">
							<button aria-label="Close" data-dismiss="alert" class="close" type="button"> <span aria-hidden="true">×</span> </button>
							<h3 class="text-success"><i class="fa fa-check-circle"></i> New Member</h3> .
							You have a new member to activate. Klik [ <a href="<?php echo site_url()?>/customer/downline">here</a> ] to show the list.
						</div>
					<?php 
							}
						} ?>
				</div>
				<div class="col-4">
					<div class="card">
					   <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
								<div class="m-l-10 align-self-center">
									<h3 class="m-b-0 font-light"><?php echo $data_cust->point?></h3>
									<h5 class="text-muted m-b-0">Total Point</h5></div>
							</div>
						</div> 
                    </div>
				</div>
				<div class="col-4">
					<div class="card">
					   <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
								<div class="m-l-10 align-self-center">
									<h3 class="m-b-0 font-light">Rp.  <?php echo number_format($data_cust->sponsor)?></h3>
									<h5 class="text-muted m-b-0">Sponsor</h5></div>
							</div>
						</div> 
                    </div>
				</div>
				<div class="col-4">
					<div class="card">
					   <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
								<div class="m-l-10 align-self-center">
									<h3 class="m-b-0 font-light">Rp. <?php echo number_format($totalbelanja->total) ?></h3>
									<h5 class="text-muted m-b-0">Total Belanja</h5></div>
							</div>
						</div> 
                    </div>
				</div>
				</div>
				<!--product -->
				<div class="row">
					<?php
						//print_r($listproduct);
						foreach($listproduct as $lstProd){
							
					?>
				
					<div class="col-lg-4 col-xlg-3 col-md-5">
						<div class="card blog-widget">
							<div class="card-body">
								<div class="blog-image">
									<a href="<?php echo site_url()?>/customer/detail/<?php echo $lstProd->OID?>">
										<img class="img-responsive" alt="img" src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $lstProd->KodeItem ?>&width=200&height=200">
									</a>
								</div>
								 <h3><?php echo print_r($lstProd->Deskripsi); ?>
									
								 </h3>
								<label class="label label-rounded label-success"><?php echo print_r($lstProd->KodeItem); ?></label>
								<p class="m-t-20 m-b-20">
									<?php echo print_r(substr($lstProd->Overview,0,100)); ?> 
								</p>
								<div class="d-flex">
									<div class="read"><a class="link font-medium" href="<?php echo site_url()?>/customer/detail/<?php echo $lstProd->OID?>">Buy Now</a></div>
									
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>