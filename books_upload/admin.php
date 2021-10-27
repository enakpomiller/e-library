<?PHP

SESSION_START();
if($_SESSION['username']=="" OR $_SESSION['log_as']!=="admin"){
echo "<script language='javascript'>alert('You must login as Admin to access this page');
window.location.assign('index.php');</script>";
//header('location:index.php');
}

?>

<?PHP
SESSION_START();
	$username=$_SESSION['username'];// assigning user name from session to user name the variable
   $as=$_SESSION['log_as'];
	?>

<?php
$id=$_GET['id'];

if(isset($id)){
	 if($id=="del"){
include('includes/connection.php');//database and server connection 
$query="DELETE FROM admin_login where username='$username'";
$result=mysql_query($query) or die ("error in query".mysql_error());
if($result){
	$msg="<center>Admin Record Has Been Deleted Successfully </center>.<p>";
	
include('logout.php');// logout this account

	echo "<script language='javascript'>alert('You Have Successfully Deleted this Account and will be longed out');
window.location.assign('index.php');</script>";
}
ELSE
{
$msg="Action not successful"."<br/>"."Staff record not found";
}
	 }
mysql_close($con);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-learning</title>
 <link rel="shortcut icon" href="logo.jpg" type="image/x-icon"/>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="others.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#menu{padding-left:70px;
        max-width:900px;}
#banner{min-width:1000px;}
-->
</style>
<style type="text/css">
<!--
.mama{float:left; border:3px solid white;}
.h:hover{color:#0C426F;}

#admin_welcome{font-family:magneto;
        width:800px;
		//border:1px solid red;
		padding-bottom:15px;
		padding-top:15px;
        font-size:40px;
		color:#0066ff;
		background:url(pix/nav1.jpg);
		background-size:cover;}
//#tab,a{text-decoration:none;
       font-family:arial;
	   color:#0066ff;
	   font-size:16px;
	   }
td{padding-bottom:10px;}
td:hover{border-radius:50px;
       background:#000000;
	   background-size:cover;
	   color:white;
	   box-shadow:0px 0px 2px 3px #000000;}
td,a:hover{color:white;}

#del{padding-bottom:10px;}
#del:hover{border-radius:50px;
	   background-size:cover;
	   color:white;
	   background:#ff0000;
	   //box-shadow:0px 0px 2px 3px #ff0000;}
#del,a:hover{color:white;}
-->
</style>
</head>
<body>
<div id="banner">
<div id="templatemo_header_panel">
	<div id="templatemo_header_section">
    	<div id="templatemo_title_section"><a href="index.php">E-learning</a></div>
		<div id="tagline">For Computer Science Students(Case Study FUTO)</div>
    </div>
</div> <!-- end of haeder -->

<div id="templatemo_menu_panel" align="center">

    <div id="menu">
<?php include('menu.php');?> 
    </div>
</div> <!-- end of menu -->
</div>
<!---- start of contents--->
<center>
<div id="contents">

<table border="0" width="70%" cellspacing="6px" height="300" align="center" id="tab">
<tr align="center" >
   <td width="33%">
   <div id="td">
   <a href="pin_gen.php">
        <img src="pix/Document-config-icon.png" width="120px" height="120px">
		<br>
          Generate Staffs pin
	</a>
	<div>
		  </td>
   
   <td width="33%" >
      <a href="admin_staff_view.php">
        <img src="pix/staff.jpg" width="120px" height="120px">
		<br>
     View Staffs
	 </a></td>

   <td width="33%">
            <a href="admin_student_view.php">
        <img src="pix/Graduate-male-128.png" width="120px" height="120px">
		<br>    
	 View students
	 </a></td>
</tr> 

<tr align="center">
   <td >
   <a href="admin_upload.php">
      <img src="icons/Print.png" width="120px" height="120px">
   <br>   
     Upload Books
	</a> 
   
   </td>
   
   <td>
   <a href="new_admin.php">
      <img src="pix/Student-id-128.png" width="120px" height="120px">
   <br>   
     Add new admin
	</a> 
	</td>

   <td id="del">
      <a href="admin_board.php?id=del"onClick="return confirm('Are you Sure You Wish To Delete Record?');">
      <img src="pix/Scissors-128.png" width="120px" height="120px">
   <br> 
   Delete my account
   </a></td>
</tr> 
<table>  

</div>
</center>
<!-- end of contents--->
<?php 
include('footer.php');
?>
</body>
</html>