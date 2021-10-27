<?php
$del_pin = $_POST['del_pin'];

include('connection2.php');//database and server connection	

//DEl all from good
$sql="DELETE FROM reg_pin where pin = :pin";

    $stmt = $conn->prepare($sql);
	$stmt->bindParam(':pin', $del_pin);
	$stmt->execute();
  if($stmt->execute()){
		ECHO "<span class='cont_gen'>success</span>";
}
ELSE
{
	echo "<script language='javascript'>alert('Failed to delete');";
}
$conn = null;
/**
      include('../includes/connection.php');//database and server connection	

$query="DELETE FROM reg_pin where pin_id='$del_pin'";
$result=mysql_query($query) or die ("error in query".mysql_error());
if($result){
		ECHO "<span class='cont_gen'>success</span>";
   }
else
   {   
	echo "<script language='javascript'>alert('Failed to delete');</script>";
}**/
?>