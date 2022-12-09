<?php

class UserSession
{

    //processing while user login..
    public static function authenticate($user, $pass) 
    {
      $username = User::login($user, $pass);
      $user = new USer($username);
      if($username) {
        $conn = Database::getConnection();
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0, 9999999) . $ip.$agent.time());
        $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`,`ip`, `user_agent`, `active`)
        VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
        if ($conn->query($sql)) { 
          Session::set("session_token", $token);
          return $token; //returning token.
        } else{
          throw new Exception("Error Processing Request");
          return false;
        }
      } else {
        throw new Exception("Login Failed");
        return false;
      }
    }

    public function __construct($token)
    {
        $this->conn = Database::getConnection();
        $this->token = $token;
        $this->data = null;
        $sql = "SELECT * FROM `session` WHERE `token`= '$token' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows) {
          $row = $result->fetch_assoc();
          $this->data = $row;
          $this->id = $row['uid'];
        } else {
          throw new Exception("Session is invalid.");
        }
    }


    public static function authorize($token)
    {
      $sess = new UserSession($token);
      if($sess->getIp() == $_SERVER['REMOTE_ADDR'] &&
         $sess->getUserAgent() == $_SERVER['HTTP_USER_AGENT'] ) {
          print (" -  Authorized User - ");
          return true;
      } else {
        return false;
      }
    }

    public function getUser()
    {
        return new User($this->uid);
    }

    public function isValid()
    {
      $dateTime = $this->data->login_time;
      if($dateTime->diff(new DateTime)->format('%R') == '+') {
        return false;
      } else {
        return true;
      }
    }

    public function getIp() 
    {
      return $this->data['ip'];
    }

    public function getUserAgent()
    {
      return $this->data['user_agent'];
    }

    public function deactivate()
    {
      $sql = "UPDATE `session` SET `active` = '0' WHERE `uid` = '$this->uid`";
      $this->conn->query($sql);
      print ("Session Deactivated, Login again");
    }
}