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
<link rel="stylesheet" href="main.css" >
</head>
<body>
<!-- banner -->
<div class="banner inner-banner-w3-agileits" id="home">
	<div class="banner-overlay-agileinfo">
	
<?php 
include('../topbanner.php');
?>

	
				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php 
include('../nav.php');
?>
 
			</nav>	
				<h2 class="inner-tittle-w3layouts">Admin</h2>
		
	</div>
</div>
<!-- //banner -->
<!--about-inner-->
<!--about-top-->

<link href="aboutCss.css" rel="stylesheet" type="text/css" media="all" />
	
<div id="content" style="margin:auto" align="">

<div class="inner-part">

<div class="inner-left">

 <div class="col-md-6  services-right">
		<div class="services-info" id="login">
			<h3 class="tittle-agileits-w3layouts white-w3ls">Admin Login</h3>
			
			 <script type="text/javascript">
    
    function login(){
       
    //check if the input t ypes are empty or not
     if( $("#username").val() == "" || $("#password").val() == "" )  $("div#msg").html("<span class='error'>Please fill All Field</span>");
     else
 /** 1st fetch the url to be passed from the form and its action attribute**/
        $.post( $("#loginForm").attr("action"),
/** 2nd parramiters for the data to be passed **/
        $("#loginForm :input").serializeArray(),
/**3rd paramiter the call back function to take massages Field **/
        function (data){
            $("div#msg").html(data);
        });
   
    //ouside th else to return so as not to redirect 
$("loginForm").submit( function(){
 return false;      
});
    
     
}
</script>
			
			
    <div align="center"  id="msg"> <!-- error msg--> </div>
		<p class="para-w3-agile white-w3ls">
           <DIV action="processing/login.php" method="POST" name="loginForm" id="loginForm">     
               <input type="text" name="username" placeholder="Username" max-lenght="20" class="txt" id="username" required/> 
               <input type="password" name="password" placeholder="password" max-lenght="20" id="password"  class="txt" required/>
            </p>
			
			<button  class="submit" name="login" id="submit" onclick="login();"> Login</button>
			</DIV>
		</div>
	</div>
   <br>
   <center>
   <span class="checks">
   Security Checks in process...
   </span>
   </center>
   <br>
   <span class="img-fix">
   <center>
   <img src="gif/2.gif" class="img-resposive img">
   </center>
   </span>
   
	<div class="clearfix"></div>




</div>

<style>
<!--
.img-fix{
	margin:auto;
}
.checks{
	padding:20px 0px 20px 20px;
	color:#f5b120;
}
.img{
	//width:300px;
}
.submit{
	width:100%;
	background:#f5b120;
	border:0px;
	border-radius:3px;
	padding:8px 0px 8px 0px;
	color:#fff;
}
.submit:hover{
	background:#f5b150;
}
-->
</style>


</div></div>






	
	
	
	
	
	
	
	
	
	
	
<!-- Register -->

<div class="register-wthree">
	<div class="container">
	<div class="col-md-6 regstr-l-w3-agileits">
	<h3 class="tittle-agileits-w3layouts white-w3ls">Become a Member <span>for free</span></h3>
	<h4>Register Now</h4>
	<!--timer-->
     		<section class="examples">
					<div class="simply-countdown-losange" id="simply-countdown-losange"></div>
					<div class="clear"></div>
				</section>
				<div class="clearfix"></div>
				</div>
	</div>
	</div>
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