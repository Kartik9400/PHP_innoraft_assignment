<?php
  /**
   * [@file new password changes user password temporarely]
   */
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    New Password: <input type="textbox" name="password"><br><br>
    <input type="submit" name="submit">
  </form>

  <?php
    if (isset($_POST["submit"])) {
        $_SESSION[$_SESSION["tmp_user"]][0] = $_POST["password"];
        echo "password is succesfully changed";
    }
    ?>
</body>
</html>
