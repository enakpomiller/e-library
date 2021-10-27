
<?php
	require_once ('connection2.php');
 
	if(ISSET($_POST['reg'])){
		try{ 
		    $fullname = $_POST['fullname'];
			$username = $_POST['username'];
				$password = $_POST['password'];
			   $category = $_POST['category'];
					 
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `users` (`fullname`,`username`,`password`, `category`) VALUES ('$fullname','$username', '$password','$category')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
		  echo "
		   <script> alert(' REGISTRATION IS SUCCESSFUL ');
		     window.location='library.php';
			  </script>
		  ";
		//header('location:index.php');
	}
?>