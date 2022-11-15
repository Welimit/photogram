<pre>

<?php

    include_once 'libs/includes/mic.class.php';
    // include_once 'libs/includes/User.class.php';
    include_once 'libs/includes/Database.class.php';
    include 'libs/load.php';

    //$cookie_name = "typescript";
    //$cookie_value = $_SERVER("REQUEST_URI");
    //setcookie($cookie_name. $cookie_value, time() + (86400 + 30 ), "/" );
    // print_r("_SERVER \n");
    // print_r($_SERVER);
    // print_r("_GET \n");
    // print_r($_GET);
    // print_r("_POST \n");
    // print_r($_POST);
    // print_r("_FILES \n");
    // print_r($_FILES);
    // print_r("_COOKIES \n");
    // print_r($_COOKIE);

    // if(signup( "deepak", "password", "deepak@gmail.com", "1234567890")) {
    //     echo "Success";
    // } else {
    //     echo "not works!";
    // }


    $mic1 = new mic();
    $mic2 = new mic();

    $mic1->light = "RGB";
    $mic1->setLight("White");

    $conn = Database::getConnection();
    $conn = Database::getConnection();

    
?>

</pre>