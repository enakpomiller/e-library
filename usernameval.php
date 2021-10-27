<html><body>
<script type="text/javascript" src="js/jquery.min.js">  </script>
<script type="text/javascript">
var userval ="chris";
//var userval = document.regform.username.value;
    var auto_refresh = setInterval(
function ()
{
    document.write("");
document.getElementById('a2').innerHTML = "<?php echo rand(1,1000); ?>";
}, 500); // refresh every 5000 milliseconds

</script>

<span id="a2">show here</span>
    <form name="f1">
        
<input type="text" id="tx" name="tx">
    </form>


<?php
/**
include('includes/connection.php');//database and server connection
//$username = "<script> document.write(userval); </script>";


$sql="SELECT * FROM users WHERE username='".$username."'";
$result=mysql_query($sql) or die ("error in sql");
				
	if (mysql_num_rows($result)>0) 
    //if($result==1)
    {
         $msgreg="User name Already Taken";
        echo"<script>     			document.getElementById('errormsg').innerHTML = 'User name Already Taken';
                </script>";
    }
    else{////username is free
         
        $msgreg="Accepted php";
          echo"<script>     			document.getElementById('errormsg').innerHTML = 'Accepted';
                </script>";

        }


echo $msgreg;
**/
?>
<br>
    </body></html>