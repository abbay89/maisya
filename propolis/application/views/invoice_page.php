<?php
	$this->load->view('template/header_cnt');
	//print_r($detail[0]);
?>
	<div class="content onload">
		<div class="row">
			<div class="col-xs-12">
				<h2>Invoice</h2>
			</div>
			<div class="col-xs-6 header-inv">
				<div>
					<label>Customer</label>
					<span><?php echo $header[0]->order_name ?></span>
				</div>
				<div>
					<label>Phone</label>
					<span><?php echo $header[0]->order_phone ?></span>
				</div>
				<div>
					<label>Email</label>
					<span><?php echo $header[0]->order_email ?></span>
				</div>
				<div>
					<label>Order No</label>
					<span><?php echo $header[0]->order_code ?></span>
				</div>
			</div>
			<div class="col-xs-6  header-inv">
				<div>
					<label>Sales Order Id</label>
					<span><?php echo $header[0]->so_id ?></span>
				</div>
				<div>
					<label>JNE Id</label>
					<span><?php echo $header[0]->jne_id ?></span>
				</div>
				<div>
					<label>Date</label>
					<span><?php echo date('d-M-Y',strtotime($header[0]->order_date)) ?></span>
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
								<td><strong>Code</strong></td>
								<td><strong>Item Name</strong></td>
								<td class="text-right"><strong>Price</strong></td>
								<td class="text-right"><strong>Quantity</strong></td>
								<td class="text-right"><strong>Totals</strong></td>
							</tr>
						</thead>
						<tbody>
							<?php
	//print_r($invoice_detail);
								foreach ($detail as $line) {
							?>
								<tr>
									<td><?php echo $line['menu_id']?></td>
									<td><?php echo $line['itemname']?></td>
									<td  class="text-right"><?php echo number_format($line['ord_det_price'])?></td>
									<td  class="text-right"><?php echo number_format($line['ord_det_qty'])?></td>
									<td  class="text-right"><?php echo number_format($line['ord_det_price'] * $line['ord_det_qty'])?></td>
								</tr>
							<?php
									$alltotal = $alltotal + ($line['ord_det_price'] * $line['ord_det_qty']);
								}
							?>
							<tr class="tbfooter">
								<td colspan="4"><h3>Total</h3></td>
								<td  class="text-right"><h3><?php echo number_format($alltotal)?></h3></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-xs-6 box-trans">
				<h4>Shipping Address</h4>
				<div class="col-xs-12 col-md-12 col-sm-12">
					<h4>
						<?php echo $address->LabelAlamat ?>
					</h4>
					<b>
					Nama Penerima : &nbsp;<?php echo $address->cust_name ?><br />
					</b>
					Alamat Kirim : <br /><?php echo $address->cust_ad_address ?>,&nbsp;
					Kota : &nbsp;<?php echo $address->kecamatan ?>,&nbsp;
					Kode Pos : &nbsp;<?php echo $address->cust_postel_code ?>,&nbsp;
					Tlp : &nbsp;<?php echo $address->cust_phone ?><br />
				</div>
			</div>
		</div>
	</div>
<?php
	$this->load->view('template/footer_cnt');
?>