<?php

include 'libs/load.php';

$user = "happy";
$pass = isset($_GET['pass']) ? $_GET['pass'] : '';
$result = null;

if (isset($_GET['logout'])) {
    Session::destory();
    die("Session Destroyed, <a href='logintest.php'>Login Again</a>");
}

if(Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome back ". $userobj->getAvatar());
} else{
    printf("No session found, trying to login now. <br>");
    $result = User::login($user, $pass);

    if($result) {
        $userobj = new User($user);
        echo "Login Successfull", $userobj->getUsername();
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
    } else {
        echo "Login Failled, $user <br>";
    }
}

echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;
