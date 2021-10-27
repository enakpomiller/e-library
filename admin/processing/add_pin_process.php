

<?php
$pin = $_POST['pin'];
$date_sent = date("D dS M Y, h:m:s a");

require "connection2.php";//bd connection
try {	
	$stmt = $conn->prepare("INSERT INTO reg_pin(pin, date_sent)
    VALUES (:pin, :date_sent)");
    $stmt->bindParam(':pin', $pin);
    $stmt->bindParam(':date_sent', $date_sent);
    $stmt->execute();
	 
	 echo"success";
	
 }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

?>