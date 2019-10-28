<?php
	$this->load->view('template/header');
	$this->load->view('template/navigation');
?>
<div class="container slider ">
    <div class="row invoice_page">
		<div class="col-xs-12">
			<h2>Invoice</h2>
		</div>
		<div class="col-xs-6 header-inv">
			<div>
				<label>Customer</label>
				<span><?php echo $invoice_header->order_name ?></span>
			</div>
			<div>
				<label>Phone</label>
				<span><?php echo $invoice_header->order_phone ?></span>
			</div>
			<div>
				<label>Email</label>
				<span><?php echo $invoice_header->order_email ?></span>
			</div>
			<div>
				<label>Order No</label>
				<span><?php echo $invoice_header->order_code ?></span>
			</div>
		</div>
		<div class="col-xs-6  header-inv">
			<div>
				<label>Date</label>
				<span><?php echo date('d-M-Y',strtotime($invoice_header->order_date)) ?></span>
			</div>
			<div>
				<label>Method</label>
				<span>Transfer Bank</span>
			</div>
		</div>
		<div class="col-xs-12">
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
						<tr class="tbfooter">
							<td colspan="3"><h3>Total</h3></td>
							<td  class="text-right"><h3><?php echo number_format($alltotal)?></h3></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-6 box-trans">
			<h4>Shipping Address</h4>
			<?php echo str_replace("\n","<br />",$invoice_header->order_notes) ?>
		</div>
		<div class="space-box">
			&nbsp;
		</div>
		<div class="col-xs-6 box-trans">
			<?php
				foreach($allBank as $lstBank)
				{
			?>
				<div class="bank col-xs-4 col-md-4 col-sm-4">
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
<br />
<br />
<br />
<?php
	$this->load->view('template/footer');
?>