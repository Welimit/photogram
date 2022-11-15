<?php
// setcookie("testcookie", "testvalue", time() + (86400 * 30), "/");
include 'libs/load.php';
//include_once 'libs/includes/Session.class.php';

print("_SESSION ");
print_r($_SESSION);

// print("_SERVER");
// print_r($_SERVER);

if (isset($_GET['clear'])) {
    printf("Clearing....");
    Session::unset();
}

if(isset($_SESSION['a'])){
    printf(" A ALready exists... Value: ".Session::get('a')."\n");
} else {
    Session::set('a', time());
    printf(" Assining a new value... Value: $_SESSION[a] \n");

}

if (isset($_GET['destroy'])) {
    printf("Destroying....");
    session_destroy();
}


?>