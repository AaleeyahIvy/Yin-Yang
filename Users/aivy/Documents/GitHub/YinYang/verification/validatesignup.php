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
    global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    global $userNameEmptyErr, $emailEmptyErr, $phoneEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;

    //Empty before inserted
    $username = $email = $phone = $password = "";

    // get the data from the form
    if(isset($_POST["submit"])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $email_check_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
    $rowCount = mysqli_num_rows($email_check_query);

    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobilenumber) && !empty($password)){
            
      // check if user email already exist
      if($rowCount > 0) {
          $email_exist = '
              <div class="alert alert-danger" role="alert">
                  User with email already exist!
              </div>
          ';
      } else {
          // clean the form data before sending to database
          $fullname = mysqli_real_escape_string($conn, $fullname);
          $username = mysqli_real_escape_string($conn, $username);
          $email = mysqli_real_escape_string($conn, $email);
          $phone = mysqli_real_escape_string($conn, $phone);
          $password = mysqli_real_escape_string($conn, $password);

          // perform validation
          if(!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
              $fullNameErr = '<div class="alert alert-danger">
                      Only letters and white space allowed.
                  </div>';
          }
          if(!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $userNameErr = '<div class="alert alert-danger">
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
          }
          
          // Store the data in db, if all the preg_match condition met
          if((preg_match("/^[a-zA-Z ]*$/", $username)) && (preg_match("/^[a-zA-Z ]*$/", $fullname)) &&
           (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $phone)) && 
           (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password))){

              // Generate random activation token
              $token = md5(rand().time());

              // Password hash
              $password_hash = password_hash($password, PASSWORD_BCRYPT);

              // Query
              $sql = "INSERT INTO users (fullname, email, phone, username, password, token, is_active,
              date_time) VALUES ('{$fullname}', '{$email}', '{$phone}', '{$username}', '{$password}', '{$password_hash}', 
              '{$token}', '0', now())";
              
              // Create mysql query
              $sqlQuery = mysqli_query($conn, $sql);
              
              if(!$sqlQuery){
                  die("MySQL query failed!" . mysqli_error($conn));
              } 

              // Send verification email
              if($sqlQuery) {
                  $msg = 'Click on the activation link to verify your email. <br><br>
                    <a href="http://localhost:8888/php-user-authentication/user_verificaiton.php?token='.$token.'"> Click here to verify email</a>
                  ';

                  // Create the Transport
                  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                  ->setUsername('your_email@gmail.com')
                  ->setPassword('your_email_password');

                  // Create the Mailer using your created Transport
                  $mailer = new Swift_Mailer($transport);

                  // Create a message
                  $message = (new Swift_Message('Please Verify Email Address!'))
                  ->setFrom([$email => $username])
                  ->setTo($email)
                  ->addPart($msg, "text/html")
                  ->setBody('Hello! User');

                  // Send the message
                  $result = $mailer->send($message);
                    
                  if(!$result){
                      $email_verify_err = '<div class="alert alert-danger">
                              Verification email coud not be sent!
                      </div>';
                  } else {
                      $email_verify_success = '<div class="alert alert-success">
                          Verification email has been sent!
                      </div>';
                  }
              }
          }
      }
  } else {
      if(empty($fullname)){
          $fullNameEmptyErr = '<div class="alert alert-danger">
              First name can not be blank.
          </div>';
      }
      if(empty($username)){
          $userNameEmptyErr = '<div class="alert alert-danger">
              Last name can not be blank.
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
    }
    header("Location: YinYang/app.html");
    // Close conn
    mysqli_close($conn);
    ?>
    <main>
    </main>
</body>
</html>