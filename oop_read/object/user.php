<?php

class User{ 

private $conn;
private $table_invent = "reg_pin";



// sales properties
public $pin_id;
public $pin;
public $date;



// declaring constructor
public function __construct($db){

	$this->conn = $db;

}

// read product
  // read products
  function read(){

      // select all query
      $query = "SELECT * FROM " . $this->table_invent . "
              ORDER BY pin_id DESC";

        
      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // execute query
      $stmt->execute();

      return $stmt ;
  }

  function readid(){

  	$query = "SELECT pin_id,pin FROM ".$this->table_invent." WHERE prod_id='$pin_id'";

  	$stmt = $this->conn->prepare($query);
  	   // execute query
  	    if($stmt->execute()){

  	    	 return true;
  	    }
  	     else{
  	     	return false;
  	     }
  }
}



?>