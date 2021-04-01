<?php
  require 'Products.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Sorted array:
    <input type="submit" name="submit">
  </form>

  <?php
    if (isset($_POST['submit'])) {
        $product = new Products();
    }
    ?>
</body>
</html>
