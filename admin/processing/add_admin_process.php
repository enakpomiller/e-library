<?php
$adminid = "";

//password encryption
function sanitation($element){
	$element = trim($element);//remove spaces;
    //$element = (md5(md5(md5("encryption".$element."unical"))));
	return $element;
}
		
			//validate first name
			$fname = $_POST['fname']; $fname = trim($fname);
			$lname = $_POST['lname']; $lname = trim($lname);
			$admintype = $_POST['admintype'];
			$adminuser = $_POST['adminuser']; $adminuser = trim($adminuser);
			$password_one = sanitation($_POST['pswd_one']);//pass encryption
		
		try {
			require "connection.php";
			$sql = "SELECT * FROM `admin` WHERE `username`=:username";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username', $adminuser);
			$stmt->execute();
			//$stmt -> bindResult($email);
			if($stmt -> fetch()){
    	     echo "exist";
			//Echo "<div class='msg_error'>Username Already Exist</div>";
			}else{
			
		    $stmt = $conn->prepare("INSERT INTO admin(admin_id, username, password, category, first_name, last_name) VALUES (:id, :uname, :pwd, :cat, :fnam, :lnam)");
			$stmt->bindParam(':id', $adminid);
			$stmt->bindParam(':uname', $adminuser);
			$stmt->bindParam(':pwd', $password_one);
			$stmt->bindParam(':cat', $admintype);
			$stmt->bindParam(':fnam', $fname);
			$stmt->bindParam(':lnam', $lname);
			
			if($stmt->execute()){
				echo "<div class='info'>".$fname."'s data has been registered </div>";
			}
			else{
				echo "<div class='msg_error'>Failed to send. </div>";
			}
		}//validation else
			
	}
		
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
		
		$conn = null;
?>