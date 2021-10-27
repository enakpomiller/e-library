	<?PHP
	 /*
	SESSION_START();
	if($_SESSION['username']==""){
	echo "<script language='javascript'>alert('You must login as to access this page');
	window.location.assign('index.php');</script>";
	//header('location:index.php');
	}
		
		$del_id = $_GET['del_id'];
		/**
		if(isset($del_id)){
			include('includes/connection.php');//database and server connection	

	$query="DELETE FROM saved_books where book_id='$del_id' && user_id = '$username'";
	$result=mysql_query($query) or die ("error in query".mysql_error());
	if($result){
			echo "<script id='de' language='javascript'>alert('Removed Successfully');</script>";
	   }
	else
	   {   
		echo "<script language='javascript'>alert('Failed to delete');</script>";
	}
		}//del end
		
	
	if(isset($del_id)){
require('includes/connection2.php');
$sql="DELETE FROM saved_books WHERE save_id = '$del_id' AND user_id = '$username'";

    $stmt = $conn->prepare($sql);
	//$stmt->bindParam(':id', $del);
    if($stmt->execute()){
		echo "<script id='de' language='javascript'>alert('Removed Successfully');</script>";
	}
ELSE
{
	echo "<script language='javascript'>alert('Failed to delete');</script>";
}
$del_id ="";
$conn = null;
}
  
    */
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
		
	<script type="text/Javascript" src="jqslid/jquery-1.8.0.min.js"></script>
	<script type="text/Javascript" src="jqslid/my_code.js"></script>

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
					<h2 class="inner-tittle-w3layouts">Your Saved Books</h2>
			
		</div>
	</div>
	<div class="search">
	 <marquee direction="left" scrollamount="2" style="color:#fff;font-size:13px;"><em>welcome to your saved book page here you find all the books you saved from the library</em></marquee>
	</div>



	<div id="content">
	  <!---////////////////////////////////////////------>  
		
		
	 <div class="all">
		<table border="0"  align="center" style="min-width:600;
												 width:100%">
			<tr><td>
		


		<!------------------books----------->
		
			<div class="booktag" style="margin-left:10px;">
		  Your Saved Books From The Library
			</div>
			
			 <div id="errormsg" class="msg" >
				  <!-- display password error-->
			</div>
			
	 <?php
	 
	// end nexting
		include('includes/connection2.php');
	try{
						$sql = "SELECT * FROM saved_books WHERE user_id = '$username' && table_name ='books'";
						$stmt = $conn->query($sql);
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						
						while ($row = $stmt->fetch()){
						//collect saved book id form saved table 
						$saved_book_id = ($row['book_id']);
						$saved_id = ($row['save_id']); 
												
						// fine books from library
						$sql2 = "select * from books where book_id = '$saved_book_id' order by booktitle ASC";
						$stmt2 = $conn->query($sql2);
						$stmt2->setFetchMode(PDO::FETCH_ASSOC);
						while ($row2 = $stmt2->fetch()){
										
								
		   				  
	 ?>               
					
				
					
			 <div class="booksec">
				 

	<?php
			////////////////////////////////////////
					 $filename = ($row2['filename']);
						if($filename==""){
							$address="#";
							$read="Unavalable";
						}
					else{
						$address="books_upload/". $row2['filename'];
						$read="Read";
					}
					
			/////////////////////////////////////////
	?>
				  
				<a href="<?php echo $address; ?>"> 
					 <!-- book title--->
					 <?php  echo ($row2['booktitle']); ?>
				 </a> 
			  
				   <section>
					   
					 <?php
					 $date = date('g:ia \o\n l jS F Y');
					?>
					   
					 <a href="<?php echo $address; ?>" >
						 <?php echo $read; ?>
					   </a>
				<!--
					 <a href="borrow.php?book_id=<?php  echo $row -> book_id;?>" target="_blank">Borrow</a>
					   -->
							  
						 <a href="saved.php?del_id=<?php echo $saved_id; ?>" class="del" style="color:#fff;" onclick="return confirm('Are you Sure You want to Delete this Book?');">
						Remove 
					   </a>
						 
					   
					</section>  
					 
						 
				 <div class="tuggle">
					<h1 style="cursor: pointer;">more</h1>
					<v style="color:#999999;Font-size:12px;margin-left:30px;">
						<b>Name of Author:</b> <?php echo ($row2['author']); ?>
						<br>
						<b>Cartegory:</b> <?php  echo str_replace("_"," " , ($row2['department']));?>
						<br>
					 <b>Book Edition:</b><?php  echo ($row2['edition']);  ?>
						<br>
					   
						<b>SBN No: </b><?php echo ($row2['sbn']); ?>
						<br>
						<b>Upload Date: </b><?php  echo($row2['date']); ?>
					 </v>
				 </div>
			  
			</div> 
			
			
			
			
	<?php
						}		
			}			
		}										
		catch (PDOException $e){
			echo "<span class='error'>No file Saved from.</span>";//. $e->getMessage())
		}
			$conn = null; 
	?>
	   			
			
			
			
		<!---- books--->
		</td></tr>
		</table>
		<p>
		&nbsp;
		</p>



	<table border="0"  align="center" style="min-width:600;
												 width:100%">
			<tr><td>
		


		<!------------------thesis----------->
		
			<div class="booktag" style="margin-left:10px;">
		  Your Saved Thesis
			</div>
			
			 <div id="errormsg" class="msg" >
				  <!-- display password error-->
			</div>
			
	 <?php
	 
	// end nexting
		include('includes/connection2.php');
	try{
						$sql = "SELECT * FROM saved_books WHERE user_id = '$username' AND table_name ='thesis'";
						$stmt = $conn->query($sql);
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						
						while ($row = $stmt->fetch()){
						//collect saved book id form saved table 
						$saved_book_id = ($row['book_id']); 
						$saved_id = ($row['save_id']); 						
						// fine books from library
						$sql2 = "select * from thesis where id = '$saved_book_id' order by title ASC";
						$stmt2 = $conn->query($sql2);
						$stmt2->setFetchMode(PDO::FETCH_ASSOC);
						while ($row2 = $stmt2->fetch()){
										
								
		   				  
	 ?>               
					
				
					
			 <div class="booksec">
				 

	<?php
			////////////////////////////////////////
					 $filename = ($row2['filename']);
						if($filename==""){
							$address="#";
							$read="Unavalable";
						}
					else{
						$address="thesis_upload/". $row2['filename'];
						$read="Read";
					}
					
			/////////////////////////////////////////
	?>
				  
				<a href="<?php echo $address; ?>"> 
					 <!-- book title--->
					 <?php  echo ($row2['title']); ?>
				 </a> 
			  
				   <section>
					   
					 <?php
					 $date = date('g:ia \o\n l jS F Y');
					?>
					   
					 <a href="<?php echo $address; ?>" >
						 <?php echo $read; ?>
					   </a>
				
							  
						 <a href="saved.php?del_id=<?php echo $saved_id; ?>" class="del" style="color:#fff;" onclick="return confirm('Are you Sure You want to Delete this Book?');">
						Remove 
					   </a>
						 
					   
					</section>  
					 
						 
				 <div class="tuggle">
					<h1 style="cursor: pointer;">more</h1>
					<v style="color:#999999;Font-size:12px;margin-left:30px;">
						<b>Name of Author:</b> <?php echo ($row2['author']); ?>
						<br>
						<b>Department:</b> <?php  echo str_replace("_"," " , ($row2['department']));?>
						<br>
					 <b>Year Of Publication:</b><?php  echo ($row2['year']);  ?>
						<br>
					   
						<b>Academic Level: </b><?php echo ($row2['level']); ?>
						<br>
					 </v>
				 </div>
			  
			</div> 
			
			
			
			
	<?php
						}		
			}		
			
		}										
		catch (PDOException $e){
			echo "<span class='error'>No file Saved from.</span>";//. $e->getMessage())
		}
			$conn = null; 
	?>
	   			
			
			
			
		<!---- books--->
		</td></tr>
		</table>
		<p>
		&nbsp;
		</p>
	
	
	
	
			<div class="booktag" style="margin-left:10px;">
		  Your Saved Journals
			</div>
			
			 <div id="errormsg" class="msg" >
				  <!-- display password error-->
			</div>
			
	 <?php
	 
	// end nexting
		include('includes/connection2.php');
	try{
						$sql = "SELECT * FROM saved_books WHERE user_id = '$username' && table_name = 'journals'";
						$stmt = $conn->query($sql);
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						
						while ($row = $stmt->fetch()){
						//collect saved book id form saved table 
						$saved_book_id = ($row['book_id']); 
						$saved_id = ($row['save_id']); 						
						// fine books from library
						$sql2 = "select * from journals where id = '$saved_book_id' order by articletitle ASC";
						$stmt2 = $conn->query($sql2);
						$stmt2->setFetchMode(PDO::FETCH_ASSOC);
						while ($row2 = $stmt2->fetch()){
										
								
		   				  
	 ?>               
					
				
					
			 <div class="booksec">
				 

	<?php
			////////////////////////////////////////
					 $filename = ($row2['filename']);
						if($filename==""){
							$address="#";
							$read="Unavalable";
						}
					else{
						$address="journals_upload/". $row2['filename'];
						$read="Read";
					}
					
			/////////////////////////////////////////
	?>
				  
				<a href="<?php echo $address; ?>"> 
					 <!-- book title--->
					 <?php  echo ($row2['articletitle']); ?>
				 </a> 
			  
				   <section>
					   
					 <?php
					 $date = date('g:ia \o\n l jS F Y');
					?>
					   
					 <a href="<?php echo $address; ?>" >
						 <?php echo $read; ?>
					   </a>
				
							  
						 <a href="saved.php?del_id=<?php echo $saved_id; ?>" class="del" style="color:#fff;" onclick="return confirm('Are you Sure You want to Delete this Book?');">
						Remove
					   </a>
						 
					   
					</section>  
					 
						 
				 <div class="tuggle">
					<h1 style="cursor: pointer;">more</h1>
					<v style="color:#999999;Font-size:12px;margin-left:30px;">
						<b>Journal Title:</b> <?php echo ($row2['journaltitle']); ?>
						<br>
						<b>Name of Author:</b> <?php echo ($row2['author']); ?>
						<br>
						<b>Category:</b> <?php  echo str_replace("_"," " , ($row2['category']));?>
						<br>
					 <b>Volume:</b><?php  echo ($row2['volume']);  ?>
						<br>
					   
						<b>DOI: </b><?php echo ($row2['doi']); ?>
						<br>
						<b>Date: </b><?php echo ($row2['date']); ?>
						<br>
					 </v>
				 </div>
			  
			</div> 
			
			
			
			
	<?php
						}		
			}			
		}										
		catch (PDOException $e){
			echo "<span class='error'>No file Saved from.</span>";//. $e->getMessage())
		}
			$conn = null; 
	?>
	   			
			
			
			
		<!---- books--->
		</td></tr>
		</table>
		<p>
		&nbsp;
		</p>
	
	
	
	
	
			<div class="booktag" style="margin-left:10px;">
		  Saved Institutional Resources
			</div>
			
			 <div id="errormsg" class="msg" >
				  <!-- display password error-->
			</div>
			
	 <?php
	 
	// end nexting
		include('includes/connection2.php');
	try{
						$sql = "SELECT * FROM saved_books WHERE user_id = '$username' && table_name ='resources'";
						$stmt = $conn->query($sql);
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						
						while ($row = $stmt->fetch()){
						//collect saved book id form saved table 
						$saved_book_id = ($row['book_id']); 
						$saved_id = ($row['save_id']); 
												
						// fine books from library
						$sql2 = "select * from resources where resource_id = '$saved_book_id' order by resourcetitle ASC";
						$stmt2 = $conn->query($sql2);
						$stmt2->setFetchMode(PDO::FETCH_ASSOC);
						while ($row2 = $stmt2->fetch()){
										
								
		   				  
	 ?>               
					
				
					
			 <div class="booksec">
				 

	<?php
			////////////////////////////////////////
					 $filename = ($row2['filename']);
						if($filename==""){
							$address="#";
							$read="Unavalable";
						}
					else{
						$address="resources_upload/". $row2['filename'];
						$read="Read";
					}
					
			/////////////////////////////////////////
	?>
				  
				<a href="<?php echo $address; ?>"> 
					 <!-- book title--->
					 <?php  echo ($row2['resourcetitle']); ?>
				 </a> 
			  
				   <section>
					   
					 <?php
					 $date = date('g:ia \o\n l jS F Y');
					?>
					   
					 <a href="<?php echo $address; ?>" >
						 <?php echo $read; ?>
					   </a>
				
							  
						 <a href="saved.php?del_id=<?php echo $saved_id; ?>" class="del" style="color:#fff;" onclick="return confirm('Are you Sure You want to Delete this Book?');">
						Remove
					   </a>
						 
					   
					</section>  
					 
						 
				 <div class="tuggle">
					<h1 style="cursor: pointer;">more</h1>
					<v style="color:#999999;Font-size:12px;margin-left:30px;">
						<b>Journal Title:</b> <?php echo ($row2['resourcetitle']); ?>
						<br>
						<b>Name of Author:</b> <?php echo ($row2['author']); ?>
						<br>
						<b>Category:</b> <?php  echo str_replace("_"," " , ($row2['category']));?>
						<br>
					 <b>Type:</b><?php  echo ($row2['type']);  ?>
						<br>
					   
						<b>Month/Year: </b><?php echo ($row2['month'])."/".($row2['year']); ?>
						<br>
						<b>Date: </b><?php echo ($row2['date']); ?>
						<br>
					 </v>
				 </div>
			  
			</div> 
			
			
			
			
	<?php
						}		
			}			
		}										
		catch (PDOException $e){
			echo "<span class='error'>No file Saved from.</span>";//. $e->getMessage())
		}
			$conn = null; 
	?>
	   			
			
			
			
		<!---- books--->
		</td></tr>
		</table>
		<p>
		&nbsp;
		</p>
		<!--------/////////////////////////////-------->  
		

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