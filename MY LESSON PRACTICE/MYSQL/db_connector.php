<?php

    //variable = function db connect('technology', 'db username', 'empty password', 'db')
    $connection = mysqli_connect('localhost', 'root', '', 'loginapp');
    
    if($connection)
    {
//        echo "We are connected";
    }
    else
    {
        die("Database connection failed");
    }

?>