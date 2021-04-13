<?php
require 'AdminCredential.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>login credential</title>
  <style type="text/css">
    a{
      text-decoration: none;
    }
    form{
      margin: auto;
      margin-top: 48px;
      border: 1px solid black;
      width: 192px;
      padding: 10px;
    }
  </style>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Username: <input type = "text" name = "user" required/>
    <br><br>
    Password: <input type="password" name="password" required/>
    <br><br>
    <input type="submit" name="submit" value="Submit">&nbsp;
    <input type="submit" name="submit" value="Add admin"><br><br>
  </form>
  <?php
    if (isset($_POST['submit'])
        and $_REQUEST['submit']=='Submit'
        and isset($_POST['user'])
        and isset($_POST['password'])
    ) {
        $check = new AdminCredential();
        $check->check($_POST['user'], $_POST['password']);
    }
    ?>
  <?php
    if (isset($_POST['submit'])
        and $_REQUEST['submit']=='Add admin'
        and isset($_POST['user'])
        and isset($_POST['password'])
    ) {
        $check = new AdminCredential();
        $check->addAdmin($_POST['user'], $_POST['password']);
    }
    ?>
</body>
</html>
