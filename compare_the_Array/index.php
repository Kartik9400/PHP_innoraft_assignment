<?php
  include 'compare.php';
  include 'createArr.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>compare the arrays</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Row: <input type="number" name="row" value="<?php echo $_POST['row']; ?>" required><br><br>
    Column: <input type="number" name="column" value="<?php echo $_POST['column']; ?>" required><br><br>
    <input type="submit" name="submit">
  </form>
  <?php
    if (isset($_POST["submit"])) {
        $createArr = new createArr($_POST["row"], $_POST["column"]);
        $Arr = $createArr->putValue();
        // var_dump($Arr);
        $compare = new compare($Arr);
        $compare->diff();
    }
    ?>

</body>
</html>
