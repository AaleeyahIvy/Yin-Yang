<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<?php

    include('../config/db.php');

    // get the data from the form
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']); 
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']); 

    //$conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbtable);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        header("Location:app.html");
    
    } else {
        echo "Wrong Username or Password";
        // redirect to login page
        header("Location:signin.php?msg=failed");
        
    }

    // Close connection
    mysqli_close($conn);
    ?>
<main>
    
</main>
</body>
</html>

