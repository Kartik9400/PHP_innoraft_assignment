<?php
    require 'CreateGist.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Github Gists</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Json data: <input type="textarea" name="json" cols="25" rows="10">
    <input type="submit" name="submit">
  </form>
  <?php
    if (isset($_POST['submit']) and isset($_POST['json'])) {
        $gist = new CreateGist($_POST['json']);
        $gist->create();
    }
    ?>
</body>
</html>
