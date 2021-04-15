<?php
require 'Information.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Information from script</title>
  <style type="text/css">
    body{
        background-color: skyblue;
      }
  </style>
</head>
<body>
  <?php
    $info = new Information;
    $info->detectOS();
    $info->detectBrowser();
    $info->request();
    ?>
</body>
</html>
