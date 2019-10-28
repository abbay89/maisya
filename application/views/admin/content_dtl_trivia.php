
<section id="content" class="home_radius">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">:: Detail Transaksi Trivia ::</h3>
				</div>
				<div class="panel-body">
					<div class="row">					
						<div class="col-md-12 col-sm-12 col-xs-12">		
							<table class="table table-striped">
								<thead> 
									<tr> 
										<th>#</th> 
										<th>PLU ID</th> 
										<th>PLU NAME</th> 
										<th>Qty</th> 
										<th>Price</th> 
										<th>Total</th> 
									</tr> 
								</thead>
								<tbody>
									<?php
										//print_r($detail);
										foreach($records as $ls_det)
										{
									?>
											<tr> 
												<td>#</td> 
												<td><?php echo $ls_det['menu_id_hokben'] ?></td> 
												<td><?php echo $ls_det['title_en'] ?></td> 
												<td align="right"><?php echo $ls_det['ord_det_qty'] ?></td> 
												<td align="right"><?php echo number_format(($ls_det['ord_det_price'] * 1.1 )/$ls_det['ord_det_qty']) ?></td> 
												<td align="right"><?php echo number_format((($ls_det['ord_det_price']*1.1)/$ls_det['ord_det_qty']) *  $ls_det['ord_det_qty']) ?></td> 
											</tr> 
									<?php
											$total = $total + ((($ls_det['ord_det_price']*1.1)/$ls_det['ord_det_qty']) *  $ls_det['ord_det_qty']);
										}
									?>
								</tbody>
								<tfooter> 
									<tr> 
										<th colspan="5"><strong>Total</strong></th> 
										<th><strong><?php echo  number_format($total) ?></strong></th> 
									</tr> 
									<tr> 
										<th colspan="5"><strong>Delivery Charge</strong></th> 
										<th><strong><?php echo  number_format(($detail->delivery_charge * 1.1)) ?></strong></th> 
									</tr> 
									<tr> 
										<th colspan="5"><strong>Grand total</strong></th> 
										<th><strong><?php echo  number_format($total + ($detail->delivery_charge*1.1)) ?></strong></th> 
									</tr>										
								</tfooter>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>