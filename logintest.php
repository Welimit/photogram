<?php

include 'libs/load.php';

$user = "happy";
$pass = isset($_GET['pass']) ? $_GET['pass'] : '';
$result = null;

if (isset($_GET['logout'])) {
    Session::destory();
    die("Session Destroyed, <a href='logintest.php'>Login Again</a>");
}

/**
 * 1. check if session_token in php session is available.
 * 2. if yes, construct Usersession and see if it is sucessfull.
 * 3. check if session is valid one.
 * 4. if valid, print "session validated.
 * 5. Else, print "Invalid, Session" and ask user to login.
 */

    if(Session::isset('session_token')) {
        $token = Session::get('session_token');
        echo "successfully logged in";
        if(UserSession::authorize($token)) {
            print("Session Valid");
        } else {
            print ("Not a Authorize User");
        }
    } else{
        if(!$pass) die("password not found");
        if (UserSession::authenticate($user, $pass)) {
            echo "Login sucess";
        } else {
            echo "login failed";
        }     
    }
     
// if(Session::get('is_loggedin')) {
//     $username = Session::get('session_username');
//     $userobj = new User($username);
//     print("Welcome back ". $userobj->getFirstname());
//     $userobj->setBio("Making new things...");
// } else{
//     printf("No session found, trying to login now. <br>");
//     $result = User::login($user, $pass);

    // if($result) {
    //     $userobj = new User($user);
    //     echo "Login Successfull", $userobj->getUsername();
    //     Session::set('is_loggedin', true);
    //     Session::set('session_username', $result);
    // } else {
    //     echo "Login Failled, $user <br>";
    // }
// }

echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;
