<?php 
	require_once ('connection2.php');
 
	
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `users` WHERE `username`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {  
			
			 SESSION_START();	
	         $_SESSION['username']=$username;//assigning new session called 
			 $_SESSION['user_category']=$user_category;//assigning new session called 
			ECHO " <script>         window.location.assign('saved.php');</script>";
			  //header("location:save.php");
			}
//WRONG USER LOGIN 			
			else{
              echo "WRONG USERNAME OR PASSWORD";
			}
		}else{
			echo "Please Enter both Username and Password";
		}

?>


<?php
  /*  
}// close user login
          else{
              //error login
              $msg =" User name or Password Incorrect";
               echo "User name or Password Incorrect"."<script>
         window.location.assign('#login');</script>";
		 //header('location:#login');
          }
          
          
	  }//close else from users login
	  
	  */
?>