<section id="content" class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="col-md-3 col-sm-3 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h4>Promo Jawa<small></small></h4>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php
							foreach ($listPromo as $dtPromo)
							{
								if((($dtPromo['wh_location'] == 'jawa') or ($dtPromo['wh_location'] == 'all')) and $dtPromo['wh_mob_active'] == '1')
								{
									if(($dtPromo['wh_position'] == 1) or ($dtPromo['wh_position'] == 2) or ($dtPromo['wh_position'] == 4) or ($dtPromo['wh_position'] == 5))
									{
										?>	
											<div class="col-md-6 col-sm-6 col-xs-12">	
												<img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_image_thumb_url_apps']; ?>" />
											</div>
										<?php
									}
									else
									{
										?>	
											<div class="col-md-12 col-sm-12 col-xs-12">	
												<img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_image_thumb_url_apps']; ?>" />
											</div>
										<?php								
									}
								}
							}
						?>    
					</div>
				
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">	
				<div class="x_panel">
					<div class="x_title">
						<h4>Promo Bali<small></small></h4>		   
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php
							foreach ($listPromo as $dtPromo)
							{
								if((($dtPromo['wh_location'] == 'bali') or ($dtPromo['wh_location'] == 'all')) and $dtPromo['wh_mob_active'] == '1')
								{
									if(($dtPromo['wh_position'] == 1) or ($dtPromo['wh_position'] == 2) or ($dtPromo['wh_position'] == 4) or ($dtPromo['wh_position'] == 5))
									{
										?>	
											<div class="col-md-6 col-sm-6 col-xs-12">	
												<img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_image_thumb_url_apps']; ?>" />
											</div>
										<?php
									}
									else
									{
										?>	
											<div class="col-md-12 col-sm-12 col-xs-12">	
												<img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_image_thumb_url_apps']; ?>" />
											</div>
										<?php								
									}
								}
							}
						?>    
					</div>
				
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="x_panel">
				<div class="x_title">
					<h2>Change Setting Promo<small> </small></h2>		   
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-striped">
						<tr>
							<th colspan="10">
								<a href="<?php base_url() ?>promo_apps/frm_add" class="btn btn-primary"> Add Promo Banner</a>
							</th>							
						</tr>
						<tr>
							<th>
								Name
							</th>
							<th>
								Image
							</th>		
							<th>
								Big Image
							</th>
							<th>
								Position
							</th>
							<th>
								From Date
							</th>
							<th>
								To Date
							</th>
							<th>
								Location
							</th>
							<th>
								Status
							</th>
							<th>
								Plu Id
							</th>
							<th>
								Action
							</th>							
						</tr>
					
						<?php
							foreach ($listPromo as $dtPromo)
							{
						?>
								<tr>
									<td>
										<?php echo $dtPromo['wh_title_en']; ?>
									</td>
									<td>
										<div class="row">
										  <div class="col-xs-12 col-md-12">
											<a href="#" class="thumbnail">
											  <?php
												if($dtPromo['wh_pluid'] == '999')
												{
											?>
													<img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_url']; ?>" />
											<?php
												}
												else
												{
											?>
											  <img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_image_thumb_url_apps']; ?>" />
											<?php
												}
											?>
											</a>
										  </div>
										</div>
										
									</td>		
									<td>
										<div class="row">
										  <div class="col-xs-12 col-md-12">
											<a href="#" class="thumbnail">
												<?php
													if($dtPromo['wh_pluid'] == '999')
													{
												?>
														<img src = "<?php echo base_url()?>/assets/uploads/promo/<?php echo $dtPromo['wh_image_thumb_url_apps_promo']; ?>" />
												<?php
													}
													else
													{
												?>
														<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/cross.png" alt="Delete" />
												<?php
													}
												?>
											</a>
										  </div>
										</div>
										
									</td>
									<td>
										<?php echo $dtPromo['wh_position']; ?>
									</td>
									<td>
										<?php echo $dtPromo['fromdate']; ?>
									</td>
									<td>
										<?php echo $dtPromo['todate']; ?>
									</td>
									<td>
										<?php echo $dtPromo['wh_location']; ?>
									</td>
									<td>
										<?php 
											if($dtPromo['wh_mob_active'] == 1)
											{
												echo '<img src="'.base_url().'assets/grocery_crud/images/icons/black/32/check.png" alt="Delete" />';
											}
											else
											{
												echo '<img src="'.base_url().'assets/grocery_crud/images/icons/black/32/cross.png" alt="Delete" />';
											}
										?>
										
										
									</td>
									<td>
										<?php echo $dtPromo['wh_pluid']; ?>
									</td>
									<td>
										<a href="<?php base_url()?>promo_apps/delete/<?php echo $dtPromo['wh_id'] ?>">
											<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/color/bin_closed.png" alt="Delete" />
										</a>
										<a href="<?php base_url()?>promo_apps/frm_edit/<?php echo $dtPromo['wh_id'] ?>">
											<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/color/application_edit.png" alt="Edit" />
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
	
    <!-- Content
    <div class="fluid1000">
		<div class="clearfix home-marbot30">
			<?php
				foreach ($listPromo as $dtPromo)
				{
			?>
					<div class="left grid-2 text-center">
						<p>
							<?php echo $dtPromo['wh_title_en']; ?>
						</p>
					</div>
			<?php	
				}
			?>                         
		</div>
    </div>
 -->
</section>