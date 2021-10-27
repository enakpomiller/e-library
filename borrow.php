<?php
 $book_id = $_GET['book_id'];

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<title>COE Akamkpa</title>
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
				<h2 class="inner-tittle-w3layouts">Borrow Book</h2>
		
	</div>
</div>

<div class="search" align="center">
 <span style="color:#fff;font-size:13px; letter-spacing:4px;margin:auto">Please print out your recipt and collect hard copy of the book via our lirary</span>
</div>
    



<div class="bwr" >
    
            <div class="booktag" style=" border-radius:0px;">
                <center>Borrow Book Print out</center>
        
            </div>
<?php
    include('includes/connection.php');//database and server connection 
       $sql="SELECT * FROM books WHERE book_id='$book_id'";
    
    $result=mysql_query($sql) or die ("error in query finding book".mysql_error());
if(mysql_num_rows($result)>0){
			while ($row=mysql_fetch_object($result)){
               
    
?>
    
    <table border="0" height="300px" style="padding:2px 5px 2px 5px;" cellspacing="10px" width="100%">
        <tr><td >
  <spam class="t1"> Client Name: </spam>  
            </td><td> 
            <spam class="t2"> <?php echo   $_SESSION['fullname']; ?></spam>
            
            </td></tr>
    <tr><td>
<spam class="t1"> Book title: </spam> 
        </td><td>
            <spam class="t2">  <?php  echo  $row -> booktitle;  ?></spam>
     </td></tr> 
        
         <tr><td>
  <spam class="t1">Book Author: </spam>  
             </td><td>
            <spam class="t2">  <?php  echo  $row -> author;  ?></spam>
  </td></tr> 
        
          <tr><td>
  <spam class="t1">Book Cartegory: </spam>  
             </td><td>
            <spam class="t2">  <?php  echo  $row ->  cartegory;  ?></spam>
  </td></tr>   
        
    
                     <tr><td>
  <spam class="t1">Book Edition: </spam>  
             </td><td>
            <spam class="t2">  <?php  echo  $row ->  edition;  ?></spam>
  </td></tr> 
        
             <tr><td>
  <spam class="t1">SBN Number: </spam>  
             </td><td>
            <spam class="t2">  <?php  echo  $row ->  sbn;  ?></spam>
  </td></tr> 
        
<tr><td>
  <spam class="t1">Borrow Date</spam> 
    </td><td>
            <spam class="t2"> <?php
                 $date = date('g:ia \o\n l jS F Y');
                echo $date;
                ?></spam>
    </td></tr> 
        
         <tr><td>
  <spam class="t1"> Return Date</spam>  
             </td><td>
            <spam class="t2">4 Days From Now</spam>
             </td></tr>
    
    <tr>
        <td colspan="2">
         <center>
    <button name="print" class="Bbutton2" onclick="print();" style="width:20%;text-align:center">Print Slip</button>
    </center>
        </td>
        
        </tr>
 <?php
            }
}
?>
</table>

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