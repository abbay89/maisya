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
							<li class="breadcrumb-item">Membership </li>
							<li class="breadcrumb-item active">Afiliasi </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">							
                            <div class="card-body">
								<h4 class="card-title">Link Affiliasi : 
									<?php echo site_url()?>/registration/request/<?php echo $idserver."_".$idserver."_".str_replace(" ","",$profilename)?>
								</h4>
								<form class="floating-labels m-t-40" method="post" action="<?php echo site_url()?>/cruddata/sendafiliasi">
									<div class="form-group m-b-40">
									<input type="text" class="form-control" id="input4" name="emailname">
									<input type="hidden" class="form-control" name="link" value="<?php echo site_url()?>/registration/request/<?php echo $idserver."_".$idserver."_".str_replace(" ","",$profilename)?>">
									<span class="bar"></span>
									<label for="input4">Type Email Address Here</label>
									<span class="help-block"><small>Type Your Friend Email To Send Affiliasi.Then Press Enter To Submit</small></span> </div>
								</form>
								
								<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d80615311a9a9f8"></script> 
							</div>
						 </div>
						 
						 <?php echo $msg ?>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>