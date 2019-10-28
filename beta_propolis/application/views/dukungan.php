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
							<li class="breadcrumb-item active">Dukungan </li>
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
								<form action="<?php echo site_url().'/cruddata/aksi_upload'?>" enctype="multipart/form-data" method="post">
									<div class="form-group ">
									  <div class="col-xs-12">
										<label>Upload File Brosur</label>
										<input type="file" name="brosur"  class="form-control" placeholder="File Brosur" />
									  </div>
									</div>
									<div class="form-group ">
									  <div class="col-xs-12">
										<label>Upload File Spanduk</label>
										<input type="file" name="spanduk" class="form-control" placeholder="File Spanduk" />
									  </div>
									</div>
									<div class="form-group ">
									  <div class="col-xs-12">
										<label>Upload File Penelitian</label>
										<input type="file" name="penelitian" class="form-control" placeholder="File Penelitian" />
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
							<ul role="tablist" class="nav nav-tabs profile-tab">
                                <li class="nav-item"> <a role="tab" href="#chat" data-toggle="tab" class="nav-link active">Chat</a> </li>
                                <li class="nav-item"> <a role="tab" href="#alat" data-toggle="tab" class="nav-link">Alat Bantu Pemasaran</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" id="chat" class="tab-pane active">
                                    <div class="card-body">
										<a target="_BLANK" class="btn btn-warning" href="https://web.whatsapp.com/send?phone=+62﻿8179194444&text=Assalammualaikum%20Propolis..">
										<img height="200px;"src= "<?php echo base_url()?>assets/images/whatsapp-transparent.png" /> </a>
									</div>
								</div>
								<div role="tabpanel" id="alat" class="tab-pane">
                                    <div class="card-body">
										<h2>Brosur</h2>
										<a href="<?php echo base_url()?>assets/uploads/dukungan/<?php echo str_replace(" ","_",$listdukungan->brosur)?>" download><img src="<?php echo base_url()?>assets/images/donwload_pdf.png" /></a><hr />
										<h2>Spanduk</h2>
										<a href="<?php echo  base_url()?>assets/uploads/dukungan/<?php echo str_replace(" ","_",$listdukungan->spanduk)?>" download><img src="<?php echo base_url()?>assets/images/donwload_pdf.png" /></a><hr />
										<h2>Hasil peneliatan</h2>
										<a href="<?php echo  base_url()?>assets/uploads/dukungan/<?php echo str_replace(" ","_", $listdukungan->penelitian)?>" download><img src="<?php echo base_url()?>assets/images/donwload_pdf.png" /></a><hr />
									</div>
								</div>
							</div>
					    </div>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>