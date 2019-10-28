
<form  method="POST" action="<?php echo base_url() ?>admin/promobank/pushpromo">	
 <div class="clearfix">
	<div class="grid-2-global left">
		<table width="100%" id="regform">
			 <tr>
				<td width="30%">Button Text</td>
				<td width="70%">
					<input type="text" required="required" name="btntext" value="<?php echo $bnttext; ?>"/>
				</td>
			</tr>
			 <tr>
				<td width="30%">Merchant Id</td>
				<td width="70%">
					<input type="text" required="required" name="merchant"  value="<?php echo $merchant; ?>"/>
				</td>
			</tr>
			<tr>
				<td width="30%">Plu Free</td>
				<td width="70%">
					<input type="text" required="required" name="plufree"  value="<?php echo $plufree; ?>"/>
				</td>
			</tr>
			<tr>
				<td width="30%">Plu Name</td>
				<td width="70%">
					<input type="text" required="required" name="pluname" value="<?php echo $pluname; ?>" />
				</td>
			</tr>
			<tr>
				<td width="30%">Plu QTY</td>
				<td width="70%">
					<input type="text" required="required" name="pluqty" value="<?php echo $pluqty; ?>" />
				</td>
			</tr>
			<tr>
				<td width="30%">Plu Amount</td>
				<td width="70%">
					<input type="text" required="required" name="pluamount" value="<?php echo $pluamount; ?>" />
				</td>
			</tr>
			<tr>
				<td width="30%">Minimal Pembelian</td>
				<td width="70%">
					<input type="text" required="required" name="minimai_price" value="<?php echo $minimai_price; ?>" />
				</td>
			</tr>
			<tr>
				<td width="30%">From Date</td>
				<td width="70%">
					<input type="text" required="required" name="fromdate" value="<?php echo $fromdate; ?>" />
				</td>
			</tr>
			<tr>
				<td width="30%">To Date</td>
				<td width="70%">
					<input type="text" required="required" name="todate" value="<?php echo $todate; ?>" />
				</td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td width="70%">
					<input type="submit" value="Update" class="btn-gabung" />
				</td>
			</tr>
		</table>
	</div>
</div>
</form>