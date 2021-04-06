<?php
  include 'FormTable.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Row: <input type="number" name="row" value = "<?php echo $_POST["row"]; ?>">
    Column: <input type="number" name="column" value = "<?php echo $_POST["column"]; ?>">
    <input type = "submit" name = "submit">
  </form>

  <?php
    if (isset($_POST["submit"]) and isset($_POST['row']) and isset($_POST['column'])) {
        $tble = new FormTable($_POST["row"], $_POST["column"]);
        $tble->view();
    }
    ?>
</body>
</html>
