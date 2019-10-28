<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'dn081177';
$dbName     = 'maisya';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = $db->query("select * from destination_jne WHERE kecamatan LIKE '%".$searchTerm."%' ORDER BY kode ASC");

// Generate skills data array
$skillData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['kode'];
        $data['value'] = $row['kecamatan'];
        array_push($skillData, $data);
    }
}

// Return results as json encoded array
echo json_encode($skillData);
exit;

?>