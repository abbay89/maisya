<?php

function mailreminder($emailto, $title){ 

	//echo "masuk";exit;
	require_once('PHPMailer-master/PHPMailerAutoload.php');

	$conn=mysqli_connect("localhost","root","dn081177","propolis_new");
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

$mail->setFrom('rudyhartanto84@gmail.com', 'CS Propolis');
$mail->addReplyTo('rudyhartanto84@gmail.com', 'CS Propolis');

// Menambahkan penerima
$mail->addAddress($emailto);


// Subjek email
$mail->Subject = 'Reset Password';

// Mengatur format email ke HTML
$mail->isHTML(true);
$newpass = substr(md5(date("His")),0,5);


		$sql	= "update platinum_member set password = '".sha1($newpass)."',RealPassword = '".$newpass."' where username = '".$emailto."'";

		$qry	= mysqli_query($conn,$sql);
		$row	= mysqli_fetch_object($qry);




		$mailContent = "<div><h1>Password Reset</h1>
		 You can use this password for login to <a href='http://www.maisya.id/beta_propolis' targe='_BLANK'> Propolis Website </a>
		<h2>Your New Password : ".$newpass."</h2>
		 <p>
		  Regards,
		  </p>
		  <p>
		  cs@maisya.id</p>
		";
			
		$mailContent .='</div>';
		$mail->Body = $mailContent;
		//echo $mailContent;exit;
		// Kirim email
		if(!$mail->send()){
			echo 'Pesan tidak dapat dikirim.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			echo 'Pesan telah terkirim';
		}
		
		
/*
	if(updatetoserver($emailto,$newpass) == 200)
	{
	//exit;
// Konten/isi email
//header
		$sql	= "update platinum_member set password = '".sha1($newpass)."' where username = '".$emailto."'";

		$qry	= mysqli_query($conn,$sql);
		$row	= mysqli_fetch_object($qry);




		$mailContent = "<div><h1>Password Reset</h1>
		 You can use this password for login to <a href='http://www.maisya.id/beta_propolis' targe='_BLANK'> Propolis Website </a>
		<h2>Your New Password : ".$newpass."</h2>
		 <p>
		  Regards,
		  </p>
		  <p>
		  cs@maisya.id</p>
		";
			
		$mailContent .='</div>';
		$mail->Body = $mailContent;
		//echo $mailContent;exit;
		// Kirim email
		if(!$mail->send()){
			echo 'Pesan tidak dapat dikirim.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			//echo 'Pesan telah terkirim';
		}
	}*/
}
function updatetoserver($email,$newpass){
	
	$post_data="Email=".$email;
	$url="http://www.maisya.id:5060/api/RequestResetPassword";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$result = curl_exec($ch);
	$data_token = json_decode($result);
	$token = $data_token->data->TokenReset;
	
	
	$post_data_pass="TokenReset=".$token."&NewPassword=".$newpass;
	$url_pass="http://www.maisya.id:5060/api/ChangePassword";

	$ch_pass = curl_init();
	curl_setopt($ch_pass, CURLOPT_URL, $url_pass);
	curl_setopt($ch_pass, CURLOPT_POST, 1);
	curl_setopt($ch_pass, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
	curl_setopt($ch_pass, CURLOPT_POSTFIELDS, $post_data_pass);
	curl_setopt($ch_pass, CURLOPT_RETURNTRANSFER, true); 
	$result_password = curl_exec($ch_pass);
	$data_result	= json_decode($result_password);
	return $data_result->status;
	//return $status;
	exit;
}

?>