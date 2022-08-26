<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    include('../config/db.php');
    require_once '../vendor/autoload.php';

    //Global messages for errors
    global $success_msg, $email_exist;
    global $email_verify_err, $email_verify_success;

    //Empty before inserted
    //$username = $email = $phone = $password = "";

    // get the data from the form
    //if(isset($_POST["sign-up"])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Session variables
    $_SESSION["username"] = $username;
    $_SESSION["email"]= $email;
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
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = '<div class="alert alert-danger">
                    Email format is invalid.
                </div>';
        }
          // clean the form data before sending to database
          

          // Store the data in db, if all the preg_match condition met
          /*if((preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $username)) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $phone)) && 
           (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password))){
*/
            $fullname = mysqli_real_escape_string($conn, $fullname);
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $phone = mysqli_real_escape_string($conn, $phone);
            $password = mysqli_real_escape_string($conn, $password);
              // Generate random activation token
              $token = md5(rand().time());

              // Password hash
              $password_hash = password_hash($password, PASSWORD_BCRYPT);

              // Query
              $sql = "INSERT INTO users (fullname, email, phone, username, password, token, is_active, date_time) 
              VALUES ('{$fullname}', '{$email}', '{$phone}', '{$username}', '{$password_hash}', '{$token}', '0', now())";
              
              // Create mysql query
              $sqlQuery = mysqli_query($conn, $sql);
              
              if(!$sqlQuery){
                  die("MySQL query failed!" . mysqli_error($conn));
              } 
                
              // Send verification email
              if($sqlQuery) {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = 'aaleeyah@yinyangapp.com';
                $mail->Password = 'dkopxyljgzbkoqlw'; //Set up 2-step authentication and use the app super password given by google admin //remember to hide this when published to github
                $mail->addReplyTo('austin@yinyangapp.com');
                $mail->addAddress($email);
                $mail->setFrom('aaleeyah@yinyangapp.com', 'Yin Yang Admin/Developer');
                $mail->Subject = 'Email Verification';
                $mail->isHTML(true);      
                $mail->msgHTML('<html>
                <body style="height: 600px; width:600px; margin:auto;">
                    <h1 style="background-image:linear-gradient(to right, #eea2a2 0%, #bbc1bf 19%, #57c6e1 42%, #b49fda 79%, #7ac5d8 100%); text-align:center;"> Welcome, ' . $username . '</h1>
                    <p>Thanks for signing up to the yin yang app, we appreciate the support and hope you enjoy your stay.
                        To get started please verify your email: yinyangapp.com/verify:token113242424
                    </p>
                    <footer style="position:fixed; left:0; bottom:0; width:100%; text-align:center;">
                    <hr>
                    <div style="font-weight:bold"><a href="www.yinyangapp.com">Yin Yang App 2022</a></div>
                    <div>Thank you for supporting us</div>
                    <div>Follow us on social media</div>
                    <div><a href="www.github.com/yinyangapp">Our github repo!Github</a> <a href="www.instagram.com/yinyangapp">Instagram</a></div>
                    <hr>
                    </footer>
                </body>
            </html>');
                $mail->AltBody = 'This is a plain-text message body';
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message was sent to ' . $email;
            }
         }
         //always use https://www.mail-tester.com to check emails that arent received :)
    //uncomment the header to show debugging page!!!
    //header("Location:../app.html");
    // Close conn
    mysqli_close($conn);
    ?>
    <main>
    </main>
</body>
</html>
