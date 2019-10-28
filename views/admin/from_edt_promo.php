<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="col-md-12 col-sm-12 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h2>Edit Setting Promo<small> :: Promo <?php echo $detail_promo->term; ?> :: </small></h2>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!--<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?=$_SERVER['PHP_SELF']?>" method="post"> -->
						<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo base_url()?>admin/promo_apps/proc_edtset_promo" method="post">
						
						
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Date Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="col-md-2 col-sm-2 col-xs-12">
										From 
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input  name="fromdate" class="form-control col-md-7 col-xs-12  datepicker-input" value="<?php echo  $detail_promo->fromdate ?>" type="text" >
										<input  name="id" class="form-control col-md-7 col-xs-12  datepicker-input" value="<?php echo  $detail_promo->id ?>" type="hidden" >
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12">
										To
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input name="todate"  class="form-control col-md-7 col-xs-12 datepicker-input" value="<?php echo  $detail_promo->todate ?>" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Plu Promo Jawa
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="plupromo_jkt" value="<?php echo  $detail_promo->plupromo_jkt ?>" class="form-control col-md-7 col-xs-12" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name Promo Jawa
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="nama_jkt" class="form-control col-md-7 col-xs-12" value="<?php echo  $detail_promo->nama_jkt ?>" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Qty Promo Jawa
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="qty_jkt" value="<?php echo  $detail_promo->qty_jkt ?>" class="form-control col-md-7 col-xs-12" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Plu Promo Bali
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="plupromo_bali" value="<?php echo  $detail_promo->plupromo_bali ?>" class="form-control col-md-7 col-xs-12" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name Promo Bali
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="nama_bali" class="form-control col-md-7 col-xs-12" value="<?php echo  $detail_promo->nama_bali ?>" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Qty Promo Bali
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="qty_bali" value="<?php echo  $detail_promo->qty_bali ?>" class="form-control col-md-7 col-xs-12" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Total Available Promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="total" value="<?php echo  $detail_promo->total ?>" class="form-control col-md-7 col-xs-12" type="text">
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Type promo
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="term">
										<option <?php echo $detail_promo->term == 'installation' ? 'selected="selected"' : '' ?> value="installation">Installation</option>
										<option  <?php echo $detail_promo->term == 'PLU' ? 'selected="selected"' : '' ?> value="PLU">PLU</option>
									</select>
								
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Rule
								</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
									<input name="rule" class="form-control col-md-12 col-xs-12" type="text" value="<?php echo  $detail_promo->rule ?>">
								
								</div>
                                <div class="col-md-1 col-sm-1 col-xs-12" style="width:50px;">
									 <div style="padding-top:8px">
                                     	to :
                                     </div>  
								</div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
									<input name="rule_to" class="form-control col-md-12 col-xs-12" type="text" value="<?php echo  $detail_promo->rule_to ?>">
								
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="submit" name="proses promo" class="btn btn-primary" value="Edit Promo" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>