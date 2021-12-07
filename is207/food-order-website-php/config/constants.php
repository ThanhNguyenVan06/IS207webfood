<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/is207/food-order-website-php/');
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass ="";
    $dbname  = "food_order";
    if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
    {
        die("Could not connect to my database");
    }


?>