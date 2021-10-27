<?PHP
SESSION_START();
if($_SESSION['username']!==""){
$_SESSION['username']="";
$_SESSION['admin_type'] ="";
$_SESSION['']="";
SESSION_DESTROY();

}
?>