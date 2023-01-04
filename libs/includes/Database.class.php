<?php

class Database 
{
    public static $conn = null;
    public static function getConnection(){

    if(Database::$conn == null) {
      $servername = get_config('db_server');
      $user = get_config('db_username');
      $pass = get_config('db_password');
      $dbname = get_config('db_name');
      
      //Create Connection
      $conn = new mysqli($servername, $user, $pass, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } else {
          // intiallizing New coonection
          Database::$conn = $conn;
          return Database::$conn;
        }
      } else {
        // Establishing existing connection
        return Database::$conn; 
      }
    }
}