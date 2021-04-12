<?php
require 'CheckCredential.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>forget</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      Enter New Password: <input type="password" name="password" required>
      <input type="submit" name="submit">
  </form>
  <?php
    if (isset($_POST['submit'])) {
        $newPassword = new CheckCredential();
        $newPassword->newPassword($_SESSION['user'], $_POST['password']);
    }
    ?>
</body>
</html>
