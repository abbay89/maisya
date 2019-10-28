<?php $this->load->view("template/header_cnt") ?>
  <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
		<?php $this->load->view("template/nav_newmember");?>
		
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
							<li class="breadcrumb-item active">New Registration</li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-2 col-xlg-2 col-md-2"></div>
					<div class="col-lg-8 col-xlg-8 col-md-8">
						<div class="card">							
                            <div class="card-body">
								<h1> Pesanan Anda Sudah Kami Terima </h1>
								<h2> 1 x 24 Tim akan menghubungi anda </h2>
							</div>		
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
	</div>
		
<?php $this->load->view("template/footer_cnt") ?>