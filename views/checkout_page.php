<?php
	$this->load->view('template/header');
	$this->load->view('template/navigation');
?>
<div class="container slider ">
<br />
<br />
    <div class="row invoice">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h3>Shipping Address</h3>
    		</div>
		</div>
		<div class="col-xs-6">
			<form action="<?php echo base_url()?>checkout/prosescheckout" method="post">
			  <div class="form-group">
				<label for="fname"><i class="fa fa-user"></i> Full Name</label>
				<input type="text" id="fname"  class="form-control" name="order_name" placeholder="FullName">
			  </div>
			  <div class="form-group">
				<label for="email"><i class="fa fa-phone"></i> Phone</label>
				<input type="text"  class="form-control" id="email" name="order_phone" placeholder="Phone">
			  </div>
			  <div class="form-group">
				<label for="email"><i class="fa fa-envelope"></i> Email</label>
				<input type="text"  class="form-control" id="email" name="order_email" placeholder="Email">
			  </div>
			  <div class="form-group">
				 <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
				<textarea name="order_notes"  class="form-control" rows="5" cols="50" placeholder="Shipping Address"></textarea>
			  </div>
			  
			  <input type="submit" value="Continue to checkout" class="btn btn-buynow btn-lg btn-block">
			</form>
		</div>
		<div class="col-xs-6 cart">
			<label for="fname">Cart</label>
			<table class="table table-striped">
				<thead>
				  <tr>
					<th>Product Name</th>
					<th>Qty</th>
					<th>Amount</th>
					<th>Total</th>
					<th></th>
				  </tr>
				</thead>
				<tbody>
					<?php
						foreach($chart as $lstChart)
						{
					?>
							<tr class="trbody">
								<td>
								<input type="hidden" name="id[]" value="<?php echo $lstChart['id']?>" />
								<?php echo $lstChart['name']; ?></td>
								<td>
									<i class="fas fa-minus-circle"></i>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<?php echo $lstChart['qty']; ?>
										&nbsp;&nbsp;&nbsp;&nbsp;
									<i class="fas fa-plus-circle"></i>
								</td>
								<td>
									<input type="hidden" name="price[]" value="<?php echo $lstChart['price']?>" />
									<?php echo number_format($lstChart['price']); ?>
								</td>
								<td>
									<input type="hidden" name="qty[]" value="<?php echo $lstChart['qty']?>" />
									<?php echo number_format($lstChart['qty'] * $lstChart['price']); ?>
								</td>
								<td>
									<i class="fas fa-trash-alt"></i>
								</td>
							</tr>
					<?php
							$subtotal = $subtotal + ($lstChart['qty'] * $lstChart['price']);
						}
					?>
					<tr>
						<th colspan="3">Sub Total</th>
						<th colspan="2"><?php echo  number_format($subtotal) ?></th>
					</tr>
				</tbody>
			  </table>
				<div class="col-xs-12">
					<label for="fname">Bank Transfer</label>
				</div>
				<?php
					foreach($allBank as $lstBank)
					{
				?>
					<div class="bank col-xs-4 col-md-4 col-sm-4 lst-bank">
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

<?php
	$this->load->view('template/footer');
?>