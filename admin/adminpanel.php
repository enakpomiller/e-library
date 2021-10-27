<?PHP
	SESSION_START();
	if($_SESSION['username']=="" AND $_SESSION['admin']!=="admin"){
		echo "<script language='javascript'>alert('You must login as Admin to access this page');
		window.location.assign('index.php');</script>";
		header('location:index.php');
	}
	
	//get admin type for privileges 
	require('processing/connection2.php');
	try {
	$AdminName = $_SESSION['username'];
$sql = ("SELECT * FROM admin WHERE username = '$AdminName'");
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

	} catch (PDOException $e) {
    die("Could not connect Identify your Admin Type :" . $e->getMessage());
}
while ($row = $stmt->fetch()){
	//get admin category
	$admin_type = ($row['category']);
	$_SESSION['admin_type'] = $admin_type;//session 
	if($admin_type == "staff"){
		$class ="staff";
	}else{
		$class ="none";
	}
}	
?>
<!--- css privilege styles----->
<style>
<!--
/**default settings blure all**/
  /* for "super" admin */
.super{
  pointer-events: auto;
  opacity:100;
 background: inherit;
}
  /* for "staff" admin */
.staff{
  pointer-events: none;
  opacity: 0.5;
  background: #CCC;
}
.more{
	cursor: pointer;
	color:#000099;
	font-style: italic;
   font-size:11px;	
	}
.more:hover{
	cursor: pointer;
	text-decoration:underline;
	}
.close_more{
	cursor: pointer;
	color:#990000;
   font-size:14px;	
   float:right;
	}
.close_more:hover{
	cursor: pointer;
	text-decoration:underline;
	}
#more_div{
	border:1px solid #009900;
	border-radius:3px;
	margin-bottom:10px;
	padding:5px 5px 5px 5px;
}
-->
</style>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Library Admin</title>
	
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<!-- //Meta-Tags -->
	
	<!-- Custom-Stylesheet-Links -->
	<!-- Bootstrap-CSS -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Font-awesome-CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- Index-Page-CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom-Stylesheet-Links -->
	
	<!--web-fonts-->
	<!-- Headings-font -->
	<link href="//fonts.googleapis.com/css?family=Hind+Vadodara:300,400,500,600,700" rel="stylesheet">
	<!-- Body-font -->
	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!--//web-fonts-->
	
	<!-- stylesheets -->
	<link rel="stylesheet" href="main.css" >
	<link rel="stylesheet" href="../css/upgrade.css" type="text/css" >
	
</head>

<body>
	<!-- banner -->
	<div class="banner inner-banner-w3-agileits" id="home">
		<div class="banner-overlay-agileinfo">
			<?php include('../topbanner.php'); ?>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php include('nav.php'); ?>
			<h2 class="inner-tittle-w3layouts">Admin</h2>
		</div>
	</div>
	<!-- //banner -->
	<!--about-inner-->
	<!--about-top-->

	<link href="aboutCss.css" rel="stylesheet" type="text/css" media="all" />

	<div id="content" style="margin:auto" align="">
		<script type="text/javascript">
			function login(){
			   
			//check if the input types are empty or not
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
		   
			//ouside the else to return so as not to redirect 
			$("loginForm").submit( function(){
			 return false;      
			});
			
			 
			}


			function openCity(evt, cityName) {
			  var i, tabcontent, tablinks;
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }
			  document.getElementById(cityName).style.display = "block";
			  evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
			
	</script>
			
		<link href="processing/info_error.css" rel="stylesheet" type="text/css"/>
		<link href="tab_css.css" rel="stylesheet" type="text/css"/>
		<script src="signup_js.js"></script>
		<!-- Ajax form processing -->
		<script type="text/javascript" src="processing/ajax_process_functions.js">
		</script>
		<script type="text/javascript" src="processing/jquery-2.1.4.min.js">
		</script>

           
		<div class="modal-content">
			<div class="modal-header">
				<h2>Select an action on the Tab</h2>
				<p style="text-transform:capitalize;">
					only for administrative use (all admins are limited to different privileges <span id="more" class='more' onclick="more();">(more)</span>)
					<div id="more_div">
					<!--<span class='close_more' onclick="close_more();">x</span>-->
					<span onclick="close_more();" class="topright">&times </span>
					
<h5>There are two basic categories of Admins in this system</h5>
<b>Super Admin:</b><br/>
They have the following Privileges:<br>
To add update and delete books in <br>
- library  <br>
- Journals<br> 
- theses<br> 
- institutional resource<br> 
- registration pin for students and <br>
-  add and delete other admin <br>
<i>(this is recommended to the managed by only one person because this users have NO RESTRICTIONS)</i>

<p>&nbsp;</p>

<b>Staff Admin:</b><br>
They have the following Privileges:
To add update and delete books in <br>
- library<br>
- Journals<br>
- theses <br>
- institutional resource.

					</div>
				<p>
<script>
		 $("#more_div").hide();
	function more(){
					
			if (document.getElementById('more').click) {
          $("#more_div").fadeIn().next().slideToggle(300);
		  // $("#more_div").show();
		   } 
		}
	function close_more(){
		$("#more_div").fadeOut().next().slideToggle(300);
	}
		</script>
		   <?php include_once('journal_processing.php');?>
				<!-- tabs-->
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'upload_books')">Upload Books</button>
  
					<button class="tablinks" onclick="openCity(event, 'upload_journals')">Upload Journals</button>
  
					<button class="tablinks" onclick="openCity(event, 'upload_resources')">Institutional Resources</button>   
   
					<button class="tablinks" onclick="openCity(event, 'thesis')">Students Thesis</button> 
   
					<button class="tablinks <?php echo $class; ?>" onclick="openCity(event, 'add_admin')">Add Admin</button> 
	
					<button class="tablinks <?php echo $class; ?>" onclick="openCity(event, 'add_pin')">Registration Pin </button> 
		
				</div>
				<!-- //tabs-->
				
				<!-- display-->  
				<div id="upload_books" class="tabcontent">
					<span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
					<h3 class="tab_header"><center>Upload Books</center></h3>
					<!-- section 1-->
					<?php
						include "upload_books.php";
					?>
				</div>  
 
				<div id="upload_journals" class="tabcontent">
					<span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
					<h3 class="tab_header"><center>Upload Journals</center></h3>
					<!-- section 2-->
					<?php
						include "upload_journals.php";
					?>
				</div>
 
				<div id="upload_resources" class="tabcontent">
					<span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
					<h3 class="tab_header"><center>Upload Resources</center></h3>
					<!-- section 3-->
					<?php
						include "upload_resources.php";
					?>
				</div>
  

				<div id="thesis" class="tabcontent">
					<span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
					<h3 class="tab_header"><center>Students Thesis</center></h3>
					<!-- section 4-->
					<?php
						include "upload_thesis.php";
					?>
				</div>  


				<div id="add_admin" class="tabcontent">
					<span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
					<h3 class="tab_header"><center>Add Admin</center></h3>
					<!-- section 5-->
					<?php
						include "add_admin.php";
					?>
				</div>


				<div id="add_pin" class="tabcontent">
					<span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
					<h3 class="tab_header"><center>Registration Pin Process</center></h3>
					<!-- section 6-->
					<?php
						include "add_pin.php";
					?>
				</div>
			</div> 
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
	</div>
	
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