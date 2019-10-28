
<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">:: Content Trivia:: Filter</h3>
				</div>
				<div class="panel-body">
					<div class="row">					
						<div class="col-md-12 col-sm-12 col-xs-12">						
							<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo base_url()?>admin/hokbentrivia/find_winner" method="post">
											
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> From date
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="fromdate" class="form-control col-md-7 col-xs-12" type="text" >
										
									</div>
									
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Todate date
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="todate" class="form-control col-md-7 col-xs-12" type="text" >
										
									</div>
									
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> PLU Master
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="plumaster" class="form-control col-md-7 col-xs-12" type="text" >
										*text with |. examp : plua|plub|dst...
									</div>
									
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> PLU Add On
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="pluaddon" class="form-control col-md-7 col-xs-12" type="text" >
										
									</div>
									
								</div>
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
										<input type="submit" name="proses promo" class="btn btn-primary" value="Find The Winner" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>