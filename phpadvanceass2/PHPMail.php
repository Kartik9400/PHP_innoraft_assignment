<?php
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';




  //Server settings
  class PHPMail{
    public $mail;
    function __construct() {
      $this->mail = new PHPMailer(true);
      try{
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'kartikgoyal9april@gmail.com';                     //SMTP username
        $this->mail->Password   = 'Kartik123#';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption;
        $this->mail->Port       = 587;                                    //TCP port to connect to, use 465 for
        $this->mail->setFrom('kartik.goyal@innoraft.com', 'Mailer');

        $this->mail->Subject = 'PHPMailer GMail SMTP test';
        $this->mail->Body    = 'Welcome!!! Thankyou for using my script';
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }

    function sentto($email){
      $this->mail->addAddress($email, 'Mailer');
            if (!$this->mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message sent!';
              }
    }
  }

