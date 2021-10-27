<?PHP
SESSION_START();
if($_SESSION['username']!==""){
$_SESSION['username']="";
$_SESSION['']="";
SESSION_DESTROY();

}
?>