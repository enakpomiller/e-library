///////from registration function    ajax_process_functions.js 

/**password validation **/
 $("#msgpass").fadeOut();//hide msg box
 function passvalidate(){
	  $("#msgpass").fadeIn();
	if ($("#password").val() != $("#password2").val()) {
           $("#msgpass").html("<span class='msg_error fa fa-info-circle'> Passwords do not match</span><br/>");
		   //empty text and set focus
			$('#password').val('');
			$('#password2').val('');
			$('#password').focus();
		 }else{
		 $("#msgpass").fadeOut();
	   }
 }

    function FormReg(){
      if( $("#fname").val() == "" || $("#email").val() == "") $("#msg").html("<span class='msg_error fa fa-info-circle'>  Please fill out all required fields</span>");

 
     else
		 
	 $("#submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Submitting...');	 
	 
        $.post( $("#RegForm").attr("action"),
	    $("#RegForm :input").serializeArray(),
	function (data){
					
			if (data == "Success"){				
				   $("#msg").html("<span class='msg_success fa fa-cloud-upload'>&nbsp; Action Successful<br> </span>");
				   
				     //go to login page in 4 sec
						setTimeout(' window.location.href = "login.php"; ',5000);
								//change the submit button to submitted				
							$("#submit").html("<span class='fa fa-check-circle-o'> Submit</span>");					
						}
						//not taken 
						else{				
							$("#msg").html(data); 
							 };
						 $("#submit").html('Submit');

						 /*$("#RegForm")[0].reset();
						 $("#RegForm").trigger('reset');
						 documentElementbyId("RegForm").reset();
						 **/			
        });
   
    //ouside th else to return so as not to redirect 
$("loginForm").submit( function(){
 return false;      
});
    
     
}


/** login**/
///////from registration function     

    function login(){
		alert ("gggg");
       $("#submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Submitting...');
	
	//check if the input types are empty or not
	/**
     if( $("#username").val() == "") $("#RegError").html("<span class='msg1 fa fa-info-circle'> Please Enter Username </span>")
		 **/
	 
	 if( $("#username").val() == "" || $("#input").val() == "") $("#RegError").html("<span class='msg1 fa fa-info-circle'>  Please Fill Out All Fields in the Form</span>");

 
     else
        $.post( $("#LoginForm").attr("action"),
	    $("#LoginForm :input").serializeArray(),
	function (data){
					
			if (data == "Success"){
				
				   $("#msg").html("<span class='msg_success fa fa-info-circle'>&nbsp; Action Successful<br> </span>");
				   
				     //go to login page in 4 sec
						setTimeout(' window.location.href = "login.php"; ',5000);
								//change the submit button to submitted				
							$("#submit").html("<span class='fa fa-check-circle-o'> Submitted</span>");
							
						}
						//not taken 
						else{				
							$("#msg").html(data);
							 };
						 $("#submit").html('Submit');
	
			
        });
   
    //ouside th else to return so as not to redirect 
$("loginForm").submit( function(){
 return false;      
});
    
     
}
