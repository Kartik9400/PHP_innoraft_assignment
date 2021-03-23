<?php
  include "PHPMailer.php";

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method="post" action="">
    Email: <input type="email" name="email" value="<?php echo $email; ?>" /><br><br>
    <input type="submit" name="submit"/>
  </form>
  <?php
    if(isset($_POST["submit"])){
      $email = $_POST["email"];
        $mail->addAddress($email, 'Mailer');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
          }
      }
    ?>
</body>
</html>
