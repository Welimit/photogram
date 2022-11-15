<?php

class User 
{   

    private $conn;
    public static function signup( $user, $pass, $email, $phone)
    {
      $pass = md5($pass);
      $conn = Database::getConnection();
        
      $sql = "INSERT INTO `addons` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
      VALUES ( '$user', '$pass', '$email', '$phone', '0', '1');";
      $error = false;
      if ($conn->query($sql) === true) {
        $error = false;
      } else { 
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $error = $conn->error;
      }
      //$conn->close();
      return $error;
    }

    public function __construct($user){
      $this->conn = Database::getConnection();
      $this->conn->query();
    }

    public static function login( $user, $pass){
      $pass = md5($pass);
      $query = "SELECT * FROM `addons` WHERE `username` = '$user'";
      $conn = Database::getConnection();
      $result = $conn->query($query);
      if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if($row['password'] == $pass){
          return $row;
        }
      } else{
        return false;
      }
      
    }

}