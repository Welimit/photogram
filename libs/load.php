<?php

    include_once 'libs/includes/Database.class.php';
    include_once 'libs/includes/Session.class.php';
    include_once 'libs/includes/User.class.php';
    include_once 'libs/includes/UserSession.class.php';

    global $__site_config;
    $__site_config = file_get_contents($_SERVER ['DOCUMENT_ROOT'].'/../photogram/config.json');

    Session::start();

    function get_config($key, $default=null)
    {
      global $__site_config;
      $array = json_decode($__site_config, true);
      if( isset($array[$key])) {
        return $array[$key];
      } else {
        return $default;
      }
    }

    function load_template ($name) {

        include $_SERVER ['DOCUMENT_ROOT']."/phpapp/_templates/$name.php";
    }

    function validate_credentials($username, $password)
    {
        if ($username == "username@gmail" and $password == "password") {
            return true;
        } else {
            return false;              
        }
    }

    function login($username, $password){

      $conn = Database::getConnection();


        $login = "SELECT * FROM 'addons_db' WHERE email = '$username' AND passowrd='$password'";
        $error = false;
        if ($conn->query($login) === true) {
          $error = false;
        } else { 
          //echo "Error: " . $sql . "<br>" . $conn->error;
          $error = $conn->error;
        }
        $conn->close();
        return $error;
    }


?>