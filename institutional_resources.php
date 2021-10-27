<?php
	error_reporting(0);
	ini_set('display_errors', 0);
?>

<?PHP
	SESSION_START();
	if($_SESSION['username']==""){
		echo "<script language='javascript'>alert('You must login as user to access this page');
		window.location.assign('index.php');</script>";
		//header('location:index.php');
	}
	else{
		$username = $_SESSION['username'];//collect username
	}
	
	///////////save books
	$save_id = "";
    $book_id = $_GET['book_id'];
    $user_id = $_GET['user_id'];
	$table_name = "resources";
    $save_date = $_GET['sub_date'];

	if(isset($book_id)){
		
		include ('includes/connection2.php');
		// find if saved already
		try{
			$sql = "SELECT * FROM saved_books WHERE book_id =? AND user_id = ? AND table_name = ?";
			$query = $conn->prepare($sql);
			
			$query->execute(array($book_id, $user_id, $table_name));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			
			if($row > 0) { 
			
				echo  "<script type='text/javascript'>alert('Resource Already Saved to your profile ');</script>";
				
			}
			else {
				
				$stmt = $conn->prepare("INSERT INTO saved_books (save_id, book_id, user_id, table_name, saved_date) VALUES (:save, :book, :user, :table, :date)");
				$stmt->bindParam(':save', $save_id);
				$stmt->bindParam(':book', $book_id);
				$stmt->bindParam(':user', $user_id);
				$stmt->bindParam(':table', $table_name);
				$stmt->bindParam(':date', $save_date);
				
				if($stmt->execute()){
					echo "<script type='text/javascript'>
					alert('Resource Saved to Profile');
					</script>";
				}
				else{
					echo "<script type='text/javascript'>
					alert('Error, failed to Saved');
					</script>";
				}
			}
			$conn=null;
		}
		catch (PDOException $e){
			die("Could not connect to the database: " . $e->getMessage());
		}
		
		  
	}
?>

