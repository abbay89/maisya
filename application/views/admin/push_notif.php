
<form  method="POST" action="<?php echo base_url() ?>admin/mobile/freePushNotif">	
 <div class="clearfix">
	<div class="grid-2-global left">
		<table width="100%" id="regform">
			 <tr>
				<td width="30%">Title</td>
				<td width="70%">
					<input type="text" required="required" name="title"/>
				</td>
			</tr>
			 <tr>
				<td width="30%">Message</td>
				<td width="70%">
					<input type="text" required="required" name="message"/>
				</td>
			</tr>
			<tr>
				<td width="30%">Phone number</td>
				<td width="70%">
					<input type="text" required="required" value="" name="phone" />
				</td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td width="70%">
					<input type="submit" value="Send" class="btn-gabung" />
				</td>
			</tr>
		</table>
	</div>
</div>
</form>