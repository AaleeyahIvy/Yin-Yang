<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<?php
    
    include('../config/db.php');
    require_once '../vendor/autoload.php';
    
    //Global messages for errors
    //global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    //global $userNameEmptyErr, $emailEmptyErr, $phoneEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;

    //Empty before inserted
    //$username = $email = $phone = $password = "";

    // get the data from the form
    //if(isset($_POST["sign-up"])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //$email_check_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
    //$rowCount = mysqli_num_rows($email_check_query);

    /*if(!empty($fullname) && !empty($username) && !empty($email) && !empty($phone) && !empty($password)){
            
      // check if user email already exist
      if($rowCount > 0) {
          $email_exist = '
              <div class="alert alert-danger" role="alert">
                  User with email already exist!
              </div>';
      }
          if(!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
            $fullNameErr = '<div class="alert alert-danger">
                    Only letters and white space allowed.
                </div>';
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = '<div class="alert alert-danger">
                    Email format is invalid.
                </div>';
        }
        if(!preg_match("/^[0-9]{10}+$/", $phone)) {
            $phoneErr = '<div class="alert alert-danger">
                    Only 10-digit mobile numbers allowed.
                </div>';
        }
        if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password)) {
            $passwordErr = '<div class="alert alert-danger">
                     Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                </div>';
      } else {  */
          // clean the form data before sending to database
          $fullname = mysqli_real_escape_string($conn, $fullname);
          $username = mysqli_real_escape_string($conn, $username);
          $email = mysqli_real_escape_string($conn, $email);
          $phone = mysqli_real_escape_string($conn, $phone);
          $password = mysqli_real_escape_string($conn, $password);

          // Store the data in db, if all the preg_match condition met
          /*if((preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $username)) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $phone)) && 
           (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password))){
*/
              // Generate random activation token
              $token = md5(rand().time());

              // Password hash
              $password_hash = password_hash($password, PASSWORD_BCRYPT);

              // Query
              $sql = "INSERT INTO users1 (fullname, email, phone, username, password, token, is_active, date_time) 
              VALUES ('{$fullname}', '{$email}', '{$phone}', '{$username}', '{$password_hash}', '{$token}', '0', now())";
              
              // Create mysql query
              $sqlQuery = mysqli_query($conn, $sql);
              
              if(!$sqlQuery){
                  die("MySQL query failed!" . mysqli_error($conn));
              } 

              // Send verification email
              if($sqlQuery) {
                $to = $email;
                $subject = "Simple Email Test via PHP";
                $body = "Hi,nn This is test email send by PHP Script";
                $headers = "From: sender\'s email";
                if(mail($to, $subject, $body, $headers)){
                    echo "Message sent to" . $_SESSION["email"];
              } else {
                echo "Message not sent to" . $_SESSION["email"];
              }
            }
          //}
  /*} else {
      if(empty($fullname)){
          $fullNameEmptyErr = '<div class="alert alert-danger">
              Full name can not be blank.
          </div>';
      }
      if(empty($email)){
          $emailEmptyErr = '<div class="alert alert-danger">
              Email can not be blank.
          </div>';
      }
      if(empty($phone)){
          $mobileEmptyErr = '<div class="alert alert-danger">
              Mobile number can not be blank.
          </div>';
      }
      if(empty($password)){
          $passwordEmptyErr = '<div class="alert alert-danger">
              Password can not be blank.
          </div>';
      }            
  } 
    } */
    //header("Location:../app.html");
    // Close conn
    mysqli_close($conn);
    ?>
    <main>
    </main>
</body>
</html>