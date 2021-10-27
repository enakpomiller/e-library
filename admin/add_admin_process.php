
<?php

   // database connection
   include_once('Users.php');

     $user = new Users();

     if(isset($_POST['add_admin'])) {
         // username validation function
            $adminuser = $user->escape_string($_POST['adminuser']);
               $demo = $user->add_admin($adminuser);
                 if($demo){
                   echo " 
                     <script>
                       alert('THIS STAFF $adminuser HAS REGISTERED');
                     window.location = 'adminpanel.php';
                     </script>
                    ";


                 }

                  else { 
       $fname = $user->escape_string($_POST['fname']);
       $lname  = $user->escape_string($_POST['lname']);
       $admintype = $user->escape_string($_POST['admintype']);
       $adminuser = $user->escape_string($_POST['adminuser']);
       $pswd_one = $user->escape_string($_POST['pswd_one']);
       $pswd_two = $user->escape_string($_POST['pswd_two']);

            
        $query = " INSERT INTO add_admin(fname,lname,admintype,adminuser,pswd_one,pswd_two) VALUES('$fname','$lname','$admintype','$adminuser','$pswd_one','$pswd_two')";

             if($user->execute($query)){
                  
                // $msg = $_SESSION['msg_success']='REGISTRATION WAS SUCEESFULL';
                     print  " 
                     <script>
                       alert('SUCCESSFULLY REGISTERED');
                     window.location = 'adminpanel.php';
                     </script>
                    ";
               
             }
        
              else {
                      echo "<div class='alert alert-success'>";
                $_SESSION['message'] = ' Unable to Register ';
                     echo "</div>";
              }
             //window.location = 'register.php';
               }

     }

   
?>


<?php
 /*
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
			 //require "connection.php";
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

		*/
?>


<?php 




?>