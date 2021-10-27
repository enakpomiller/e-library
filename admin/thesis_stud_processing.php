

<?php   
   include_once('Users.php');

   $user = new Users();
         $date = date('D-M-Y');
     if(isset($_POST['submit'])){ 

     	 $file_thesis=!empty($_FILES["file_thesis"]["name"])
        ? sha1_file($_FILES['file_thesis']['tmp_name']) . "-" . basename($_FILES["file_thesis"]["name"]) : "";
        $user->file_thesis= $file_thesis;
             $gear = $user->thesis_Exist($file_thesis);

                    if($gear){
                  // dispaly an error message 
              http_response_code(400);
                   print " <script language='javascript'>
                  alert('THAT THESIS HAS BEEN UPLOADED');

                  window.location = 'adminpanel.php';
                    </script>";
                 
                      }
                  else { 
           $title = $user->escape_string($_POST['title']);
           $year = $user->escape_string($_POST['year']);
           $author  = $user->escape_string($_POST['author']);
           $level  = $user->escape_string($_POST['level']);
           $category = $user->escape_string($_POST['category']);
           $date = $user->escape_string($_POST['date']);


                 


              $query = "INSERT INTO thesis(
              title,year,author,level,category,date,file_thesis) VALUES ('$title','$year','$author','$level','$category','$date','$file_thesis')";

              if($user->execute($query)){
             http_response_code(400);
                   print " <script language='javascript'>
                  alert('THESIS SUCCESSFULLY UPLOADED');

                  window.location = 'adminpanel.php';
                    </script>";
              }
               else {
               	  echo json_encode(' PLESAE UPLOAD JOURNAL');
               }

           }

    }


?>