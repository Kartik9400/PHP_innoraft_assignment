<?php
  session_start();
  include 'LossPassword.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Username: <input type = "text" name = "user" value = "<?php echo $_POST["user"]; ?>" required/>
    <br><br>
    Enter your fav subject: <input type="textbox" name="subject" required><br><br>
    <input type="submit" name="submit">
  </form>

  <?php
    if(isset($_POST["submit"])) {
      $_SESSION["tmp_user"] = $_POST["user"];
        $credential = new LossPassword($_POST["user"], $_POST["subject"]);

    }
  ?>
</body>
</html>
