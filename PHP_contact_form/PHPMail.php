<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

//Server settings
class PHPMail
{
    public $mail;
    /**
     * [__construct complete smtp authentication]
     */
    function __construct()
    {
        $this->mail = new PHPMailer(true);
        try{
            //Enable verbose debug output
            $this->mail->SMTPDebug = 0;
            //Send using SMTP
            $this->mail->isSMTP();
            //Set the SMTP server to send through
            $this->mail->Host       = 'smtp.gmail.com';
            //Enable SMTP authentication
            $this->mail->SMTPAuth   = true;
            //SMTP username
            $this->mail->Username   = 'kartikgoyal9april@gmail.com';
            //SMTP password
            $this->mail->Password   = 'Kartik123#';
            //Enable TLS encryption;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //TCP port to connect to, use 465 for
            $this->mail->Port       = 587;

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /**
     * [confirmation sending a confirmation mail]
     *
     * @param [string] $email [email address of user]
     * @param [string] $name  [user name]
     *
     * @return [null]        []
     */
    function confirmation($email, $name)
    {
        $this->mail->setFrom('kartikgoyal9april@gmail.com', 'Mailer');
        $this->mail->addAddress($email, $name);
        $this->mail->Subject = 'Confirmation Email';
        $this->mail->Body    = 'Mail sent successfully';
        if (!$this->mail->send()) {
            echo 'confirmation Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'confirmation Message sent!';
        }

    }

    /**
     * [sentto message to send to the owner]
     *
     * @param [string] $email   [email of user]
     * @param [string] $message [message to the owner]
     * @param [string] $name    [name of the user]
     *
     * @return [null]          []
     */
    function sentto($email, $message, $name)
    {
        $this->mail->setFrom('kartikgoyal9april@gmail.com', $name);

        $this->mail->addAddress('kartik.goyal@innoraft.com', 'Owner');
        //Address to which recipient will reply
        $this->mail->addReplyTo($email, "Reply");

        $this->mail->Subject = 'PHPMailer GMail SMTP test';
        $this->mail->Body    = $message;
        if (!$this->mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!<br>';
            $this->confirmation($email, $name);
        }
    }
}

