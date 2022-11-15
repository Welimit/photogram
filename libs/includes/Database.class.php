<?php

class Database 
{
    public static $conn = null;
    public static function getConnection(){

    if(Database::$conn == null) {
      $servername = "localhost";
      $user = "root";
      $pass = "theteam@We15";
      $dbname = "authdb";
      
      //Create Connection
      $conn = new mysqli($servername, $user, $pass, $dbname );
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