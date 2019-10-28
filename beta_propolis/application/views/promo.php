<?php $this->load->view("template/header_cnt") ?>
  <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
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
							<li class="breadcrumb-item">Home </li>
							<li class="breadcrumb-item active">Promo </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-12">
						<?php
								if($data_cust->Sponsor_id == 0){
						?>
							<div class="alert alert-success">
								<button aria-label="Close" data-dismiss="alert" class="close" type="button"> <span aria-hidden="true">×</span> </button>
								<h3 class="text-success"><i class="fa fa-check-circle"></i> Upload Dukungan</h3> 
								<form action="<?php echo site_url().'/cruddata/aksi_upload_promo'?>" enctype="multipart/form-data" method="post">
									<div class="form-group ">
									  <div class="col-xs-12">
										<label>Upload File Brosur Promosi</label>
										<input type="file" name="brosur"  class="form-control" placeholder="File Brosur" />
									  </div>
									</div>
									<div class="form-group ">
									  <div class="col-xs-12">
										<input type="submit" value="Prosess" class="btn btn-warning" />
									  </div>
									</div>			
								</form>
							</div>
						<?php 
								
							} ?>
					</div>
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<?php $i = 1; foreach($listpormo as $list){ ?>
								<h2>Brosur Promo :: <?php echo $i ?></h2>
								<a href="<?php echo base_url()?>assets/uploads/promo/<?php echo str_replace(" ","_",$list['brosur'])?>" download><img src="<?php echo base_url()?>assets/images/donwload_pdf.png" /></a><hr />
								<?php $i++; } ?>
							</div>
					    </div>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>