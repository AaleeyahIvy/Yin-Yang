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

