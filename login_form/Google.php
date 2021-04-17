<?php
require 'Oauth2Google.php';
require 'ConnectDB.php';

session_start();
// $client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$googleFetch = new Oauth2Google();
if (!isset($_SESSION['access_token']) || !$_SESSION['access_token']) {
    $_SESSION['access_token'] = $googleFetch->getAccessCode($_GET['code']);
}
$user = $googleFetch->getData($_SESSION['access_token']['access_token']);
$db = new ConnectDB();
$db->checkUser($user['name'], $user['email']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>google O auth</title>
</head>
<body>
  <button><a href="Logout.php">Logout</a></button>

</body>
</html>
