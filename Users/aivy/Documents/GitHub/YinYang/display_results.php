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
        echo '<button class="connectbtn"><a href="app.html">Go to App</a></button>';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    // Close connection
    mysqli_close($conn);


    ?>
    <main>
        <h1>Everything looks good!</h1>
        <label>Full Name:</label>
        <span><?php echo htmlspecialchars($fullname);?></span><br>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email);?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone);?></span><br> 

        <label>Username:</label>
        <span><?php echo htmlspecialchars($username);?></span><br> 

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password);?></span><br> 
    </main>
</body>
</html>

