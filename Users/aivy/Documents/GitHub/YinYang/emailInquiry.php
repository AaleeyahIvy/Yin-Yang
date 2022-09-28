<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    include('../config/db.php');
    require_once '../vendor/autoload.php';

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
                $mail->Subject = 'YinYang Inquiry';
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message was sent to ' . $email;
            }
?>
<!DOCTYPE Html>
<html>
    
</html>
