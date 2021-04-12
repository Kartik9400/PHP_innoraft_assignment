<?php
require 'CheckCredential.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>forget password</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Username: <input type = "text" name = "user" required/>
    <br><br>
    Favourite book: <input type="textbox" name="book"/>
    <br><br>
    <input type="submit" name="submit" value="Submit">
    <br><br>
  </form>
  <?php
    if ($_REQUEST['submit']=='Submit'
        and isset($_POST['user'])
        and isset($_POST['book'])
    ) {
        $book = new CheckCredential();
        $book->checkBook($_POST['user'], $_POST['book']);
    }
    ?>
</body>
</html>
