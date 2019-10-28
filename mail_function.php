<?php
function mailreminder($emailto, $idr, $title){ 
	require_once('PHPMailer-master/PHPMailerAutoload.php');

	$conn=mysqli_connect("localhost","root","dn081177","maisya");
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'rudyhartanto84@gmail.com';
$mail->Password = 's4y0n4r4';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('rudyhartanto84@gmail.com', 'CS Maisya');
$mail->addReplyTo('rudyhartanto84@gmail.com', 'CS Maisya');

// Menambahkan penerima
$mail->addAddress($emailto);


// Subjek email
$mail->Subject = 'Order Confirmation';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
//header
$sql	= "select * from `order` where order_code = '".$idr."'";
$qry	= mysqli_query($conn,$sql);
$row	= mysqli_fetch_object($qry);
//detail
$sql2	= "select * from `order` join order_detail on order.order_id = order_detail.order_id where order_code = '".$idr."'";

$qry2	= mysqli_query($conn,$sql2);
$mailContent = "<table  width='90%'>
	<tr>
		<td>
			<table width='90%'>
				<tr>
					<td>
						<img src='http://cl.maisya.co.id:8080/maisya//assets/img/logo.png' height='50px' />
					</td>
				
					<td align='right'>
						<h3>Order Number #".$idr."</h3>
					</td>
				</tr>
			</table>
			
		<td>
	</tr>
	<tr>
		<td>
			<b>Shipped To: 
			<br />".$row->order_name."
			<br />".$row->order_notes."
			<br />".$row->order_phone."
			<br />".$row->order_email."</b><br /><br />
		<td>
	</tr>
	<tr>
		<td>
			Order Date:
			<br />".date('d-M-Y',strtotime($row->order_date))."<br /><br />
		<td>
	</tr>
	<tr>
		<td>
			<hr />
			<table  width='100%' border='1' cellspacing='0' cellpadding='0'>
				<tr>
					<td>
						Item
					</td>
					<td align='right'>
						Price
					</td>
					<td align='right'>
						Qty
					</td>
					<td align='right'>
						Total
					</td>
				</tr>";
	while($row2=mysqli_fetch_array($qry2)){
		$mailContent .= "<tr>
			<td>
				".$row2['menu_id']."
			</td>
			<td align='right'>
				".number_format($row2['ord_det_price'])."
			</td>
			<td align='right'>
				".number_format($row2['ord_det_qty'])."
			</td>
			<td align='right'>
				".number_format($row2['ord_det_price'] * $row2['ord_det_qty'])."
			</td>
			
		</tr>";
		$alltotal = $alltotal + ($row2['ord_det_price'] * $row2['ord_det_qty']);
	}
		$mailContent .='<tr>
			<td colspan="3"><h3>Total</h3></td>
			<td  class="text-right" align="right"><h3>'.number_format($alltotal).'</h3></td>
		</tr>';
$mailContent .= "</table><td>
	</tr>
</table>";
$mailContent .='
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><strong>Bank Transfer</strong></h3>
	</div>
	<div class="panel-body">';

		$sql3	= "select * from master_bank order by bank_name asc";
		//echo $sql; exit;
		$qry3	= mysqli_query($conn,$sql3);
		while($row3=mysqli_fetch_array($qry3)){
			
			$mailContent .='<div class="bank col-xs-6 col-md-6 col-sm-6">
				<p>
					<img height="40px" src="http://cl.maisya.co.id:8080/maisya/assets/uploads/img_menu/'.$row3['bank_pic'].'" /> 
				</p>
				<p>'.$row3['bank_name'].'</p>
				<p>'.$row3['bank_rek'].'<p>
				<p>'.$row3['bank_rek_name'].'<p>
			</div>';
	
			}
	
	$mailContent .='</div>
</div>';
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
   // echo 'Pesan telah terkirim';
}
}

?>