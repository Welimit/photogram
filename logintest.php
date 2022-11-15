<?php

include 'libs/load.php';

$user = "foobo";
$pass = "foobo";
$result = null;

if (isset($_GET['logout'])) {
    Session::destory();
    die("Session Destroyed, <a href='logintest.php'>Login Again</a>");
}

if(Session::get('is_loggedin')){
    $userdata = Session::get('session_user');
    print("Welcome back, $userdata[username]");
    $result = $userdata;
} else{
    printf("No session found, trying to login now.");
    $result = User::login($user, $pass);
    if($result) {
        echo "Login Successfull, $result[username]";
        Session::set('is loggedin', true);
        Session::set('session_user', $result);
    } else {
        echo "Login Failled";
    }
}
echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;
