<?php 
function sanitation($element){
	$element = trim($element);//remove spaces;
   //$element = (md5(md5(md5("encryption".$element."unical"))));
	return $element;
}
	require_once ('connection2.php');
 
	try{
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			$password = sanitation($_POST['password']);
			$sql = "SELECT * FROM `admin` WHERE `username`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {  
			 SESSION_START();	
	         $_SESSION['username']=$username;//assigning new session called 
			 $_SESSION['user_category']=$user_category;//assigning new session called 
			  $_SESSION['admin']="admin";//admin 
			ECHO " <script>         window.location.assign('adminpanel.php');</script>";
			  //header("location:save.php");
			}
//WRONG USER LOGIN 			
			else{
              echo "<span class='error'>Incorrect username or password</span>";
			}
		}else{
			echo "<span class='error'>Please Enter both Username and Password</span>";
		}
	}catch(PDOException $e){
			echo "Error: Registration Fail";//$e->getMessage();
		}

?>
