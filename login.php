<?php
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["password"]);

      include('includes/connection.php');
	  //check if its admin that is logging in
	  if($username=="admin" or $username=="Admin" && $password =="1234"){
		 //echo "admin has logged in";
		 SESSION_START();	
	     $_SESSION['username']=$username;//assigning new session called admin	
	      
	   echo "<script language='JavaScript'>
         window.location.assign('admin.php');</script>";	
		              
	  }
	  else{/////users login from database
	
         $sql="SELECT * FROM users WHERE username='".$username."' && password='".$password."'";
       $result=mysql_query($sql) or die ("error in sql".mysql_error());

//if(!$result){$error="Error in query";}
			
if(mysql_num_rows($result)>0){
	
	
while ($row = mysql_fetch_object($result))
  {
	  $username = $row -> username; 
        $fullname = $row -> fullname; 
	  
      SESSION_START();	
	 $_SESSION['username']=$username;//assigning new session called admin	
      $_SESSION['fullname']=$fullname;
      
      echo "<script language='JavaScript'>
         window.location.assign('library.php');</script>";
		 
	 }  
          
          
}// close user login
          else{
              //error login
              $msg =" User name or Password Incorrect";
               echo "User name or Password Incorrect"."<script>
         window.location.assign('#login');</script>";
		 //header('location:#login');
          }
          
          
	  }//close else from users login
?>