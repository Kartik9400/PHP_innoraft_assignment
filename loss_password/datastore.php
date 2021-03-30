<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    $_SESSION["kartik"] = array("kk@IR", "Maths");
    $_SESSION["kunal"] = array("ku@IR", "Hindi");
    $_SESSION["arjak"] = array("ar@IR", "English");
    $_SESSION["hemant"] = array("he@IR", "Science");
    $_SESSION["kaushik"] = array("ka@IR", "SST");
    ?>
</body>
</html>
