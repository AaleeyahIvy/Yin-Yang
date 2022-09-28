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
                $mail->CharSet = PHPMailer::CHARSET_UTF8;
                $mail->addReplyTo($email);
                $mail->addAddress($email);
                $mail->setFrom('aaleeyah@yinyangapp.com', 'Yin Yang Admin/Developer');
                $mail->Subject = 'YinYang Inquiry';
                $mail->Body = "Inquiry" . $inquiry;
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message was sent to ' . $email;
            }
?>
<!DOCTYPE html>
<html>
    
</html>
