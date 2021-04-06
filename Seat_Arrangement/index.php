<?php
  require 'SeatArrangement.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Girl: <input type="textbox" name="girl">
    Boy: <input type="textbox" name="boy">
    <input type="submit" name="submit">
  </form>

  <?php
    if (isset($_POST['submit'])) {
        $arrangement = new SeatArrangement($_POST['girl'], $_POST['boy']);
    }
    ?>
</body>
</html>
