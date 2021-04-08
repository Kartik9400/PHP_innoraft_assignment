<?php
require 'Giphy.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Giphy API</title>
</head>
<body>
<?php
    $giphy = new Giphy();
    $giphy->getGiphy();
?>

</body>
</html>
