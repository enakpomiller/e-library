
<title>UNICAL E-library</title>
<?php
//select current page hover
$pagename = basename($_SERVER['PHP_SELF']);
if($pagename == "index.php"){
	$index="active";
}elseif($pagename == "about.php"){
	$about="active";
}elseif($pagename == "saved.php"){
	$saved="active";
}elseif($pagename == "library.php"){
	$library="active";
}elseif($thesis== "thesis.php"){
	$library="active";
}elseif($pagename == "institutional_resources.php"){
	$Institutional_Resources="active";
}elseif($pagename == "journals.php"){
	$journals="active";
}elseif($pagename == "saved.php"){
	$saved="active";
}
?>
<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1" >
					<nav class="link-effect-3" id="link-effect-3">
						<ul class="nav navbar-nav">
							<li class="<?PHP echo $index; ?>"><a href="index.php" data-hover="Home">Home</a></li>
							<li class="<?PHP echo $about; ?>"><a href="about.php" data-hover="About Us">About Us</a></li>
							<!--<li class="<?PHP echo $saved; ?>"><a href="saved.php" data-hover="Saved Books">My Profile</a></li>-->
							<li class="<?PHP echo $library; ?>"><a href="library.php" data-hover="Library">Library</a></li>
							<li class="<?PHP echo $$thesis; ?>"><a href="thesis.php" data-hover="Students Thesis">Students Thesis</a></li>
							<li class="<?PHP echo $Institutional_Resources; ?>"><a href="Institutional_Resources.php" data-hover="Institutional Resources">Institutional Resources</a></li>
							<li class="<?PHP echo $journals; ?>"><a href="Journals.php" data-hover="Journals">Journals</a></li>
							<li class="<?PHP echo $saved; ?>"><a href="saved.php" data-hover="My Shelf"> My Shelf</a></li>
							<!--<li class="dropdown menu__item">
								<a href="index.php" class="dropdown-toggle menu__link"  data-toggle="dropdown" data-hover="Members" role="button" aria-haspopup="true" aria-expanded="false">Members<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="index.php#login" >Login</a></li>
									<li><a href="register.php">Register</a></li>
								</ul>
							</li>-->
						
						</ul>
					</nav>
				</div>
			</nav>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 

	 <script type="text/JavaScript">
	 
	jQuery(document).ready(function() {

    $('#login').click(function(){
    $('html, body').animate({scrollBottom:0}, 1000);
    return false;
    });

    $('#reg').click(function(){
    $('html, body').animate({scrollTop:$(document).height()}, 'slow');
    return false;
    });

    });
		
	 </script>