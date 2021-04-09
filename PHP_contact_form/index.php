<?php
require "PHPMail.php";
require "EmailValidation.php"
?>
<!DOCTYPE html>
<html>
<head>
  <title>php contact form</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Name: <input type="name" name="name" required>
    <br><br>
    Mail Address: <input type="email" name="email" required />
    <br><br>
    Message: <textarea name='message' rows = '20' cols = '50'></textarea><br><br>
    <input type="submit" name="submit" required/>
  </form>
  <?php
    if (isset($_POST["submit"])) {
        $email = new EmailValidation($_POST["email"]);
        if ($email->validate()) {
              $mail = new PHPMail;
              $mail->sentto($_POST["email"], $_POST['message'], $_POST['name']);
        } else {
            echo "fill a valid email";
        }
    }
    ?>
</body>
</html>
