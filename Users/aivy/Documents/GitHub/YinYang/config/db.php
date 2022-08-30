<?php 
    //enable headers
    ob_start();

    $hostname = "yinyangdb";
    $username = "root";
    $password = "Ilovepastel16";
    $dbname = "users";
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.");
?>