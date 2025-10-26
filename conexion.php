<?php
	$host = 'localhost'; 
	$dbname = 'exchanges';
	$username = 'root'; 
	$password = ''; 
	//Implementado pdo por algo ahí sobre seguridad que leí
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}?>
