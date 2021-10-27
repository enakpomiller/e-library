<?php
 /*
$host = "localhost";
$user = "root";
$db = "unical_lab";
**/
	$conn = new PDO('mysql:host=localhost;dbname=unical_lab', 'root', '');
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>
