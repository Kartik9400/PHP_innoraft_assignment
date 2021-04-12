<?php
require 'CheckCredential.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>ToDo List</title>
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
    <input type="submit" name="submit" value="Add user"><br><br>
  </form>
  <?php
    if ($_REQUEST['submit']=='Submit'
        and isset($_POST['user'])
        and isset($_POST['password'])
    ) {
        $check = new CheckCredential();
        $check->check($_POST['user'], $_POST['password']);
    }
    ?>
  <?php
    if ($_REQUEST['submit']=='Add user'
        and isset($_POST['user'])
        and isset($_POST['password'])
    ) {
        $check = new CheckCredential();
        $check->addUser($_POST['user'], $_POST['password']);
    }
    ?>
</body>
</html>
