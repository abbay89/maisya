
<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">:: Data Pemenang Trivia ::</h3>
				</div>
				<div class="panel-body">
					<div class="row">					
						<div class="col-md-12 col-sm-12 col-xs-12">						
							<table class='table table-striped'>
								<tr>
									<th>
										Order Id
									</th>
									<th>
										Nama
									</th>
									<th>
										No TLP
									</th>
									<th>
										No TLP Login
									<th>
										Email
									</th>
									<th>
										Alamat
									</th>
									<th>
										Lokasi Order
									</th>
									<th>
										Detail Order
									</th>
								</tr>
								<?php
									foreach($records as $lst_record)
									{
										//getDetailCustomer
										$sql_cust = $this->db->query("select * from order_apps where order_id = '".$lst_record['order_id']."'")->row();
										if($sql_cust->order_hokben_id != '')
										{
								?>		
										<tr>
											<td>
												<?php echo  $lst_record['order_id']."->". $sql_cust->order_hokben_id  ?>
											</td>
											<td>
												<?php echo  $sql_cust->order_name ?> 
											</td>
											<td> 
												<?php echo  $sql_cust->order_phone ?>
											</td>
											<td>
												<?php echo  $this->db->query("select cust_phone  from customer where cust_hokben_id = '".$sql_cust->cust_id."'")->row()->cust_phone ; ?>
											</td>
											<td>
												<?php echo  $this->db->query("select cust_email from customer where cust_hokben_id = '".$sql_cust->cust_id."'")->row()->cust_email; ?>
											</td>
											<td>
												<?php echo  $sql_cust->order_address ?>
											</td>
											<td>
												<?php echo  $sql_cust->storeid ?>
											</td>
											<td>
												<a target="_BLANK" href="<?php echo base_url();?>admin/hokbentrivia/detailorder/<?php echo $lst_record['order_id']?>">
												Detail Order
												</a>
											</td>
										</tr>
								<?php
										}
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>