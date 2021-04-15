<?php
require 'github.php';
session_start();

if (!isset($_GET['code'])) {
    goToAuthUrl();
}
$access_token = getAccessToken($_GET['code']);
echo apiRequest($access_token);
//fetchUrl();
//getData();
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
