
<?php
	require_once ('connection2.php');
 
		 
		    $surname = $_POST['surname'];
			$onames = $_POST['onames'];
			$username = $_POST['username'];
			$fullname = $surname." ".$onames;// join names
			$password = $_POST['password'];
			$category = $_POST['category'];
		try{
//validation
$sql = "SELECT * FROM `users` WHERE `username`=?";
			$query = $conn->prepare($sql);
			$query->execute(array($username));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				Echo "Username Already Exist on our Database";
			}else{				
					 
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `users` (`fullname`,`username`,`password`, `category`) VALUES ('$fullname','$username', '$password','$category')";
			$conn->exec($sql);
			}
			
		}catch(PDOException $e){
			echo "Error: Registration Fail";//$e->getMessage();
		}
		//success
		echo "success";
		SESSION_START();	
	         $_SESSION['username']=$username;//assigning new session called 
			 $_SESSION['user_category']=$user_category;//assigning new session called 
			 
			 
			 
	$conn = null;
?>