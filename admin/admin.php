<?php
	error_reporting(0);
	ini_set('display_errors', 0);
?>

<?PHP
SESSION_START();
if($_SESSION['username']=="" OR $_SESSION['admin']!=="admin"){
echo "<script language='javascript'>alert('You must login as Admin to access this page');
window.location.assign('index.php');</script>";
//header('location:index.php');
}

    $del_id = $_GET['del_id'];
    if(isset($del_id)){
        include('includes/connection.php');//database and server connection	

$query="DELETE FROM books where book_id='$del_id'";
$result=mysql_query($query) or die ("error in query".mysql_error());
if($result){
		echo "<script id='de' language='javascript'>alert('Book Deleted Succefully');</script>";
   }
else
   {   
	echo "<script language='javascript'>alert('Failed to delete');</script>";
}
    }//del end

?>

<?php
$edit = $_GET["edit"];
    
$search = ($_POST["search"]);
$booktitle = ($_POST["booktitle"]);
$author = ($_POST["author"]);
$cartegory = ($_POST["cartegory"]);
$edition = ($_POST["edition"]);
$sbn = ($_POST["sbn"]);
$uploaddate = ($_POST["uploaddate"]);
//$uploaddate = ($_POST["uploaddate"]);


$upid= $_POST["upid"];
$update= $_POST["update"];

if(isset($_POST["update"])){//update dab
include('includes/connection.php');//database and server connection
    
    
 if (($_FILES['file_m']['size']) > $maxsize){
       $msgsize="File Too Large";
         }
    
    
      $file_mname=$_FILES['file_m']['name'];//stores the name of the file_m in a variable '$name'
	       $tmp=$_FILES['file_m']['tmp_name'];//stores the location of the file_m in a variable '$temp'
		   $size=($_FILES['file_m']['size']);
         /**         > $maxsize)? die(" The file size is too big"):$_FILES['file']['size'];    **/
		   $folder="books_upload/";
		   $imgData = $file_mname;
		   //checks the book Department to know the upload folder
           $target=$folder.basename($_FILES['file_m']['name']);
		   
		   $uploaded=move_uploaded_file($tmp,$target);
	if($uploaded){
    
        //do nothing just continure to insert indo db because some books may not have soft copy
        $msgbook=" and Book was Sucessfully Uploaded";
        
        }
    elseif(!$uploaded){
       // echo "<script language='javascript'>alert('fail to upload Book'); </script>";
        $msgbook =", Fail to Upload Book ";
    }    
    
    
    
    

$update="update books set booktitle = '$booktitle', author='$author', cartegory = '$cartegory', edition ='$edition', sbn = '$sbn', filename = '$file_mname', date = '$uploaddate' where book_id='$upid'";
	
$update_result=mysql_query($update) or die ("error in query".mysql_error());
   if($update_result){ 
       
       $success ="Updated Successfully".$msgbook;
echo "<script>alert(' $success ');</script> ";
  }
  else{
	  echo "<script>alert('Updated failed ');</script>";
  }
}




