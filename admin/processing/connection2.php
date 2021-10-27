<?php
 //$conn = new PDO('mysql:host=localhost;dbname=unical_lab', 'root', '');
	
	$dbhost = "localhost";
    $dbname = "unical_lab";
    $dbuser = "root";
    $dbpass = "";
	$options = "";
	$dsn = "mysql:host=$dbhost;dbname=$dbname"; //data source name
	//connection link
	$conn = new PDO($dsn, $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>
