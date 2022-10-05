<?php 
    //enable headers
    ob_start();

    $hostname = "yinyangdb";
    $username = "root";
    $password = "Ilovepastel16";
    $dbname = "Test";
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.");
?>