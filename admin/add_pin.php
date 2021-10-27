

<script type="text/javascript">
var auto_refresh = setInterval(
function (user_name)
{
$('#pinGen').load('pinGen.php').fadeIn("slow");
}, 500); // refresh every 5000 milliseconds

var auto_refresh = setInterval(
function (pinShow)
{
$('#pinShow').load('pinShow.php').fadeIn("slow");
}, 600); // refresh every 5000 milliseconds

    
    function add(){
    //check if the input types are empty or not
     if( $("#pin").val() == "") $("div#pin_msg").html("Please Fill a pin");
     else
 /** 1st fetch the url to be passed from the form and its action attribute**/
        $.post( $("#pinForm").attr("action"),
/** 2nd parramiters for the data to be passed **/
        $("#pinForm :input").serializeArray(),
/**3rd paramiter the call back function to take massages**/
        function (data){
           
			if (data = 'success'){
				//setTimeout('window.location.href = "saved.php"; ',5000);
			 $("div#pin_msg").html("<span class='msg_success'>Added successfully</span>");
			 }
        });
   
    //ouside th else to return so as not to redirect 
$("pinForm").submit( function(){
 return false;      
});   
     
}

 
    function del(){
    //check if the input t ypes are empty or not
     if( $("#del_pin").val() == "") $("div#msg").html("Please Fill a pin");
     else
 /** 1st fetch the url to be passed from the form and its action attribute**/
        $.post( $("#pinForm").attr("action"),
/** 2nd parramiters for the data to be passed **/
        $("#pinForm :input").serializeArray(),
/**3rd paramiter the call back function to take massages**/
        function (data){
           
			if (data = 'success'){
				//setTimeout('window.location.href = "saved.php"; ',5000);
			 $("div#pin_msg").html("<span class='msg_success'>Deleted successfully</span>");
			 }
        });
   
    //ouside th else to return so as not to redirect 
$("pinForm").submit( function(){
 return false;      
});
    
     
}
</script>


<div class="all_pin">
<center>
<span>
Add New Registration Pin 
</span>
</center>
<br>
 <form action="add_models.php" method="POST" id="pinForm" > 
<center>
<div id="pin_msg"></div>

 <span id='pinGen' ></span>
  <center>
  <div class="maindiv">
	<button name="submit" class="submit" onClick="add();"> Add Pin Now</button>
 </div></DIV>
 </center>
 <span id='pinShow' ></span>

</div>
</center>
</form>