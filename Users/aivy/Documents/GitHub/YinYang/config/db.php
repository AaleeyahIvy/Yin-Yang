<?php 
    // Enable us to use Headers
    ob_start();
    // Set sessions
    if(!isset($_SESSION)) {
       session_start();
    }
    $hostname = "ab459c5457bb";
    $username = "root";
    $password = "Ilovepastel16";
    $dbname = "users";
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")
?>