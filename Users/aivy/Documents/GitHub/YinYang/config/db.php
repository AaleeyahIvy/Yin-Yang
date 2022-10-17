<?php 
    //enable headers
    ob_start();

    if (!isset($_SESSION)) {
        session_start();
     }

    $hostname = "yinyangdb";
    $username = "root";
    $password = "Ilovepastel16";
    $dbname = "users";
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")

/*ALTER TABLE friends	
ADD CONSTRAINT FK_UserID
FOREIGN KEY (userID) REFERENCES users (userID),
ADD CONSTRAINT FK_FriendID
FOREIGN KEY (friendID) REFERENCES users (userID);*/
?>