if(isset($_POST["send"])){//send new files to db
    include('includes/connection.php');//connect to database
    
$maxsize=50000;//sets the maximum size for the file_m file to be uploaded
    if (($_FILES['file_m']['size']) > $maxsize){
       $msgsize="File Too Large";
         }
    
    
      $file_mname=$_FILES['file_m']['name'];//stores the name of the file_m in a variable '$name'
	       $tmp=$_FILES['file_m']['tmp_name'];//stores the location of the file_m in a variable '$temp'
		   $size=($_FILES['file_m']['size']);
         /**         > $maxsize)? die(" The file size is too big"):$_FILES['file']['size'];    **/
		   $folder="books_upload/";
		   $imgData = $file_mname;
		   //checks the book Department to know the upload folder
           $target=$folder.basename($_FILES['file_m']['name']);
		   
		   $uploaded=move_uploaded_file($tmp,$target);
	if($uploaded){
    
        //do nothing just continure to insert indo db because some books may not have soft copy
        $msgbook=" and Book was Sucessfully Uploaded";
        
        }
    elseif(!$uploaded){
        echo "<script language='javascript'>alert('fail to upload Book'); </script>";
        $msgbook =", Fail to Upload Book ".$magsize;
    }
    
    //insert into db
     $querydata ="insert into books values('', '$booktitle', '$author', '$cartegory', '$edition', '$sbn', '$file_mname', '$uploaddate')";

     $resultdata = mysql_query($querydata) or die ("error on your query line ".mysql_error());
    
    if($resultdata){
        /**
          echo "<script language='javascript'>alert('Uploaded Successfully')</script>";
        **/
	   $msg="Data Sent".$msgbook;
    }
    else{
        $msg="Fail to Upload or File too Large";
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
<meta name="keywords" content=" Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
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
				<h2 class="inner-tittle-w3layouts">Admin Portal</h2>
		
	</div>
</div>
<link href="Bstyle.css" rel="stylesheet">
<link href="main.css" rel="stylesheet">

<script type="text/Javascript" src="jqslid/jquery-1.8.0.min.js"></script>
<script type="text/Javascript" src="jqslid/my_code.js"></script>



<div class="alladmin">
    <h1 class="uptag">Upload Books</h1>
    
    <div class="upload">
        <form action="admin.php" method="POST">
<div class="sadmin">
<input type="search" name="search" placeholder="Searching..." class="asbox"/>
<button name="ssend" class="ssend">Search</button>
</div>
        </form>
     
  
                <div class="searchresult" style="margin-top:10px;">

   
                    
                    <!------------------------search------------------->
<?php
        if(isset($_POST["search"])){
    include('includes/connection.php');//database and server connection 
            
          $sql = "select * from books where booktitle like '%$search%' order by book_id DESC";
    
            $result = mysql_query($sql) or die ("error in sql".mysql_error());
            
      if(mysql_num_rows($result)>0){
			while ($row=mysql_fetch_object($result)){
        //show search result
        
                
 ?>
<!------------------------search------------------->       
   
                    
     
                    
        
                    
                    
                    
    <div class="booksec">
          
            <a href="<?php echo $address; ?>"> 
                 <!-- book title--->
                 <?php  echo  $row -> booktitle;  ?>
             </a> 
          
               <section>
                   
               
            
                 <a href="admin.php?edit=<?php  echo $row -> book_id;?>" > Edit</a>
                   
                          
                     <a href="admin.php?del_id=<?php echo $row -> book_id; ?>" class="del" style="color:#fff;" onclick="return confirm('Are you Sure You want to Delete this Book?');">
                    Delete
                   </a>
                     
                   
                </section>  
                 
                     
             <div class="tuggle">
                <h1>more</h1>
                <v style="color:#999999;Font-size:12px;margin-left:30px;">
                    <b>Name of Author:</b> <?php  echo  $row -> author;  ?>
                    <br>
                    <b>Cartegory:</b> <?php  echo  $row -> cartegory;  ?>
                    <br>
                 <b>Book Edition:</b><?php  echo  $row -> edition;  ?>
                    <br>
                   
                    <b>SBN No: </b><?php  echo  $row -> sbn;  ?>
                    <br>
                    <b>Upload Date: </b><?php  echo  $row -> date;  ?>
                 </v>
             </div>
          
        </div>  
                
                    
   
                    
                    
                    
<?php
                
                }
      }
            else{
                //else result
                $msg="No file/Result Found Please Check your Spellings";
                               
            }
      
}//ifisset
    
?>
                    
 </div>
        
        
        <div id="errormsg" class="msg" >
			  <!-- display password error-->
            <?php
            echo $msg;
            ?>
            
         </div>
   
        
        
      <?php
       if(isset($_GET["edit"])){
           $text ="text";
           $file="file";
           $button ="submit";
           $select = "visible";
           $height ="auto";
           
       include('includes/connection.php');//database and server connection 
            
        $sql = "select * from books where book_id = '$edit'";
            $result = mysql_query($sql) or die ("error in sql".mysql_error());
           
            $result = mysql_query($sql) or die ("error in sql".mysql_error());
            
      if(mysql_num_rows($result)>0){
			while ($row=mysql_fetch_object($result)){
        //show search result
        
                   $booktitle = $row -> booktitle;  
                
                   $author = $row -> author;  
                    
                   $cartegory = $row -> cartegory;  
                    
                   $edition = $row -> edition;  
                  
                    $sbn = $row -> sbn;  
                    
                    $update  = $row -> date; 
                
                    $filename  = $row -> filename;  
                
            }
      }
           
  }
       else{
           $text="hidden";
           $file ="hidden";
           $button ="hidden";
           $select = "hidden";
           $height ="1px";
       }
        
        $date = date('g:ia \o\n l jS F Y');
            
       
       ?>  
        
    <div class="edit" style="visibility:<?php echo  $select ?>;height:<?php echo $height;?>">
            
  <form action="admin.php" method="POST" enctype="multipart/form-data" >
      
      <input type="hidden" name="upid" value="<?php echo $edit;?>"/>
      
     
    <input type="<?php echo $text; ?>" name="booktitle" placeholder="Book Title" class="formfill" required value="<?php  echo $booktitle; ?>"/>
    
    <input type="<?php echo $text; ?>" name="author" placeholder="Name of Author" class="formfill" value="<?php  echo $author; ?>"/>
    
    <select name="cartegory" class="formfill" required style="visibility:<?php echo $select ;?>;" value="<?php  echo $cartegory; ?>">
        <option value=""> Department</option>
        <option value="Art">Art</option>
        <option value="History">History</option>  
        <option value="Science">Science</option>
        <option value="Technology">Technology</option>
        <option value="Abstract">Abstract</option>
        <option value="Astronomy">Astronomy</option>
        <option value="Other">Others</option>
    </select>
    
    
    <input type="<?php echo $text; ?>" name="edition" placeholder="Book Edition" class="formfill" value="<?php  echo $edition; ?>"/>
    
    <input type="<?php echo $text; ?>" name="sbn" placeholder="SBN Number of Book" class="formfill"value="<?php  echo $sbn; ?>"/>

    <input type="<?php echo $text; ?>" name="uploaddate" value="<?php echo $date; ?>" class="formfill" readonly value="<?php  echo $update; ?>"/> 
    
    <input type="<?php echo $file; ?>" name="file_m" id="file_m" placeholder="Upload Book" class="file"  value="<?php  echo $filename; ?>"/>
    
            <center>
                 <input type ="<?php echo $button; ?>" name="update" class="ssend" value="Update" style="letter-spacing:3px; width:30%;" />
            </center>
   
    </form>
     
    </div>
   <!------- form--------->   
        
        <div class="boxes">

 <?php
//date formart
            $date = date('g:ia \o\n l jS F Y');
            
?>
 <form action="admin.php" method="POST" enctype="multipart/form-data" >
     
    <input type="text" name="booktitle" placeholder="Book Title" class="formfill" required/>
    
    <input type="text" name="author" placeholder="Name of Author" class="formfill"/>
    
    <select name="cartegory" class="formfill" required>
        <option value=""> Department</option>
  <option value="Agric_Economics">Agric Economics</option>
<option value="Crop_Science">Crop Science</option>
<option value="Food_Science_Technology">Food Science Technology</option>
<option value="Mecical_Lab.Sci">Mecical Lab.Sci</option>
<option value="English_Literary_Studies">English / Literary Studies</option>
<option value="Philosophy">Philosophy</option>
<option value="Religious_Studies">Religious Studies</option>
<option value="Biochemistry">Biochemistry</option></option>
<option value="Adult_Education">Adult Education</option>
<option value="Library_&_Information_Science">Library & Information Science</option>
<option value="Agric_Education">Agric Education</option>
<option value="Accounting">Accounting</option>
<option value="Banking_&_Finance">Banking & Fin</option>ance</option>
<option value="Marketing">Marketing</option>
<option value="Applied_Chemistry">Applied Chemistry</option>
<option value="Pure_Chemistry">Pure Chemistry</option>
<option value="Botany">Botany</option>
<option value="Genetics_&_Biotechnology">Genetics & Biotechnology</option>
<option value="Geology">Geology</option>
<option value="Computer_Science">Computer Science</option>
<option value="Applied_Geophyisics">Applied Geophyisics</option>
<option value="Zoology_&_Environment_Bioogy">Zoology & Environment Bioogy</option>
<option value="Fisheries_&_Aquaculture">Fisheries & Aquaculture</option>
<option value="Economics_Geology_&_Environmental_Science">Economics Geology & Environmental Science</option>
<option value="Public_Administration">Public Administration</option>
<option value="Radiography">Radiography</option>
      
       
    </select>
    
    
    <input type="text" name="edition" placeholder="Book Edition" class="formfill"/>
    
    <input type="text" name="sbn" placeholder="SBN Number of Book" class="formfill"/>

    <input type="text" name="uploaddate" value="<?php echo $date; ?>" class="formfill" readonly/> 
    
    <input type="file" name="file_m" id="file_m" placeholder="Upload Book" class="file" />
    
            <center>
                 <button name="send" class="ssend" style="letter-spacing:3px; width:30%;">Upload Now</button>
            </center>
   
    </form>
    </div>
        
    
    <!------- form--------->     
            
        

    </div>
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