<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<?php
    // get the data from the form
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    //DONT FORGET TO BLANK THESE VALUES OUT// 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = "iloveyou16!";
    $dbtable = "users";

    $conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbtable);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
    $result = mysql_query($sql);
    $count = mysql_num_rows($result);
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        echo '<button class="connectbtn"><a href="app.html">Go to App</a></button>';
        echo '<h1>Everything looks good!</h1><br>';
        header('Location:app.html');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    // Close connection
    mysqli_close($conn);
    ?>
    <main>
        <h1>Everything looks good!</h1><br>

        <label>Username:</label>
        <span><?php echo htmlspecialchars($username);?></span><br> 

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password);?></span><br> 
    </main>
</body>
</html>

