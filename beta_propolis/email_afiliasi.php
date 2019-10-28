<?php

error_reporting(-1);
		ini_set('display_errors', 1);
		
function mailreminder($emailto, $link){
	require_once('PHPMailer-master/PHPMailerAutoload.php');
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
	$mail->Subject = 'Email Afiliasi';

	// Mengatur format email ke HTML
	$mail->isHTML(true);
	// Konten/isi email

	$mailContent = "
	<p>Selamat, Anda telah terdaftar menjadi Reseller kami,  dan mendapatkan harga spesial dari kami,  selain itu Anda juga memiliki kesempatan sukses mendapatkan income dengan mereferensikan kepada orang-orang terdekat Anda untuk menjadi Agen kami. </p>

	<p>Berikut link refferal dari Kami untuk Anda :</p>
	<a href=".$link.">".$link." </a> 
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
}
//mailreminder('rudyhartanto84@gmail.com', "Reset Password");

?>