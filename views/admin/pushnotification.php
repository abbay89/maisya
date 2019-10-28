<form class="form-horizontal form-label-left" action="<?php echo base_url()?>admin/notification/proc_send_notif" method="post" autocomplete="off">
                        <div class="form-group">
                        	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Title</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                            	<input class="form-control col-md-12 col-xs-12" type="text" required="required" value="<?php echo $detail_notif->notification_title?>" disabled>
								<input type="hidden" name="notification_title" value="<?php echo $detail_notif->notification_title?>">
                                <input type="hidden" name="notification_id" value="<?php echo $detail_notif->notification_id?>">
                            </div>
                        </div>
						<div class="form-group">
                        	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Content</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                            	<textarea class="form-control col-md-12 col-xs-12" name="notification_text"><?php echo $detail_notif->notification_text?></textarea>
                            </div>
                        </div>
						<div class="form-group">
                        	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Phone</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
								<div style="margin-top:7px;"> 
									<input type="radio" name="phone" checked="checked" onClick="sphone('all')" value="1"> All
								</div>
								<div> 
									<input type="radio" name="phone" onClick="sphone('phone')" value="2"> Phone
								</div>
								<div style="display:none;" id="phc">
                            		<input class="form-control col-md-12 col-xs-12" type="text" value="" style="margin-bottom:7px;" onKeyUp="searchphone(this.value)" id="search-phone" name="notification_phone">
                                    <span id="suggesstion-box-phone"></span>
                                    <div>
                                    	<button type="button" onclick="apdphone()">Add</button>
                                    </div>
                                    <style>
										#tblist{
											margin-top:10px;
										}
										#tampilapd td{
											border:thin solid #CCC;
											padding:5px;
										}
									</style>
                                    <table id="tblist" width="100%" cellpadding="0" cellspacing="0" border="1">
                                    	<tbody id="tampilapd">
                                       	</tbody>
                                    </table>
								</div>
                            </div>
                        </div>
                        
                        <div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
									<input type="submit" name="proses" class="btn btn-primary" value="SEND" />
								</div>
							</div>
                    </form>

<script>
	function sphone(a){
		if(a == 'all'){
			$('#phc').hide();
		}
		else if(a == 'phone'){
			$('#phc').show();
			
		}
	}
	
	$("#tblist").on('click', '#btnDelete', function () {
		$(this).closest('tr').remove();
	});	
</script>