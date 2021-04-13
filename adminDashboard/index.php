<?php
require 'CheckCredential.php';
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
    Favourite book: <input type="textbox" name="book"/>
    <br><br>
    <input type="submit" name="submit" value="Submit">&nbsp;
    <input type="submit" name="submit" value="Signup"><br><br>
  </form>
  <?php
    if ($_REQUEST['submit']=='Submit'
        and isset($_POST['user'])
        and isset($_POST['password'])
    ) {
        $check = new CheckCredential();
        $check->check($_POST['user'], $_POST['password'], $_POST['book']);
    }
    ?>
  <?php
    if ($_REQUEST['submit']=='Signup'
        and isset($_POST['user'])
        and isset($_POST['password'])
        and isset($_POST['book'])
    ) {
        $check = new CheckCredential();
        $check->addUser($_POST['user'], $_POST['password'], $_POST['book']);
    }
    ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <input type="submit" name="submit" value="Forget password"><br><br>
  </form>
  <?php
    if ($_REQUEST['submit']=='Forget password') {
        header("Location: ForgetPassword.php");
    }
    ?>
</body>
</html>
