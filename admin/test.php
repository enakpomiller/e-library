<?php
	//start session
	session_start();
 
	//crud with database connection
	include_once('Users.php');
 
	$user = new Users();
 
	//fetch data
	$sql = "SELECT * FROM reg_pin";
	$result = $user->read($sql);
	 
?>

 <?php
						foreach ($result as $key => $row) {
                          echo $row['pin'];
         
						}
						 ?>