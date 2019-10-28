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
							<th>
								Nominal
							</th>
							<th>
								Message
							</th>		
							<th>
								Term
							</th>
							<th>
								Action
							</th>							
						</tr>
					
						<?php
							foreach ($listminimumOrder as $lst_minimum)
							{
						?>
								<tr>
									<td align="right">
										<?php echo number_format($lst_minimum['nominal']); ?>
									</td>
									<td>
										<?php echo $lst_minimum['message']; ?>
									</td>
									<td>
										<?php echo $lst_minimum['term']; ?>
									</td>
									<td>
										<a href="<?php base_url()?>frm_minimum_fee/<?php echo $lst_minimum['id'] ?>">
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
</section>