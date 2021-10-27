

<center><div id="admin_msg"><!-- msg--></div></center>
	<form action="" method="POST" enctype="multipart/form-data" id="adminForm">
		 <?php include_once('add_admin_process.php') ;?>
		<input type="hidden" name="adminid" value="<?php echo $adminid;?>"/>
		<?php $fname ="";?>
		<input type="text" name="fname" placeholder="First Name" class="formfill" id="fname" required value="<?php  echo $fname; ?>"/>
		<input type="text" name="lname" placeholder="Last Name" class="formfill" id="lname" />		
		
		<select name="admintype" id="admintype" class="formfill" required  value="<?php  echo $admintype; ?>">
			<option value="">--Admin Type--</option>
			<option value="staff">Staff Admin</option>
			<option value="super">Super Admin</option>
		</select>
		 	<?php $adminuser ="";?>
		<input type="text" id="adminuser" name="adminuser" placeholder="Username" class="formfill" value="<?php  echo $adminuser; ?>" required />
		<center><span id="msgpass"></span></center>
		<input type="password" name="pswd_one" placeholder="Enter Password" class="formfill"  id="password" required />
		 <?php $password_two ="";?>
		<input type="password" name="pswd_two" placeholder="Confirm Password" class="formfill"value="<?php  echo $password_two; ?>" id="password2" required onblur="passvalidate();" />
			
		<center>
			<button name="add_admin" class="ssend" style="letter-spacing:3px; width:30%;" onClick="add_admin();">Add</button>
		</center>

	</form>
	
	<script type="text/JavaScript">
	/**password validation **/
	$("#msgpass").fadeOut();//hide msg box
	
	function passvalidate(){
		$("#msgpass").fadeIn();
		if ($("#password").val() != $("#password2").val()) {
			$("#msgpass").html("<span class='msg_error'> Passwords do not match</span><br/>");
			//empty text and set focus
			$('#password').val('');
			$('#password2').val('');
			$('#password').focus();
		}
		else{
			$("#msgpass").fadeOut();
		}
	}
</script>


<script type="text/JavaScript">
    
    function add_admin(){
     if($("#fname").val() == "" ||  $("#adminuser").val() == "" ||  $("#admintype").val() == "")  $("div#admin_msg").html("<center><span class='msg_error'>Please Fill in all inputs</span></center>");
     else
        $.post( $("#adminForm").attr("action"),
        $("#adminForm :input").serializeArray(),
        function (data){
			if (data == 'exist'){
				$("div#admin_msg").html("<div class='msg_error'>Username Already Exist</div>");
				}else{
           	$("div#admin_msg").html(data);
		   			//clear text
			$('input[type=text]').val('');  
			$('input[type=select]').val('');
			$('input[type=password]').val('');
		  }
        });
$("adminForm").submit( function(){
			return false;        
			});		
}
</script>


</div>

