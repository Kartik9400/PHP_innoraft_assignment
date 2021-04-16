<?php
require 'Github.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>login form</title>
</head>
<body>
  <a href = 'google.php'>Signin with google</a>
  <?php
    if (!isset($_GET['code'])) {
        $githubURI = new Github();
        $url = $githubURI->goToAuthUrl();
        echo "<a  href = '". $url ."'><h2>Github Login</h2></a>";
    }
    ?>

</body>
</html>
