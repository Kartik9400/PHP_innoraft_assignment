<?php
require 'Twitter.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fetch Twitter Feed</title>
</head>
<body>
  <?php
    $tweet = new Twitter();
    $tweet->showContent();
    ?>
</body>
</html>
