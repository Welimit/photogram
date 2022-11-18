<?php

 $time = microtime(true);
 $options = [
    'cost' => 9,
 ];
 echo password_hash("rasmuslerdorf" , PASSWORD_BCRYPT, $options);
 echo "\nTook  " . (microtime(true) - $time). "sec";