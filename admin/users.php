<?php  
include_once('DBConnection.php');

  class Users extends  DBConnection {

  	 public function __construct(){

  	 	 parent:: __construct();

  	 }

  	   // userlogin  function
  	  public function check_login($username , $password){
        $sql= " SELECT * FROM users WHERE username='$username' AND password='$password'";
            $query = $this->connection->query($sql);
              if($query->num_rows > 0 ){
              	 $row = $query->fetch_array();
              	  return $row['user_id'];
              }
               else {
               	 return false;
               }

  	  }

  	      public function usernameExist($username){
  	      	 $sql = "SELECT * FROM users WHERE username='$username'";
  	      	   $query = $this->connection->query($sql);
  	      	      if($query ->num_rows > 0){
  	      	      	 $row = $query->fetch_array();
  	      	      	 return $row['user_id'];
  	      	      }
  	      	       else {
  	      	       	return false;
  	      	       }
  	      }

            public function test_login($username , $password){
        $sql= " SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $query = $this->connection->query($sql);
              if($query->num_rows > 0 ){
                 $row = $query->fetch_array();
                 return $row['admin_id'];
              }
               else {
                 return false;
               }

              }


               public function pinExist($pin){
             $sql = "SELECT * FROM reg_pin WHERE pin='$pin'";
               $query = $this->connection->query($sql);
                  if($query ->num_rows > 0){
                     $row = $query->fetch_array();
                     return $row['pin_id'];
                  }
                   else {
                    return false;
                   }
          }

        
        public function book_Exist($filename){

            $sql = " SELECT *  FROM books WHERE filename='$filename'";
            $query = $this->connection->query($sql);
               if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['book_id'];
               }
                return false;
        }


           public function journal_Exist($filename){

            $sql = " SELECT *  FROM journals WHERE filename='$filename'";
            $query = $this->connection->query($sql);
               if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['journal_id'];
               }
                return false;
        }


                public function resource_Exist($filename){

            $sql = " SELECT *  FROM resources WHERE filename='$filename'";
            $query = $this->connection->query($sql);
               if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['resouce_id'];
               }
                return false;
        }


                public function thesis_Exist($file_thesis){

            $sql = " SELECT *  FROM thesis WHERE file_thesis='$file_thesis'";
            $query = $this->connection->query($sql);
               if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['thesis_id'];
               }
                return false;
        }



                public function add_admin($adminuser){

            $sql = " SELECT *  FROM add_admin WHERE adminuser='$adminuser'";
            $query = $this->connection->query($sql);
               if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['admin_id'];
               }
                return false;
        }

      public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }


  	    public function read($sql){
  	    	  $query = $this->connection->query($sql);
  	    	    if($query == false){
  	    	    	 return false;
  	    	    }
  	    	     else {
  	    	     	return true;
  	    	     }
  	    	      $row = array();

  	    	       while($row = $query->fetch_array()){
  	    	       	  $rows[] = $row;
  	    	       }
  	    	        return $rows;
  	    }

        

        public function read_books($sql){
            $query = $this->connection->query($sql);
              if($query == false){
                 return false;
              }
               else {
                return true;
               }
                $row = array();

                 while($row = $query->fetch_array()){
                    $rows[] = $row;
                 }
                  return $rows;
        }

  	   // perform execution

  	  public function execute($sql){

  	  	 $query = $this->connection->query($sql);
  	  	   // perform conditional test
  	  	  if($query == false){
  	  	  	 return false;
  	  	  }
  	  	   else {
  	  	   	 return true;
  	  	   }
  	  }

  	   public function escape_string($value){
  	   	  return  $this->connection->real_escape_string($value);
  	   }
  }



?>