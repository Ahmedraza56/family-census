<?php
$dbHost = 'localhost'; 
$dbUsername = 'fahad'; 
$dbPassword = "c8R$!f@QW#2K"; 
$dbName = 'khandaandb'; 

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
