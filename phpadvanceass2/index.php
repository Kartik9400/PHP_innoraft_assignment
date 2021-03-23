<?php
  include "PHPMail.php";
  include "emailvalidation.php"
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method="post" action="">
    Email: <input type="email" name="email" value="<?php echo $_POST["email"]; ?>" /><br><br>
    <input type="submit" name="submit"/>
  </form>
  <?php
    if(isset($_POST["submit"])){

      $email = new emailvalidation($_POST["email"]);
      // var_dump($email);
      // echo $email->validate();
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
