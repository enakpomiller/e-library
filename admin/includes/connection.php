<?php
$host = "localhost";
$user = "root";
$db = "unical_lab";
$con = mysql_connect($host,$user) or die ("cann not connect to server");
mysql_select_db($db,$con) or die ("Database not found"); 
?>