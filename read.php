

<?php
include_once 'config/database.php';
include_once 'user.php';  


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


      
     <?php echo $row['booktitle'];?> 
      <?php echo $row['author'];?> 



                <?php 
			  
        $user=array(
            "book_id" => $book_id,
            "booktitle" => $booktitle,
			      "author" =>$author,
             //"prodprice" => $prodprice
                );
        array_push($users_arr["records"], $user);
                   
         //echo json_encode(array($prodprice));
	

    }
   ?>
  



  
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
        array("message" => "Sorry book Not Found."));
}

?>

