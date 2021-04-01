<?php
  include "PHPMail.php";
  include "EmailValidation.php"
?>
<!DOCTYPE html>
<html>
<head>
  <title>Send a thankyou mail</title>
</head>
<body>
  <form method="post" action="">
    Email: <input type="email" name="email" value="<?php echo $_POST["email"]; ?>" /><br><br>
    <input type="submit" name="submit"/>
  </form>
  <?php
    if(isset($_POST["submit"])){
      $email = new EmailValidation($_POST["email"]);
      if($email->validate()){
            $mail = new PHPMail;
            $mail->sentto($_POST["email"]);
      } else {
        echo "fill a valid email";
      }
    }
    ?>
</body>
</html>
