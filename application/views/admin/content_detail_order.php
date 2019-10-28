
<section id="content" class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="x_panel">
				<div class="x_title">
					<h2>Detail Order Apps<small> </small></h2>		   
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
						<tr>
							<th>
								Create Date
							</th>
							<th>
								Ship Date
							</th>		
							<th>
								Ship Phone
							</th>
							<th>
								Ship Name
							</th>
							<th>
								Payment Method
							</th>
							<th>
								Store
							</th>
							<th>
								Customer type
							</th>
							<th>
								Status
							</th>
							<th>
								Call ID
							</th>
							<th>
								Invoice
							</th>
							<th>
								Device
							</th>
							<th>
								Action
							</th>							
						</tr>
						</thead>
						<tbody>
						<?php
							foreach ($listOrder as $dtOrder)
							{
								//print_r(dtOrder);
						?>
								
						<tr>
							<td>
								<?php echo $dtOrder['createdate']; ?>
							</td>
							<td>
								<?php echo $dtOrder['order_date']?>
							</td>		
							<td>
								<?php echo $dtOrder['order_phone']?>
							</td>
							<td>
								<?php echo $dtOrder['order_name']?>
							</td>
							<td>
								<?php 
									if($dtOrder['payment_method'] ==  1)
									{
										echo  "COD";
									}else{
										echo "PG";
									}
								?>
							</td>
							<td>
								<?php echo $dtOrder['storeid']?>
							</td>
							<td>
								<?php echo $dtOrder['contact_type']?>
							</td>
							<td>
								<?php 
									if($dtOrder['payment_method'] ==  1)
									{
										echo $dtOrder['status_order'];
									}else{
										if($dtOrder['PG'] == 0 )
										{
											echo "Uncomplete";
										}
										else if($dtOrder['PG'] == 1 ){
											echo "Success";
										}
										else
										{
											echo "Cancel";
										}
									}
								?>
							</td>
							<td>
								<?php echo $dtOrder['order_hokben_id']?>
							</td>
							<td>
								<?php 
									if($dtOrder['referenceid'])
									{
										echo $dtOrder['referenceid'];
									}
									else
									{
										echo $dtOrder['noinvoice'];
									}
								?>
							</td>
							<td>
								<?php echo $dtOrder['device']?>
							</td>
							
							<td>
								<a href="<?php echo base_url()?>admin/detail_order_apps/detail/<?php echo $dtOrder['order_id'] ?>">
									<img src="<?php echo base_url()?>assets/grocery_crud/images/icons/color/find.png" alt="Set Location">
								</a>
							</td>							
						</tr>
								
						<?php	
							}
						?> 
						</tbody>
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