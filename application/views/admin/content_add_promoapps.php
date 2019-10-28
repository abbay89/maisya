<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="col-md-12 col-sm-12 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h2>Edit Promo<small> :: Content Promo Mobile Apps :: </small></h2>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!--<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?=$_SERVER['PHP_SELF']?>" method="post"> -->
						<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo base_url()?>admin/promo_apps/proc_add_promo" method="post" enctype="multipart/form-data">
						
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Image Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									 
									 <input id="input-1" type="file" name="file_wh_image_thumb_url_apps" class="file">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No Plu Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="wh_pluid" class="form-control col-md-7 col-xs-12" type="text">
									* Diisikan 999 jika banner hanya berupa promo banner
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="wh_title_en" class="form-control col-md-7 col-xs-12" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Big Image Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									
									 <input id="input-1" type="file" name="wh_image_thumb_url_apps_promo" class="file">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Status
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="radio col-md-3 col-sm-3 col-xs-12">
										<select name="wh_mob_active">
											<option value="1">Active</option>
											<option value="0">Not Active</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Date Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="col-md-2 col-sm-2 col-xs-12">
										From 
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input  name="fromdate" class="form-control col-md-7 col-xs-12  datepicker-input" type="text" >
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12">
										To
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input name="todate"  class="form-control col-md-7 col-xs-12 datepicker-input" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Day Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="first-name" name="promoday" class="form-control col-md-7 col-xs-12" type="text">
									* Diisi 1= senin, 2 = selasa, 3 = Rabu , dst
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Position
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="first-name" name="wh_position" class="form-control col-md-7 col-xs-12" type="text">
									* Diisi 1,2,3,4,5,6 atau dihitung dari atas
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Location
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="wh_location">
											<option value="all">All</option>
											<option value="jawa">Jawa</option>
											<option value="bali">Bali</option>
									</select>
									
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="submit" name="proses promo" class="btn btn-primary" value="Add Promo" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>