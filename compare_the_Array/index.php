<?php
  require 'Compare.php';
  require 'CreateArr.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Row1: <input type="number" name="row1" value="<?php echo $_POST['row1']; ?>" required><br><br>
    Column1: <input type="number" name="column1" value="<?php echo $_POST['column1']; ?>" required><br><br>

    Row2: <input type="number" name="row2" value="<?php echo $_POST['row2']; ?>" required><br><br>
    Column2: <input type="number" name="column2" value="<?php echo $_POST['column2']; ?>" required><br><br>
    <input type="submit" name="submit">
  </form>
  <?php
    if (isset($_POST["submit"])) {
        $createArr1 = new CreateArr($_POST["row1"], $_POST["column1"]);
        $Arr1 = $createArr1->putValue();

        $createArr2 = new CreateArr($_POST["row2"], $_POST["column2"]);
        $Arr2 = $createArr2->putValue();
        // var_dump($Arr);
        $compare = new Compare($Arr1, $Arr2);
        $compare->diff();
    }
    ?>

</body>
</html>
