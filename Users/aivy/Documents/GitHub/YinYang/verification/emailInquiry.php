<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require '../vendor/PHPMailer/src/Exception.php';
    require '../vendor/PHPMailer/src/PHPMailer.php';
    require '../vendor/PHPMailer/src/SMTP.php';
    require '../vendor/autoload.php';


    $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->CharSet = PHPMailer::CHARSET_UTF8;
                $mail->addReplyTo($_POST['email']);
                $mail->Username = "aaleeyah@yinyangapp.com";
                $mail->Password = "kjypuejrooikyrsn";
                $mail->addAddress('austin@yinyangapp.com');
                $mail->setFrom('aaleeyah@yinyangapp.com', 'Yin Yang Admin/Developer');
                $mail->Subject = 'YinYang Inquiry';
                $mail->Body = "Inquiry" . $_POST['inquiry'];
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message was sent to ' . $_POST['email'];;
            }
?>
<!DOCTYPE html>
<html>
    <p>Message Sent...!</p>
</html>
