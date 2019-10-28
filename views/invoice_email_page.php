
<div class="container  invoice">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # <?php echo $invoice_header->order_code ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			
    			<div class="col-xs-12 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $invoice_header->order_name ?><br>
    					<?php echo $invoice_header->order_note ?><br>
    					<?php echo $invoice_header->order_phone ?><br>
    					<?php echo $invoice_header->order_email ?><br>
    					
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			
    			<div class="col-xs-12 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo date('d-M-Y',strtotime($invoice_header->order_date)) ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order Detail</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-right"><strong>Price</strong></td>
        							<td class="text-right"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<?php
									foreach ($invoice_detail as $line) {
								?>
									<tr>
										<td><?php echo $line['menu_id']?></td>
										<td  class="text-right"><?php echo number_format($line['ord_det_price'])?></td>
										<td  class="text-right"><?php echo number_format($line['ord_det_qty'])?></td>
										<td  class="text-right"><?php echo number_format($line['ord_det_price'] * $line['ord_det_qty'])?></td>
									</tr>
								<?php
										$alltotal = $alltotal + ($line['ord_det_price'] * $line['ord_det_qty']);
									}
								?>
								<tr>
									<td colspan="3"><h3>Total</h3></td>
									<td  class="text-right"><h3><?php echo number_format($alltotal)?></h3></td>
								</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
	<div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Bank Transfer</strong></h3>
    			</div>
    			<div class="panel-body">
    				<?php
					foreach($allBank as $lstBank)
						{
					?>
						<div class="bank col-xs-6 col-md-6 col-sm-6">
							<p>
								<img height="40px" src="<?php echo base_url()?>assets/uploads/img_menu/<?php echo $lstBank['bank_pic'] ?>" /> 
							</p>
							<p><?php echo $lstBank['bank_name'] ?></p>
							<p><?php echo $lstBank['bank_rek'] ?><p>
							<p><?php echo $lstBank['bank_rek_name'] ?><p>
						</div>
					<?php
						}
					?>
				</div>
    		</div>
    	</div>
    </div>
</div>