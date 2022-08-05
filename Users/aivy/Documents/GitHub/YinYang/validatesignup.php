<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<?php
    // get the data from the form
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    //Ensure passwords are not public
    $password = password_hash($password, PASSWORD_BCRYPT);

    //DONT FORGET TO BLANK THESE VALUES OUT// 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = "iloveyou16!";
    $dbtable = "users";

    $conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbtable);
    $sql = "INSERT INTO users VALUES ('$fullname', '$email', '$phone','$username', '$password')";

    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header('Location:app.html');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    // Close connection
    mysqli_close($conn);


    ?>
    <main>
    </main>
</body>
</html>