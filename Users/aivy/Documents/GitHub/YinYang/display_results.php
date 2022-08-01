<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $name = filter_input(INPUT_POST, 'fullname');
    $phone = filter_input(INPUT_POST, 'phone');

    $conn = mysqli_connect("localhost", "root", "");
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $name = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    $sql = "INSERT INTO Users VALUES ('$name', '$email', '$phone')";

    if(mysqli_query($conn, $sql)){
        echo nl2br("\n$name \n$phone \n $email");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
    ?>

?>
    <main>
        <h1>Everything looks good!</h1>
        <label>Full Name:</label>
        <span><?php echo htmlspecialchars($fullname);?></span><br>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email);?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone);?></span><br> 

        <button><a href="app.html">Go to App</a></button>
    </main>
</body>
</html>

