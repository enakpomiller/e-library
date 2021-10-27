
<?php
session_start();
$date = date("D dS M Y, h:m:s a");
   // database connection
   include_once('Users.php');

     $user = new Users();

     if(isset($_POST['submit'])) {
         // username validation function
            $pin = $user->escape_string($_POST['pin']);
               $demo = $user->pinExist($pin);
                 if($demo){
                    $msg =  $_SESSION['msg_error']= ' SORRY: PIN ALREADY EXISTS';
                 }

                  else { 
       $pin = $user->escape_string($_POST['pin']);
       $date  = $user->escape_string($_POST['date']);

            
        $query = " INSERT INTO reg_pin(pin,date) VALUES('$pin','$date')";

             if($user->execute($query)){
                  
                // $msg = $_SESSION['msg_success']='REGISTRATION WAS SUCEESFULL';
                     
                    echo " 
                     <script>

                     window.location = 'adminpanel.php';
                     </script>
                    ";
               
                  

             }
        
              else {
                      echo "<div class='alert alert-success'>";
                $_SESSION['message'] = ' Unable to Register ';
                     echo "</div>";
              }
             //window.location = 'register.php';
               }

     }
   
?>
