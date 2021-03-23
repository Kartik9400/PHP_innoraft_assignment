<?php
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try{
  //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kartikgoyal9april@gmail.com';                     //SMTP username
    $mail->Password   = 'Kartik123#';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption;
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for
    $mail->setFrom('kartik.goyal@innoraft.com', 'Mailer');

    $mail->Subject = 'PHPMailer GMail SMTP test';
    $mail->Body    = 'Welcome <br> Thankyou for using my script';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
