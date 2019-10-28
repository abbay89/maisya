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
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Produk </li>
							<li class="breadcrumb-item active"><?php echo $detailprod->Deskripsi ?> </li>
						</ol>
					</div>
				</div>
				<!--product -->
				<div class="row page-titles">
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="row">
							<div class="col-lg-5 col-xlg-5 col-md-5">
								<!--
								<img class="img-responsive" alt="img" src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $detailprod->KodeItem ?>&width=200&height=200">-->
								
								<img id="zoom_03f" src="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $detailprod->KodeItem ?>&width=200&height=200" data-zoom-image="http://maisya.id:6070/api/itemCode_image?kodeitem=<?php echo $detailprod->KodeItem ?>&width=400&height=400" class="img-responsive img-thumbnail">
								<br />
								<br />
								<div id="gallery_01f" style="width=500px;float:left; ">
									<div class="row">
									<?php
										$i = 1;
										
										foreach($thumbimage as $ls_coll){
											//print_r($ls_coll);
									?>
										
											<div class="col-lg-3 col-xlg-3 col-md-3" >
												<a  href="#" class="elevatezoom-gallery active" data-update="" data-image="http://www.maisya.id:6070/api/ItemCode_Image/<?php echo $ls_coll->Id?>?width=500&height=500" 
												data-zoom-image="http://www.maisya.id:6070/api/ItemCode_Image/<?php echo $ls_coll->Id?>?width=1000&height=1000">
													<img src="http://www.maisya.id:6070/api/ItemCode_Image/<?php echo $ls_coll->Id?>?width=100&height=100" class="img-thumbnail"/>
												</a>	
										
											</div>
									<?php
											$i++;
										}
									?>
									</div>
								</div>
							</div>
							<div class="col-lg-7 col-xlg-7 col-md-7">
								<h2>Overview</h2>
								<p>
									<?php echo $detailprod->Overview ?>
								</p>
								<h1>IDR <?php echo number_format($price)?></h1>
								<a class="btn btn-success" href="<?php echo site_url()?>/checkout/repeat_order/<?php echo $detailprod->OID?>"> Buy Now </a>
							
							</div>
						</div>
						<div class="col-md-12">
							<br /><hr />
							<h2>Detail</h2>
							<?php print_r($detailprod->Details)?>
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
<?php $this->load->view("template/footer_cnt") ?>
<script src="<?php echo base_url()?>/js/jquery.elevatezoom.js"></script>
<script>
$(document).ready(function () {
	$("#zoom_03f").elevateZoom({constrainType:"height", constrainSize:500, zoomType: "lens", containLensZoom: true, gallery:'gallery_01f', cursor: 'pointer', galleryActiveClass: "active"}); 

	$("#zoom_03f").bind("click", function(e) {  
	  var ez =   $('#zoom_03f').data('elevateZoom');
	  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
		$.fancybox(ez.getGalleryList());     
		
	  return false;
	}); 

}); 
</script>