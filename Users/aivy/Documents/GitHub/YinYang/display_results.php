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
    
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = "iloveyou16!";
    $dbtable = "users";
    $conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbtable);
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    $sql = "INSERT INTO users VALUES ('$fullname', '$email', '$phone')";
    // Close connection
    mysqli_close($conn);
    echo '<button class="connectbtn"><a href="app.html">Go to App</a></button>'

    ?>
    <main>
        <h1>Everything looks good!</h1>
        <label>Full Name:</label>
        <span><?php echo htmlspecialchars($fullname);?></span><br>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email);?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone);?></span><br> 
    </main>
</body>
</html>

