<?php

class User{ 

private $conn;
private $table_invent = "books";



// sales properties
public $book_id;
public $booktitle;
public $author;



// declaring constructor
public function __construct($db){

	$this->conn = $db;

}

// read product
  // read products
  function read(){

      // select all query
      $query = "SELECT * FROM " . $this->table_invent . "
              ORDER BY book_id DESC";

        
      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // execute query
      $stmt->execute();

      return $stmt ;
  }

  function readid(){

  	$query = "SELECT book_id,booktitle FROM ".$this->table_invent." WHERE book_id='$book_id'";

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