<?php
$connection=@mysql_connect('localhost','root','Hokben#2015') or die(mysql_error()); 
mysql_select_db('hokbenco_web', $connection) or die(mysql_error());

function sendFCM($notif_id, $url_detail, $title, $content,$id) {	
	$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array (
				'registration_ids' => $id,
				'priority' => 'high',
				'data' => array (
						"notif_code" => "new_notification",
						"notification_id" => $notif_id,
						"url_detail" => $url_detail,
						"notification_title" => $title,
						"notification_subtitle" => $content
				),
				'notification' => array (
						"title" => $title,
						"body" => $content,
						"sound" => "default"
				)
		);
		$fields = json_encode ( $fields );
		$headers = array (
				'Authorization: key=AAAACkQwvp0:APA91bEZuE-KfYwWCZ4oeHywpYamssY7FTzBvex8G_EMurw9oahlPwgJVlqMH6J9Oexa6jITG_dZ9sBhMUY6AIa-kAt-FrsMmPOGHvQLbG4Q5jvixsToYShFaHiIYoT6ZWqRt4f_RMvz',
				'Content-Type: application/json'
		);
		
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, $url);
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, true );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, $fields );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result;
		//print_r($fields);
		
}
$query			=  mysql_query("SELECT * FROM notif_apps_new WHERE notification_id = '5'");
$result			=  mysql_fetch_object($query);
		
$url_detail = 'http://www.hokben.co.id/notif_detail/detail/5/400';
$idfcm = 'e705ZaUGhPM:APA91bGwckmFokGzAchCX8J8zcB5iND1DS1mSCzTeMglDHn4DtF9x3aGvI3lYyP4seHQ8QwGwRVg2Oreeeb04t9BmNAtnkZGDMStH7h8VLzcM4Yf08mbt9MA75FwNqb8OldUvZ-HXu0Q';

sendFCM($result->notification_id, $url_detail, $result->notification_title, $result->notification_text, array($idfcm));
