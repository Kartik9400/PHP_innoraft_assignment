<?php
require 'Github.php';
require 'Oauth2Google.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>login form</title>
</head>
<body>
  <?php
    if (! isset($_GET['code'])) {
        $googleURI = new Oauth2Google();
        $url1 = $googleURI->getUrl();
        $githubURI = new Github();
        $url2 = $githubURI->goToAuthUrl();
        echo "<a  href = '". $url1 ."'><h2>Google Login</h2></a>";
        echo "<br><br>";
        echo "<a  href = '". $url2 ."'><h2>Github Login</h2></a>";
    }
    ?>

</body>
</html>
