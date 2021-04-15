<?php
require 'github.php';
session_start();

if (!isset($_GET['code'])) {
    goToAuthUrl();
}
fetchUrl();
getData();
?>
<!DOCTYPE html>
<html>
<head>
  <title>git O auth</title>
</head>
<body>
  <button><a href="Logout.php">Logout</a></button>

</body>
</html>
