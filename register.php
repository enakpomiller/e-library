<!DOCTYPE html>
<html lang="zxx">
<head>
<title>UNICAL E-library</title>
<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->
<!-- Custom-Stylesheet-Links -->
<!-- Bootstrap-CSS --> <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Font-awesome-CSS --> <link href="css/font-awesome.css" rel="stylesheet"> 
<!-- Index-Page-CSS --><link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom-Stylesheet-Links -->
<!--web-fonts-->
<!-- Headings-font --><link href="//fonts.googleapis.com/css?family=Hind+Vadodara:300,400,500,600,700" rel="stylesheet">
<!-- Body-font --><link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!--//web-fonts-->
<!--//fonts-->
<!-- js -->
<link href="main.css" rel="stylesheet">
</head>
<body>
<!-- banner -->
<div class="banner inner-banner-w3-agileits" id="home">
	<div class="banner-overlay-agileinfo">
	
<?php 
include('topbanner.php');
?>

	
				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php 
include('nav.php');
?>
 
			</nav>	
				<h2 class="inner-tittle-w3layouts">Register</h2>
		
	</div>
</div>
<!-- //banner -->
<!--about-inner-->
<!--about-top-->

<link href="aboutCss.css" rel="stylesheet" type="text/css" media="all" />
	
<div id="content" style="margin:auto; background:url('pix/library.jpg'); background-size:cover;background-attachment:fixed;" align="">

<h1 id="h1" style="align:center;"><center>Register new Account</center></h1>
<br>

			 <script type="text/javascript">
    
    function reg(){
    //check if the input t ypes are empty or not
     if( $("#username").val() == "" || $("#password").val() == "" || $("#category").val() == "" )  $("div#msg").html("Please Fill in all inputs");
     else
 /** 1st fetch the url to be passed from the form and its action attribute**/
        $.post( $("#regForm").attr("action"),
/** 2nd parramiters for the data to be passed **/
        $("#regForm :input").serializeArray(),
/**3rd paramiter the call back function to take massages**/
        function (data){
           
			if (data = 'success'){
				setTimeout('window.location.href = "saved.php"; ',5000);
			} $("div#msg").html("Registered successfully, redirecting to your shelf  ");
        });
   
    //ouside th else to return so as not to redirect 
$("regForm").submit( function(){
 return false;      
});
    
     
}
</script>






<div class="" id="reg" >
	<div class="form-bg-w3ls" style="float:none;">
	
		<h3>Fill the Registration form</h3>
		<p class="para-w3-agile white-w3ls">Register to get full access to our books</p>
        
        <div class="msg" id="msg" align="center">
       <!-- Data/Book was Sucessfully Uploaded-->
          <?php
          echo $msgreg;
          ?>
        </div>
		
       
		<DIV action="processing/user_reg_process.php" method="POST" name="regForm" id="regForm">
		
				
			<input type="text"  name="Surname" placeholder="Surname" required="" />
			
			<input type="text"  name="fname" placeholder="Other Names" required="" />
			
			<select class="form-control" name="category" id="category">
				<option>Register as?</option>
				<option value="Student">Student</option>
				<option value="Lecturer">Lecturer</option>
				<option value="Researcher">Researcher</option>
								
			</select>
						
			<input type="text"  name="username" placeholder="Username" required=""  onclick="finder();" id="username"/>
			
					<span id="msgpass" style="color:#cc0000;"> </span>
			<input type="password" class="txt" id="password" name="password" placeholder="Password" required="" style="margin-top:10px;"/>
			
			<input type="password" class="txt" name="password2" id="password2" placeholder="Re-Enter Password" required="" style="margin-top:1px;" onBlur="passvalidate()"/>
					
			<button  onclick="reg();" class="button-w3layouts hvr-rectangle-out"  style="width:100%;border:1px SOLID #A0A0A0; border-radius:3px;padding:6px 0px 6px 0px;" name="login" id="submit"   id="reg" > SUBMIT </button>
		</DIV>	
	</div>
</div>


</div>
	<script type="text/JavaScript">
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
</script>
	
	
	
	
	
	
	
	
	

<!-- //Register -->
<!--//about-inner-->
<!--footer-->
<?php
include('footer.php');
?>
<!-- //copy-right -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- Dropdown-Menu-JavaScript -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(            
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');        
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');       
						}
					);
				});
			</script>
		<!-- //Dropdown-Menu-JavaScript -->
	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- Countdown-Timer-JavaScript -->
			<script src="js/simplyCountdown.js"></script>
			<script>
				var d = new Date(new Date().getTime() + 948 * 120 * 120 * 2000);

				// default example
				simplyCountdown('.simply-countdown-one', {
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate()
				});

				// inline example
				simplyCountdown('.simply-countdown-inline', {
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate(),
					inline: true
				});

				//jQuery example
				$('#simply-countdown-losange').simplyCountdown({
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate(),
					enableUtc: false
				});
			</script>
		<!-- //Countdown-Timer-JavaScript -->
<!-- Starts-Number-Scroller-Animation-JavaScript -->		
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //Starts-Number-Scroller-Animation-JavaScript -->


<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->

 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>