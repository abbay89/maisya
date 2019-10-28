<section id="content" class="">
	<div class="row">
		
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="x_panel">
				<div class="x_title">
					<h2>Change Minimum Order Apps<small> </small></h2>		   
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-striped">						
						
						<tr>
							<th colspan="11">
								<a class="btn btn-info" href="<?php echo base_url()?>admin/promo_apps/frm_addset_promo">
									<span class="add">Add Setting Promo</span>
								</a>
							</th>
						</tr>
						<tr>
							<th>
								From date
							</th>
							<th>
								To Date
							</th>		
							<th>
								Term
							</th>
							<th>
								Rule
							</th>
							<th>
								Free PLU Bali
							</th>
							<th>
								Name
							</th>	
							<th>
								qty
							</th>							
							<th>
								Free PLU Jawa
							</th>
							<th>
								Name
							</th>
							<th>
								qty
							</th>	
							<th>
								Action
							</th>
						</tr>
					
						<?php
							foreach ($list_promo as $lst_promo)
							{
						?>
								<tr>
									<td>
										<?php echo $lst_promo['fromdate']?>
									</td>
									<td>
										<?php echo $lst_promo['todate']?>
									</td>		
									<td>
										<?php echo $lst_promo['term']?>
									</td>
									<td>
										<?php echo $lst_promo['rule']?>
									</td>
									<td>
										<?php echo $lst_promo['plupromo_bali']?>
									</td>
									<td>
										<?php echo $lst_promo['nama_bali']?>
									</td>	
									<td>
										<?php echo $lst_promo['qty_bali']?>
									</td>							
									<td>
										<?php echo $lst_promo['plupromo_jkt']?>
									</td>
									<td>
										<?php echo $lst_promo['nama_jkt']?>
									</td>	
									<td>
										<?php echo $lst_promo['qty_jkt']?>
									</td>	
									<td>
										<a href="<?php base_url()?>frm_edt_set_promo/<?php echo $lst_promo['id'] ?>">
											<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/color/application_edit.png" alt="Edit" />
										</a>
										<a href="<?php base_url()?>del_set_promo/<?php echo $lst_promo['id'] ?>" onclick="return konfirmasi()">
											<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/color/bin_closed.png" alt="Delete" />
										</a>
									</td>							
								</tr>

								
						<?php	
							}
						?> 
					</table>
				</div>
			
			</div>
		</div>
	</div>
</section>

<script>
function konfirmasi() {
	var msg;
	msg='Are you sure to delete the data? ' ;
	var agree=confirm(msg);
	if (agree)
		return true ;
	else
		return false ;
}
</script>