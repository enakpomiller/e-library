
<?php   
  
   include_once('Users.php');

   $user = new Users();
     if(isset($_POST['submit'])){ 

     	 $filename=!empty($_FILES["filename"]["name"])
        ? sha1_file($_FILES['filename']['tmp_name']) . "-" . basename($_FILES["filename"]["name"]) : "";
        $user->filename= $filename;
             $strike = $user->journal_Exist($filename);

                    if($strike){
                  // dispaly an error message 
                    http_response_code(400);
                   print " <script language='javascript'>
                  alert('THAT JOURNAL HAS BEEN UPLOADED');

                  window.location = 'adminpanel.php';
                    </script>";
                      }
                  else { 
           $article_title = $user->escape_string($_POST['article_title']);
           $journal_title  = $user->escape_string($_POST['journal_title']);
           $journal_author = $user->escape_string($_POST['journal_author']);
           $journal_category  = $user->escape_string($_POST['journal_category']);
           $journal_base = $user->escape_string($_POST['journal_base']);
           $journal_volume = $user->escape_string($_POST['journal_volume']);
           $journal_doi = $user->escape_string($_POST['journal_doi']);
           $journal_date = $user->escape_string($_POST['journal_date']);
                 


              $query = "INSERT INTO journals(
              article_title,journal_title,journal_author,journal_category,journal_base,journal_volume,journal_doi,journal_date,filename) VALUES ('$article_title','$journal_title','$journal_author','$journal_category','$journal_base','$journal_volume','$journal_doi','$journal_date','$filename')";

              if($user->execute($query)){
                // display positive outcome 
                http_response_code(200);

                  print " <script language='javascript'>
                  alert(' JOURNAL SUCCESSFULLY UPLOADED');

                  window.location = 'adminpanel.php';
                    </script>";
              }
               else {
               	  $_SESSION['display'] = ' PLESAE UPLOAD';
                  echo $_SESSION['display'];
               }

           }

    }
    
  
    
?>