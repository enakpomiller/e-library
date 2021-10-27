
<?php   
   include_once('Users.php');

   $user = new Users();
         $date = date('D-M-Y');
     if(isset($_POST['submit'])){ 

     	 $filename=!empty($_FILES["filename"]["name"])
        ? sha1_file($_FILES['filename']['tmp_name']) . "-" . basename($_FILES["filename"]["name"]) : "";
        $user->filename= $filename;
             $gear = $user->resource_Exist($filename);

                    if($gear){
                  // dispaly an error message 
               http_response_code(400);
               print "<script> alert('SORRY THAT RESOURCE HAS BEEN UPLOADED ');
               window.location = 'adminpanel.php';
                </script>
               ";
                      }

                  else { 
           $title = $user->escape_string($_POST['title']);
           $author  = $user->escape_string($_POST['author']);
           $category = $user->escape_string($_POST['category']);
           $type = $user->escape_string($_POST['type']);
           $month = $user->escape_string($_POST['month']);
           $year = $user->escape_string($_POST['year']);
           $date = $user->escape_string($_POST['date']);

                 
              $query = "INSERT INTO resources(
              title,author,category,type,month,year,date,filename) VALUES ('$title','$author','$category','$type','$month','$year','$date','$filename')";

              if($user->execute($query)){
                // display positive outcome 
               http_response_code(200);
                echo " 
                <script> alert('RESOURCE UPLOADED SUCCESSFULLY ');
                  window.location = 'adminpanel.php';
                 </script>
                ";
              

              }
               else {
               	  echo json_encode(' PLESAE UPLOAD JOURNAL');
               }

           }

    }


?>