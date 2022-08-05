
<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<?php
    // get the data from the form
    $username = mysqli_real_escape_string($_POST['username']); 
    $password = mysqli_real_escape_string($_POST['password']); 

    //DONT FORGET TO BLANK THESE VALUES OUT// 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = "iloveyou16!";
    $dbtable = "users";

    $conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbtable);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo '<button class="connectbtn"><a href="app.html">Go to App</a></button>';
        echo '<h1>Everything looks good!</h1><br>';
        header("location:app.html");
    
    } else {

        echo "Wrong Username or Password";
        
        // redirect to login page
        header("location:signin.html");
    }
    /*if($conn === false){
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
    // Close connection*/
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

