<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="col-md-12 col-sm-12 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h2>Edit Minimum Fee<small> :: Minimum Fee <?php echo $detail->term; ?> :: </small></h2>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!--<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?=$_SERVER['PHP_SELF']?>" method="post"> -->
						<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo base_url()?>admin/promo_apps/proc_minimum_fee" method="post">
						
						
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Nominal
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="nominal" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $detail->nominal; ?>">
									<input name="id" class="form-control col-md-7 col-xs-12" type="hidden" value="<?php echo $detail->id; ?>">
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Message
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="message" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->message; ?>" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="submit" name="proses promo" class="btn btn-primary" value="Edit Minimum Fee" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>