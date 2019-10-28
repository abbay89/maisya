<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="col-md-12 col-sm-12 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h2>Find Store<small> :: Insert Your Address :: </small></h2>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!--<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?=$_SERVER['PHP_SELF']?>" method="post"> -->
						<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo base_url()?>admin/tracking_store/find_store" method="post" >
						
							
							<div class="form-group">
								<label class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5" for="first-name">Your Address
								</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input name="address" type="text">
									
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
									<input type="submit" class="btn btn-primary" value="Find Now" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>