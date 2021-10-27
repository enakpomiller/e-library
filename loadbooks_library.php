    
         <div id="errormsg" class="msg" >
			  <!-- display password error-->
        </div>
        
 <?php
// end nexting
	include('includes/connection.php');//database and server connection 
//defulte start stop 
//next button
	   $start = $_GET['start'];
	   $stop = $_GET['stop'];
	   
 if($start == ""){
		   $start= 0;
		   $stop = 20;
	   }

if(isset($_GET["action"])){
	if($action ==""){
		$action="All";
	}	   
	    	if ($start >= 20){
			$start = $start + 20;
			$end = $start + (10);
		}
	
     //cliked on category
    if($action == "All"){///default display books
            $sql="select * from books order by book_id DESC limit $start, $stop";
            $result = mysql_query($sql) or die ("error in sql".mysql_error());
}
    else{
    //////////
    $sql="SELECT * FROM books WHERE department='$action' order by book_id DESC limit $start, $stop";
    
    $result=mysql_query($sql) or die ("error in query finding seat".mysql_error());

   if (mysql_num_rows($result)==""){
                echo"<script>     			document.getElementById('errormsg').innerHTML = 'No file Found in this Department or end of list';
                </script>";
             }
  }
   
}////Department
        
       
elseif(isset($_POST["search"])){
          $sql = "select * from books where booktitle like '%$search%' order by book_id DESC limit $start, $stop";
    
            $result = mysql_query($sql) or die ("error in sql".mysql_error());

   if (mysql_num_rows($result)==""){
                echo"<script>     			document.getElementById('errormsg').innerHTML = 'No file Found Please Check your Spellings';
                </script>";
             }
}//search
        
        
else {///default display books
            $sql="select * from books order by book_id DESC limit $start, $stop";
            
            $result = mysql_query($sql) or die ("error in sql".mysql_error());
       
              if (mysql_num_rows($result)==""){
                echo"<script>     			document.getElementById('errormsg').innerHTML = 'No file Found';
                </script>";
             }
     }

if(mysql_num_rows($result)>0){
			while ($row=mysql_fetch_object($result)){
}//off
            
            
 ?>               
               
         <div class="booksec">
             

<?php
        ////////////////////////////////////////
                 $filename = $row -> filename;
                    if($filename==""){
                        $address="#";
                        $read="Unavailable";
                    }
                else{
                    $address="books_upload/". $row -> filename;
                    $read="Read";
                }
                
        /////////////////////////////////////////
?>
              
            <a href="<?php echo $address; ?>"> 
                 <!-- book title--->
                 <?php  echo  $row -> booktitle;  ?>
             </a> 
          
               <section>
                   
                 <?php
                 $date = date('g:ia \o\n l jS F Y');
                ?> 
                   
                 <a href="<?php echo $address; ?>" >
                     <?php echo $read; ?>
                   </a>
                     
<a href="library.php?book_id=<?php echo  $row -> book_id; ?>&&user_id=<?php echo $username; ?>&&sub_date=<?php echo $date;?>">
                       Save
                   </a>
				   <!--
                 <a href="borrow.php?book_id=<?php  //echo $row -> book_id;?>" target="_blank">Borrow</a>-->
                </section>  
				
                 
                     
             <div class="tuggle">
                <h1 style="cursor: pointer;">more</h1>
                <v style="color:#999999;Font-size:12px;margin-left:30px;">
                    <b>Name of Author:</b> <?php  echo  $row -> author;  ?>
                    <br>
                    <b>Department:</b> <?php  echo  $row -> department;  ?>
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
 //off}
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
  <a href="library.php?action=<?php echo $action; ?>&&start=<?php echo $start; ?>&&stop=<?php echo $stop; ?>" class="backR">Next ></a>
 <!---//// next--------------botton--> 
</div>
<br>
        
        
        
        