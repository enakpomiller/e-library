
  <center> 
<table style="width:100%">
  <tr> 
       <th><center> S/N </center></th>
    <th> <center> PIN </center></th>
    <th><center> DATE </center></th>

  
  </tr>
  
<?php

 $counter = 1;
include_once 'oop_read/config/database.php';
include_once 'oop_read/object/user.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);

// query users
$stmt = $user->read();
 $num = $stmt->rowCount();


// check if more than 0 record found
if($num >0){

    // products array
	    
     $users_arr=array();
      $users_arr["records"]=array();
      
      
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     // exrtact row
        extract($row);
        
                ?>

  <tr>
      <td><center> <?php echo $counter++ ;?> </center></td>
    <td style="padding: 10px"><center> <?php echo $row['pin'];?> </center></td>
     <td><center> <?php echo $row['date'];?> </center></td>

  </tr>


 


                <?php 
			  
        $user=array(
            "pin_id" => $pin_id,
            "pin" => $pin,
			 "date" =>$date,
             //"prodprice" => $prodprice
                );
        array_push($users_arr["records"], $user);
                   
         //echo json_encode(array($prodprice));
	

    }
   ?>
   </table>
    </center>
   <?php 
     
    // set response code - 200 OK
    http_response_code(200);
         
    // show products data in json format
    //var_dump($products_arr);
	    
       //echo json_encode($users_arr);
	
}

else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "Sorry Sails Not Found."));
}

?>
