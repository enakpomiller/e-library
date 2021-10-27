<?php   

   include_once('Users.php');

   $user = new Users();
     if(isset($_POST['submit'])){ 
     	   $date = date('D-M-Y');
          

     	 $filename=!empty($_FILES["filename"]["name"])
        ? sha1_file($_FILES['filename']['tmp_name']) . "-" . basename($_FILES["filename"]["name"]) : "";
        $user->filename= $filename;
             $auto = $user->booK_Exist($filename);

                    if($auto){
                  // dispaly an error message 
                http_response_code(400);
                   print " <script language='javascript'>
                  alert('THAT BOOK HASS BEEN UPLOADED');

                  window.location = 'adminpanel.php';
                    </script>";

                
                 }
                  else { 

           $booktitle = $user->escape_string($_POST['booktitle']);
           $author  = $user->escape_string($_POST['author']);
           $department = $user->escape_string($_POST['department']);
           $edition  = $user->escape_string($_POST['edition']);
           $sbn = $user->escape_string($_POST['sbn']);
         

              $query = "INSERT INTO books(
              booktitle,author,department,edition,sbn,filename,date) VALUES ('$booktitle','$author','$department','$edition','$sbn','$filename','$date')";

              if($user->execute($query)){
                // display positive outcome 
              http_response_code(200);

                     print " <script language='javascript'>
                  alert('BOOK UPLOAD WAS SUCCESSFUL');

                  window.location = 'adminpanel.php';
                    </script>";
                
               
              }
               else {
                   // asign file to the server
               	   http_response_code(300);
               	         print " <script language='javascript'>
                  alert(' PLEASE UPLOAD BOOK');
                    </script>
              ";
              }
               }

           }

    


?>