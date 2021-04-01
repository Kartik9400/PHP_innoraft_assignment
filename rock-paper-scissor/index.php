<?php
  /**
   * @file [Attached the required class]
   */
  require "ComputerRPS.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <!-- input from the user -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Input{r/p/s}: <input type="textbox" name="RPS" />
    <input type="submit" name="submit">
  </form>

  <!-- php process -->
  <?php

    if (isset($_POST["submit"])) {
        $RPS = new ComputerRPS();
        if (isset($RPS) and $RPS->validate($_POST["RPS"])) {
            $RPS->check($_POST["RPS"]);
        } else {
            echo "entered wrong value";
        }
    }
    ?>
</body>
</html>