<?PHP
	$action = $_GET["action"];
	$next = $_GET["next"];
	$search = $_POST["search"];
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>UNICAL E-library</title>
	
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<!-- //Meta-Tags -->
	
	<!-- Custom-Stylesheet-Links -->
	<!-- Bootstrap-CSS --><link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Font-awesome-CSS --><link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- Index-Page-CSS --><link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom-Stylesheet-Links -->
	
	<!--web-fonts-->
	<!-- Headings-font --><link href="//fonts.googleapis.com/css?family=Hind+Vadodara:300,400,500,600,700" rel="stylesheet">
	<!-- Body-font --><link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!--//web-fonts-->
	
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
			<?php 
				include('nav.php');
			?>
			<h2 class="inner-tittle-w3layouts">Institutional Resources</h2>	
		</div>
	</div>

	<script type="text/Javascript" src="jqslid/jquery-1.8.0.min.js"></script>
	<script type="text/Javascript" src="jqslid/my_code.js"></script>


	<div class="search">
		<form action="Institutional Resources.php" method="post">
			<input type="search" name="search1" placeholder="Searching..." class="sbox" required />
			<select name="by" class="sbox" style="width:100px;">
				<option value="author">Author</option>
				<option value="resourcetitle">Title</option>
				<option value="category">Department</option>
			</select>
			<button name="ssend" class="ssend">Search</button>
		</form>
	</div>
 
    <div class="all" style="height:auto;">
		<table border="0"  align="center" style="min-width:600;width:100%">
			<tr>
				<td>  
					<?php

					?>
					<!------------------categories----------->
					<div class="category" style="height:auto;">
						<div class="catag">
							 Departments
						</div> 
						
						<div class="cata">
							<a href="institutional_resources.php?action=All">All</a>
						</div>

						<div class="cata">
							<a href="institutional_resources.php?action=Accounting">Accounting<a>
						</div> 	

						<div class="cata">
							<a href="institutional_resources.php?action=Adult_Education">Adult Education</a>
						</div>       
						
						<div class="cata">
							<a href="institutional_resources.php?action=Agric_Economics">Agric Economics</a>
						</div> 

						<div class="cata">
							<a href="institutional_resources.php?action=Applied_Chemistry">Applied Chemistry</a>
						</div>  	

						<div class="cata">
							<a href="institutional_resources.php?action=Applied Geophysics">Applied Geophyisics</a>
						</div> 	

						<div class="cata">
							<a href="institutional_resources.php?action=Banking_and_Finance">Banking  & Finance</a>
						</div>   
						
						<div class="cata">
							<a href="institutional_resources.php?action=Biochemistry">Biochemistry</a>
						</div>  	

						<div class="cata">
							<a href="institutional_resources.php?action=Biotechnology">Biotechnology</a>
						</div> 	
						
						<div class="cata">
							<a href="institutional_resources.php?action=Botany">Botany</a>
						</div> 	

						<div class="cata">
							<a href="institutional_resources.php?action=Computer_Science">Computer Science</a>
						</div> 	
						
						<div class="cata">
							<a href="institutional_resources.php?action=Crop Science">Crop Science</a>
						</div>
						
						<div class="cata">
							<a href="institutional_resources.php?action=Economics_Geology_and_Environmental_Science">Economics Geology & Environmental Science</a>
						</div>  
						
						<div class="cata">
							<a href="institutional_resources.php?action=Fisheries_and_Aquaculture">Fisheries & Aquaculture</a>
						</div> 
					 
						<div class="cata">
							<a href="institutional_resources.php?action=Food Science Technology">Food Science Technology</a>
						</div>           

						<div class="cata">
							<a href="institutional_resources.php?action=Genetics">Genetics</a>
						</div>   	

						<div class="cata">
						<a href="institutional_resources.php?action=Geology">Geology</a>
						</div> 	
						
						<div class="cata">
							<a href="institutional_resources.php?action=library and information science">Library and Information Science</a>
						</div>

						<div class="cata">
							<a href="institutional_resources.php?action=Marketing">Marketing</a>
						</div> 
						
						<div class="cata">
							<a href="institutional_resources.php?action=Medical_Lab.Sci">Medical Lab. Sci</a>
						</div>
							
						<div class="cata">
							<a href="institutional_resources.php?action=Philosophy">Philosophy</a>
						</div>

						<div class="cata">
							<a href="institutional_resources.php?action=Public Administration">Public Administration</a>
						</div> 

						<div class="cata">
							<a href="institutional_resources.php?action=Pure_Chemistry">Pure Chemistry</a>
						</div>   
						
						<div class="cata">
							<a href="institutional_resources.php?action=Radiography">Radiography</a>
						</div> 

						<div class="cata">
							<a href="institutional_resources.php?action=Vet_Medicine">Vet Medicine</a>
						</div>          		
						
						<div class="cata">
							<a href="institutional_resources.php?action=Zoology">Zoology</a>
						</div>
					</div>
     
					<!------------------books----------->
					<div class="books">
						<div class="booktag">
							Resource Details
						</div>
						<div id="errormsg" class="msg" >
							<!-- display password error-->
						</div>
						
						<?php
							// end nexting
							include('includes/connection2.php');//database and server connection 
							//default start stop 
							//next button
							$start = $_GET['start'];
							$stop = $_GET['stop'];
							   
							if($start == ""){
							   $start= 0;
							   $stop = 20;
							}

							if(isset($_GET["action"])){
								if($action == ""){
									$action="All";
								}	   
								if($start >= 20){
									$start = $start + 20;
									$end = $start + 10;
								}
								//cliked on category
								if($action == "All"){ 
									//default display books
									try{
										$sql = "SELECT * FROM resources ORDER BY resourcetitle ASC LIMIT $start, $stop";
										$stmt = $conn->query($sql);
										$stmt->setFetchMode(PDO::FETCH_ASSOC);
									}
									catch (PDOException $e){
										die("<span class='error'>No Resource Found in Library or end of list.</span>" );
									}
								}
								else{
									//
									try{
										$sql = "SELECT * FROM resources WHERE category = '$action' ORDER BY resourcetitle ASC LIMIT $start, $stop";
										$stmt = $conn->query($sql);
										//$stmt->bindParam(':action', $action);
										$stmt->setFetchMode(PDO::FETCH_ASSOC);
									}
									catch (PDOException $e){
										die("<span class='error'>No Resource Found in this Category or end of list.</span>" );//. $e->getMessage())
									}	
								}
						   
							}//Department							   
							else if(isset($_POST["ssend"])){
								try{
									$by = $_POST['by'];
									$search = $_POST['search1'];
									$ssend = $_POST['ssend'];
									
									$sql = "SELECT * FROM resources WHERE $by LIKE '%$search%' order by resourcetitle ASC limit $start, $stop";
									$stmt = $conn->query($sql);
									$stmt->setFetchMode(PDO::FETCH_ASSOC);
								}
								catch (PDOException $e){
									die("Could not connect to the database " . $e->getMessage());
								}
							}	//search							   
							else if(isset($_POST["search"])){
								try{
									$search = $_POST['search'];
									$sql = "SELECT * FROM resources WHERE resourcetitle LIKE '%$search%' order by resourcetitle ASC LIMIT $start, $stop";
									$stmt = $conn->query($sql);
									$stmt->setFetchMode(PDO::FETCH_ASSOC);
								}
								catch (PDOException $e){
									die("Could not connect to the database " . $e->getMessage());
								}
							}	//search2
							else {	//default display books
								try{
									$sql="SELECT * FROM resources ORDER BY resourcetitle ASC LIMIT $start, $stop";
									$stmt = $conn->query($sql);
									
									if(!$stmt->fetch()){
										echo"<script>document.getElementById('errormsg').innerHTML = 'No Resource Found';
										</script>";
									}
								}
								catch (PDOException $e){
									die("Could not connect to the database " . $e->getMessage());
								}
							}
							
							while ($row = $stmt->fetch()){
								
						?>               
						
						<div class="booksec">
             
							<?php
								////////////////////////////////////////
								$filename = ($row['filename']);

								if($filename == ""){
									$address = "#";
									$read = "Unavailable";
								}
								else{
									$address = "resources_upload/". ($row['filename']);
									$read = "Read";
								}	
								/////////////////////////////////////////
							?>
				  
							<a href="<?php echo $address; ?>"> 
								 <!-- book title--->
								<?php  echo ($row['resourcetitle']);  ?>
							</a> 
			  
							<section>
							
								<?php
									$date = date('g:ia \o\n l jS F Y');
								?> 
						   
								<a href="<?php echo $address; ?>" >
									<?php echo $read; ?>
								</a>
							 
								<a href="Institutional_Resources.php?book_id=<?php echo ($row['resource_id']); ?>&&user_id=<?php echo $username; ?>&&sub_date=<?php echo $date;?>">
									Save
								</a>
								<!--
								<a href="borrow.php?book_id=<?php  //echo $row -> book_id;?>" target="_blank">Borrow</a>-->
								
							</section>
						 
							<div class="tuggle">
								<h1 style="cursor: pointer;">more</h1>
								<v style="color:#999999;Font-size:12px;margin-left:30px;">
									<b>Name of Author:</b> <?php  echo ($row['author']); ?>
									<br>
									<b>Category:</b> <?php  echo str_replace("_"," ",$row['category']);?>
									<br/>
									<b>Resource Title:</b><?php  echo  ($row['resourcetitle']);  ?>
									<br>
									<b>Type: </b><?php  echo  ($row['type']);  ?>
									<br>
									<b>Upload Date: </b><?php  echo  ($row['date']);  ?>
								</v>
							</div>
          
						</div> 
        
        
        
        
						<?php
							}
						?>
   
						<style>
						<!--
						.backL{border:1px solid #ccc;
							  background:#FF9900;
							  background-size:cover;
							  font-size:14px;
							  padding:3px 10px 4px 10px;
							  color:#fff;
							  border-radius:20px 5px 5px 20px;
							  box-shadow:-2px 6px  8px gray;
							  transition:all 0.2s ease 0.1s;
						}
						.backR{border:1px solid #ccc;
							  background:#FF9900;
							  //background-image:url('../icons/back.jpg');
							  background-size:cover;
							  font-size:14px;
							  padding:3px 10px 4px 10px;
							  color:#fff;
							  border-radius:5px 20px 20px 5px;
							  box-shadow:2px 6px  8px gray;
							  transition:all 0.2s ease 0.1s;
						}
						.backL:hover{box-shadow:-2px 3px  2px gray;}
						.backR:hover{box-shadow:2px 3px  2px gray;}
						-->
						</style>
						
						<?php
							//predefine start and stop
							if($start == ""){
								$start =(20);
								$stop = $start + (20);
							}
						?>	 
        
						<br>
						
						<div align="center">
						<!---//// next--------------botton-->
						<a HREF="javascript:history.go(-1)" class="backL"> < Back</a>
						  &nbsp;&nbsp;&nbsp;
						<a href="institutional_resources.php?action=<?php echo $action; ?>&&start=<?php echo $start; ?>&&stop=<?php echo $stop; ?>" class="backR">Next ></a>
						 <!---//// next--------------botton--> 
						</div>
						
						<br>
					</div><!---- books--->
				</td>
			</tr>
		</table>
	</div><!---all-->



	<!--footer-->
	<?php
		include('footer.php');
	?>
	
	<!-- //copy-right -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
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