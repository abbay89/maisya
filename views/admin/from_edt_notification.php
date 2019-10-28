<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="col-md-12 col-sm-12 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h2><small> :: Edit Notification  :: </small></h2>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form class="form-horizontal form-label-left" action="<?php echo base_url()?>admin/notification/proc_edtset_notification" method="post" enctype="multipart/form-data">
                        	<input type="hidden" name="notification_id" value="<?php echo  $detail_notif->notification_id ?>" />
						
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Title
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="notification_title"  class="form-control col-md-7 col-xs-12" type="text" value="<?php echo  $detail_notif->notification_title ?>">
								
								</div>
								
							</div>
                            <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Periode
								</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
									<div class="col-md-1 col-sm-1 col-xs-12" style="padding-top:7px;">
										From 
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input name="notification_startperiode" class="form-control col-md-7 col-xs-12  datepicker-input"  type="text" value="<?php echo  $detail_notif->notification_startperiode?>">
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12" style="padding-top:7px;">
										To
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input name="notification_endperiode"  class="form-control col-md-7 col-xs-12 datepicker-input" type="text" value="<?php echo  $detail_notif->notification_endperiode?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Content
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									 <textarea class="form-control col-md-7 col-xs-12" name="notification_text"><?php echo  $detail_notif->notification_text ?></textarea>
								</div>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Detail
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<textarea class="form-control col-md-12 col-xs-12" name="notification_detail"><?php echo  $detail_notif->notification_detail ?></textarea>
								
								</div>
								
							</div>
                            
                            <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Images
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
                                	<div class="col-xs-4 col-md-4">
										<div href="#" class="thumbnail">
										  <img src = "<?php echo base_url()?>assets/uploads/promo/<?php echo  $detail_notif->notification_images ?>" />
										  <b>recent image</b>
										</div>
										
									</div>
									<input name="notification_images" type="file">
								
								</div>
								
							</div>
                            
                            <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Status
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input name="notification_flag" type="checkbox" value="1" <?php if($detail_notif->notification_flag == 1){?> checked<?php }?>> Aktif
								
								</div>
								
							</div>
							
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="submit" name="proses" class="btn btn-primary" value="Submit" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'notification_detail' );
</script>