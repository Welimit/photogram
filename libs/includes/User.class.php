<?php

class User 
{    
    private $conn;

    public static function signup( $user, $pass, $email, $phone)
    {
      $options = [
        'cost' => 8,
      ];
      $pass = password_hash( $pass, PASSWORD_BCRYPT, $options);
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

    public static function login( $user, $pass){ 
      $query = "SELECT * FROM `addons` WHERE `username` = '$user'";
      $conn = Database::getConnection();
      $result = $conn->query($query);
      if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // if($row['password'] == $pass){
      if(password_verify($pass, $row['password'])) {
          return $row['username'];
        }
      } else{
        return false;
      }
      
    }

    public function __construct($username){
      $this->conn = Database::getConnection();
      $this->username = $username;
      $this->id = null;
      $sql = "SELECT `id` FROM `addons` WHERE `username`= '$username' OR `id` = '$username' LIMIT 1";
      $result = $this->conn->query($sql);
      if($result->num_rows) {
        $row = $result->fetch_assoc();
        $this->id = $row['id'];
      } else {
        throw new Exception("User does't exsits");
      }
      //print($this->id);
    }

    public function __call($name, $arguments)
    {
      $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3)); //Regex functions
      $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));  //Regex functions

      if (substr($name, 0, 3) == "get") {
        return $this->_get_data($property);
      } elseif (substr($name, 0, 3) == "set") {
        return $this->_set_data($property, $arguments[0]);
      } else {
        throw new Exception("User::__call() -> $name, function unavailable.");
    }
    }

    private function _get_data($name) {
      if(!$this->conn) {
        $this->conn = Database::getConnection();
      }
      $sql = "SELECT `$name` FROM `users` WHERE `id` = $this->id";
      $result = $this->conn->query($sql);
      if($result and $result->num_rows == 1) {
        return $result->fetch_assoc()[$name];
      } else {
        return null;
      }
    }

    private function _set_data($var, $data) {
      if(!$this->conn) {
        $this->conn = Database::getConnection();
      }
      $query = "UPDATE `users` SET  `$var` = '$data' WHERE `id` = $this->id";
      if($this->conn->query($query)) {
        return true;
      } else {
        return false; 
      }
    }

    public function setDob($year, $month, $day)
    {
      if(checkdate($month, $day, $year )) {
        return $this->_set_data('dob', "$year.$month.$day");
      } else {
        return false;
      }
    }

    public function getUsername()
    {
      return $this->username;
    }

    // public function getFirstname() {
    //   return $this->_get_data('firstname');
    // }

    // public function getLastname()
    // {
    
    // }

    // public function authenticate(){

    // }

    // public function setBio()
    // {
    
    // }

    // public function getBio()
    // {
    
    // }

    // public function setAvatar()
    // {
    
    // }

    // public function getAvatar()
    // {
    
    // }
    // public function setFirstname()
    // {
    
    // }
    // public function setLastname()
    // {
    
    // }
    // public function getDob()
    // {
    
    // }

}



