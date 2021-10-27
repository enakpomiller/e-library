<?php
	error_reporting(0);
	ini_set('display_errors', 0);
?>

<?php

$username =  ($_POST["username"]);
$password =  ($_POST["password"]);
$login =  ($_POST["login"]);


$fullname =  ($_POST["fullname"]);
$username =  ($_POST["username"]);
$level =  ($_POST["level"]);
$reg =  ($_POST["reg"]);


  if(isset($_POST["login"])){
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
               echo "<script language='JavaScript'>
               alert('User name or Password Incorrect');
         window.location.assign('#login');</script>";
		 //header('location:#login');
          }
          
          
	  }//close else from users login
  }//if isset login

if(isset($_POST["reg"])){
include('includes/connection.php');//database and server connection
    
    $sql="SELECT * FROM users WHERE username='".$username."'";
$result=mysql_query($sql) or die ("error in sql");
				
	if (mysql_num_rows($result)>0) 
    {
         echo "<script type='text/javascript'>
         alert('User name Already Taken');
          window.location.assign('#reg');
         </script>";
        $msgreg="User name Already Taken";
    }
    else{////username is free
        
        
$query="insert into users values('', '$fullname', '$username', '$password', '$level')";
$result=mysql_query($query) or die('error in query'.mysql_error());
 if(!$result){
     echo "<script type='text/javascript'>
         alert('failed to register');
          window.location.assign('#reg');
         </script>";
        $msgreg="failed to register";
 }
   else{
       
       echo "<script type='text/javascript'>
         alert('Registration Successful');
          window.location=('#reg');
         </script>";
        $msgreg="Registration Successful";
        
    }

}
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>UNICAL E-library</title>
<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scholar Vision Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->
<!-- Custom-Stylesheet-Links -->
<!-- Bootstrap-CSS --> <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Font-awesome-CSS --> <link href="css/font-awesome.css" rel="stylesheet"> 
<!-- Flex-slider-CSS --><link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<!-- Owl-carousel-CSS --><link href="css/owl.carousel.css" rel="stylesheet">
<!-- Index-Page-CSS --><link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom-Stylesheet-Links -->
<!--web-fonts-->
<!-- Headings-font --><link href="//fonts.googleapis.com/css?family=Hind+Vadodara:300,400,500,600,700" rel="stylesheet">
<!-- Body-font --><link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!--//web-fonts-->
<!--//fonts-->
<!-- js -->
<link href="Bstyle.css" rel="stylesheet">
<link href="main.css" rel="stylesheet">
</head>
<body>
<!-- banner -->
<div class="banner" id="home">
	<div class="banner-overlay-agileinfo">

	<!-- top banner--------------->
<?php 
include('topbanner.php');
?>

<!-- ////////////top banner--------------->

		<div class="container">
			<!-----nav------->
<?php 
include('nav.php');
?>




<!---------///nav---------------------->			
			<div class="w3l_banner_info">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="wthree_banner_info_grid" style="width:800px;font-size:15px;">
									<h3><span>Genius</span>Welcome to UNICAL<br> E-library</h3>
									<p>Powered by Books Affair</p>
								</div>
							</li>
							<li>
								<div class="wthree_banner_info_grid">
									<h3><span>Genius</span>Books <br>for everyone</h3>
									<p>You can be a genius</p>
								</div>
							</li>
							<li>
								<div class="wthree_banner_info_grid">
									<h3><span>Genius</span>Welcome to Our<br> E-Library</h3>
									<p>You can be a genius</p>
								</div>
							</li>
							<li>
								<div class="wthree_banner_info_grid">
									<h3><span>Genius</span>Books <br>for everyone</h3>
									<p>You can be a genius</p>
								</div>
							</li>
						</ul>
					</div>
				</section>
						
			</div>	
			<center>
<a href="index.php#login" class="reg" >
	<button class="register button-w3layouts hvr-rectangle-out " style="margin-top:20px;width:50%;padding:10px 0px 10px 0px;" >Login</button>
	</a>

<a href="register.php" class="reg">
	<button class="register button-w3layouts hvr-rectangle-out " style="margin-top:20px;width:50%;padding:10px 0px 10px 0px;">REGISTER</button>
	</a>
	</center>
		</div>
	</div>
</div>
<!-- //banner -->	
<!-- about -->
	<div class="about-w3layouts">
		<div class="container">
			<div class="col-md-6 col-sm-6 gallery-grids agileits w3layouts gallery-grids1 wow slideInLeft">
				<div class="gallery-grid-images agileits w3layouts">
					<div class="col-md-4 col-sm-4 gallery-grid gallery-grid-1 history-grid-image">
						<img src="pix/p2.jpg" alt="Agileits W3layouts" class="zoom-img">
					</div>
					<div class="col-md-4 col-sm-4 gallery-grid gallery-grid-2 history-grid-image">
						<img src="pix/dd.jpg" alt="Agileits W3layouts" class="zoom-img">
					</div>
					<div class="col-md-4 col-sm-4 gallery-grid gallery-grid-3 history-grid-image">
						<img src="images/a3.jpg" alt="Agileits W3layouts" class="zoom-img">
					</div>
					<div class="col-md-4 col-sm-4 gallery-grid gallery-grid-4 history-grid-image">
						<img src="images/a4.jpg" alt="Agileits W3layouts" class="zoom-img">
					</div>
					<div class="col-md-4 col-sm-4 gallery-grid gallery-grid-5 history-grid-image">
						<img src="pix/p5.jpg" alt="Agileits W3layouts" class="zoom-img">
					</div>
					<div class="col-md-4 col-sm-4 gallery-grid gallery-grid-6 history-grid-image">
						<img src="pix/p4.jpg" alt="Agileits W3layouts" class="zoom-img">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		<div class="col-md-6 col-sm-6 gallery-grids agileits w3layouts gallery-grids2 wow slideInRight">
				<h2 class="tittle-agileits-w3layouts">
About UNICAL</h2>
				<h5>
 Fact About Us</h5>
				<p class="para-w3-agile">University of Calabar grew out of the Calabar campus of University of Nigeria (UNN), Nigeria which began functioning during the 1973 academic session with 154 students and a small cadre of academic, administration and professional staff.
<br>
In April 1975, the Federal Military Government of Nigeria announced that as part of the National Development Plan, seven new Universities were to be established at various locations in the country.</p>
				<a href="about.php" class="button-w3layouts hvr-rectangle-out">know more</a>
			</div>
			<div class="clearfix"></div>
			
		</div>
	</div>
	<!-- //about -->

<!--/services-->
<div class="services-w3-agileits w3agileits-ref">
	<div class="col-md-6 services-left">
		<div class="service-grid1">
			<div class="col-md-4 service-grids-w3ls">
				<i class="fa fa-language" aria-hidden="true"></i>
				<h5>Language Lessons</h5>
				<p>We Have Sections For Languages and cultures</p>
			</div>
			<div class="col-md-4 service-grids-w3ls">
				<i class="fa fa-users" aria-hidden="true"></i>
				<h5>Qualified Staffs</h5>
				<p>Qualified staffs to help you out on your research </p>
			</div>
			<div class="col-md-4 service-grids-w3ls">
				<i class="fa fa-graduation-cap" aria-hidden="true"></i>
				<h5>Special Education</h5>
				<p>We offer standard Education </p>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="service-grid2">
			<div class="col-md-4 service-grids-w3ls">
				<i class="fa fa-cutlery" aria-hidden="true"></i>
				<h5>Meals Provided</h5>
				<p>Provision of meal section fro snacks  </p>
			</div>
			<div class="col-md-4 service-grids-w3ls">
				<i class="fa fa-bus" aria-hidden="true"></i>
				<h5>Mobility</h5>
				<p>Mobility from one point to another </p>
			</div>
			<div class="col-md-4 service-grids-w3ls">
				<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
				<h5>Full Day Session</h5>
				<p>Full Day research and assistance available  </p>
			</div>
			<div class="clearfix"></div>
		</div>		
	</div>
	
    <div class="col-md-6  services-right">
		<div class="services-info" id="login">
			<h3 class="tittle-agileits-w3layouts white-w3ls">Login to Library</h3>
			
			 <script type="text/javascript">
    
    function login(){
       
    //check if the input t ypes are empty or not
     if( $("#username").val() == "" || $("#password").val() == "" )  $("div#msg").html("Please enter both username and password");
     else
 /** 1st fetch the url to be passed from the form and its action attribute**/
        $.post( $("#loginForm").attr("action"),
/** 2nd parramiters for the data to be passed **/
        $("#loginForm :input").serializeArray(),
/**3rd paramiter the call back function to take massages**/
        function (data){
            $("div#msg").html(data);
        });
   
    //ouside th else to return so as not to redirect 
$("loginForm").submit( function(){
 return false;      
});
    
     
}
</script>
			
			
    <div class="msg" align="center" id="msg">        
          <?php
          echo $msg;
          ?>
        </div>
		<p class="para-w3-agile white-w3ls">
           <DIV action="processing/login.php" method="POST" name="loginForm" id="loginForm">     
               <input type="text" name="username" placeholder="Username" max-lenght="20" class="txt" id="username" required/> 
               <input type="password" name="password" placeholder="password" max-lenght="20" id="password"  class="txt" required/>
            </p>
			
			<button  class="Bbutton2" style="width:40%;" name="login" id="submit" onclick="login();" > Login</button>
			</DIV>
		</div>
	</div>
    
	<div class="clearfix"></div>
</div>
<!--//services-->
<!-- agile_testimonials -->
<div class="test">
	<div class="container">
	<div class="col-md-3 test-left-agileinfo">
	<h3 class="tittle-agileits-w3layouts">Testimonials</h3>
	</div>
		<div class="col-md-9 test-gr">
					<div class=" test-gri1">
					 <div id="owl-demo2" class="owl-carousel">
							<div class="agile">
							   	<div class="test-grid">
							   		<div class="col-md-8 test-grid1">
										<p class="para-w3-agile">I have never seen anything like this, there services are splendid, and the environment is so cool and conducive for reading .</p>
										<h4>Michel Nwachukwu</h4>
										<span>Student</span>
									</div>	
									<div class="col-md-4 test-grid2">
										<img src="pix/boy1.jpg" alt="" class="img-r">
									</div>
								</div>	
								<div class="clearfix"></div>
							</div>
							<div class="agile">
							   	<div class="test-grid">
							   		<div class="col-md-8 test-grid1">
										<p class="para-w3-agile">I am intrigue by the services and neatness of the environment </p>
										<h4>Sandra James</h4>
										<span>Student</span>
									</div>	
									<div class="col-md-4 test-grid2">
										<img src="pix/girl1.jpg" alt="" class="img-r">
									</div>
								</div>	
								<div class="clearfix"></div>
							</div>
							<div class="agile">
							   	<div class="test-grid">
							   		<div class="col-md-8 test-grid1">
										<p class="para-w3-agile">some times i take a break from  my work to visit the library, and i find it so Beautiful  </p>
										<h4>Juliet Ijeoma</h4>
										<span>Staff</span>
									</div>	
									<div class="col-md-4 test-grid2">
										<img src="pix/lady1.jpg" alt="" class="img-r">
									</div>
								</div>	
								<div class="clearfix"></div>
							</div>
							<div class="agile">
							   	<div class="test-grid">
							   		<div class="col-md-8 test-grid1">
										<p class="para-w3-agile">spending some time here had made me so proud of my self, because i get to learn so much and get understanding of what i am tought in the class.</p>
										<h4>Stella Benjamin</h4>
										<span>Student</span>
									</div>	
									<div class="col-md-4 test-grid2">
										<img src="pix/girl2.jpg" alt="" class="img-r">
									</div>
								</div>	
								<div class="clearfix"></div>
							</div>	
					</div>
				</div>	
		</div>
	</div>
</div>
<!-- //agile_testimonials -->
<!-- Register    
echo"<script>     			document.getElementById('errormsg').innerHTML = 'No file Found Please Check your Spellings';
                </script>";
-->
<script type="text/javascript" src="js/jquery.min.js">  </script>
<script type="text/javascript">
   function finder(){
       //var userval = document.regform.username.value;
       //var userval = document.getElementById('username').innerHTML;
      // alert(userval);
{
$('#userval').load('usernameval.php').fadeIn("slow");
}
   }
    
    
    //unload after use
function unloaduserval(){
 {
$('#userval').unload('usernameval.php').fadeIn("slow");
 }
}

</script>

    
    

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
				<br>&nbsp;</br>
	<!--//timer-->
	</div>
	<div class="col-md-6 regstr-r-w3-agileits" id="reg">
	<!--<div class="form-bg-w3ls">
	
		<h3>Fill the register form</h3>
		<p class="para-w3-agile white-w3ls">Register to get full access to our books</p>
        
        <div class="msg" align="center">
       <!-- Data/Book was Sucessfully Uploaded--
        <span id="userval" ></span> 
          <?php
          echo $msgreg;
          ?>
        </div>
        
		<form action="index.php#reg" method="post" name="regform" id="regform">
		
			<input type="text"  name="fullname" placeholder="Full name" required="" />
			
			<input type="text"  name="username" placeholder="Username" required=""  "finder();" id="username"/>
			
			<input type="password" class="txt" name="password" placeholder="Password" required="" style="margin-top:10px;"/>
			
			<select class="form-control" name="level">
				<option>Select Level</option>
				<option value="100L">100 Level</option>
				<option value="200L">200 Level</option>
				<option value="300L">300 Level</option>
					<option value="400L">400 Level</option>
					<option value="500L">500 Level</option>	
					<option value="600L">600 Level</option>
					<option value="none">None Student</option>
				
			</select>
			<input type="submit"  name ="reg" value="Submit" class="button-w3layouts hvr-rectangle-out">
		</form>	
	</div>
</div>	-->
<style>
<!--
.register{
	background: transparent;
	border: 2px solid #F5B120;
	border-radius:3px;
	color:#fff;
	width:90%;
	padding:30px 0px 30px 0px;
	font-size:30px;
	margin:140px 0px 0px 30px;
}
-->
</style>
	<a href="register.php" class="reg">
	<button class="register button-w3layouts hvr-rectangle-out " >REGISTER</button>
	</a>

	
	<div class="clearfix"></div>
	</div>
</div></DIV>
<!-- //Register -->
<!--footer-->
<?php 
include('footer.php');
?>
<!-- //smooth scrolling -->

	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- flexSlider -->
							<script defer src="js/jquery.flexslider.js"></script>
							<script type="text/javascript">
							$(window).load(function(){
							  $('.flexslider').flexslider({
								animation: "slide",
								start: function(slider){
								  $('body').removeClass('loading');
								}
							  });
							});
						  </script>
<!-- //flexSlider -->
<!-- requried-jsfiles-for owl -->
 <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo2").owlCarousel({
									        items : 1,
									        lazyLoad : false,
									        autoPlay : true,
									        navigation : false,
									        navigationText :  false,
									        pagination : true,
									      });
									    });
									  </script>
							 <!-- //requried-jsfiles-for owl -->
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