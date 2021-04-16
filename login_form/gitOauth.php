<?php
require 'Github.php';
session_start();

$gitfetch = new GitHub();
if (!isset($_SESSION['access_token'])) {
    $_SESSION['access_token'] = $gitfetch->getAccessToken($_GET['code']);
}
$data = $gitfetch->getData();


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
