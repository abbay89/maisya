<?php 
$data = 'username=MAISYAMAKMUR&api_key=2cf742b9fb2cf3da62abd7e8e369c357&OLSHOP_BRANCH=CGK000&OLSHOP_CUST=10726400&OLSHOP_ORDERID=20181202141951&OLSHOP_SHIPPER_NAME=Maisya Jewellery Online Shop&OLSHOP_SHIPPER_ADDR1=Jl. Pahlawan Revolusi No. 2&OLSHOP_SHIPPER_ADDR2=Pondok Bambu&OLSHOP_SHIPPER_CITY=Jakarta Timur&OLSHOP_SHIPPER_ZIP=13430&OLSHOP_SHIPPER_PHONE=08119994814&OLSHOP_RECEIVER_NAME=Rudy Hartanto&OLSHOP_RECEIVER_ADDR1=Jln Masjid RT 006/07 No. 61 Kelurahan Susukan Kecamatan Ciracas&OLSHOP_RECEIVER_ADDR2=&OLSHOP_RECEIVER_CITY=111&OLSHOP_RECEIVER_ZIP=111&OLSHOP_RECEIVER_PHONE=085694522356&OLSHOP_QTY=1&OLSHOP_WEIGHT=0&OLSHOP_GOODSDESC=Maisya Jewellery Online Shop&OLSHOP_GOODSVALUE=65610000.00&OLSHOP_GOODSTYPE=2&OLSHOP_INS_FLAG=Y&OLSHOP_ORIG=CGK10000&OLSHOP_DEST=CGK10500&OLSHOP_SERVICE=REG&OLSHOP_COD_AMOUNT=65610000.00';

$url = 'http://apiv2.jne.co.id:10101/tracing/api/generatecnote';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $data); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

$result=curl_exec ($ch);

print_r($result);

?>