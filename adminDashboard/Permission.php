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
    <input type="submit" name="submit" value="Show pending request"><br><br>
  </form>
  <?php
    if ($_REQUEST['submit']=='Show pending request'
    ) {
        $check = new AdminCredential();
        $check->getRequest();
    }
    ?>
</body>
</html>
