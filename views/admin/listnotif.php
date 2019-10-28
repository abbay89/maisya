<style>
	.modal { background: rgba(000, 000, 000, 0.8); min-height:1000000px; }
	#country-list {
		float: left;
		list-style: outside none none;
		margin: 35px 0 0 -30px;
		padding: 0;
		position: absolute;
		width: 190px;
		z-index: 100;
	}
	#country-list li {
		background: #fafafa none repeat scroll 0 0;
		border-bottom: 1px solid #CCC;
		padding: 10px;
		cursor:pointer;
	}
	#country-list li:hover {
		background: #f0f0f0 none repeat scroll 0 0;
	}
</style>
<section id="content" class="">
	<div class="row">
		
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="x_panel">
				<div class="x_title">
					<h2>List Notification<small> </small></h2>		   
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                	<form class="form-horizontal form-label-left" action="<?php echo base_url()?>admin/listnotif/proc_addset_listnotif" method="post" enctype="multipart/form-data">
						
                    	<div class="form-group">
                        	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Notification</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                            	<select class="form-control" name="notification_id">
                                <?php foreach ($select_notif as $sel_notif){?>
                                	<option value="<?php echo $sel_notif['notification_id']?>"><?php echo $sel_notif['notification_title']?></option>
                                <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Order</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                            	<input name="notiflist_order"  class="form-control col-md-7 col-xs-12" type="text" required="required">
                            </div>
                        </div>
                        
                        <div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
									<input type="submit" name="proses" class="btn btn-primary" value="Submit" />
								</div>
							</div>
                    </form>
					<table class="table table-striped">						
						<tr>
							<th></th>
                            <th>
								No
							</th>
                            <th>
								Title
							</th>
                            <th>
								Content
							</th>
							<th>
								Images
							</th>		
							<th>
								Start Periode
							</th>
							<th>
								End Periode
							</th>
							<th>
								Status
							</th>
                            <th>
								Order
							</th>
						</tr>
					
						<?php
						$no = 1;
							foreach ($list_notif as $lst_notif)
							{
						?>
								<tr>
                                	<td>
                                    	<a href="#notifmodal" data-backdrop="false" data-toggle='modal' data-id="<?php echo $lst_notif['notification_id'] ?>" class="btn btn-warning">
											Send
										</a>
                                    </td>
									<td>
										<?php echo $no?>
									</td>
									<td>
										<?php echo $lst_notif['notification_title']?>
									</td>		
									<td>
										<?php echo $lst_notif['notification_text']?>
									</td>
									<td>
										<img src="<?php echo base_url();?>assets/uploads/promo/<?php echo $lst_notif['notification_images']?>" height="70px">
									</td>
									<td>
										<?php echo $lst_notif['notification_startperiode']?>
									</td>
									<td>
										<?php echo $lst_notif['notification_endperiode']?>
									</td>	
									<td>
										<?php echo $lst_notif['notification_flag']?>
									</td>
                                    <td>
										<?php echo $lst_notif['notiflist_order']?>
									</td>							
									<td>
										<a href="<?php base_url()?>listnotif/del_listnotif/<?php echo $lst_notif['notiflist_id'] ?>">
											<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/color/bin_closed.png" alt="Edit" />
										</a>
									</td>							
								</tr>

								
						<?php	$no++;
							}
						?> 
					</table>
				</div>
			
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="notifmodal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Push Notification</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    
<script>
	$(document).ready(function(){
        $('#notifmodal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');			
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url()?>admin/listnotif/pushnotif',
                data : 'rowid='+ rowid,
                success : function(data){
                	$('.fetched-data').html(data);
                }
            });
         });
	});
	
	function searchphone(val){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>admin/listnotif/searchphone",
			data:'keyword='+val,
			success: function(data){
				$("#suggesstion-box-phone").show();
				$("#suggesstion-box-phone").html(data);
			}
		});
	}
	
	function selectphone(val) {
		$("#search-phone").val(val);
		$("#suggesstion-box-phone").hide();
	}
</script>