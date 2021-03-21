<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    a{
      text-decoration: none;
    }
    form{
      margin: auto;
      margin-top: 48px;
      border: 1px solid black;
      width: 192px;
      padding: 10px;
    }
  </style>
</head>
<body>
  <form method = "post">
    Username: <input type = "text" name = "user" value = "<?php echo $_POST["user"]; ?>" required/>
    <br><br>
    Password: <input type="password" name="password" required/>
    <br><br>
    <input type="submit" name="submit">
  </form>
  <?php
    $path1 = "/phpbasicass1.php";
    $path2 = "/phpbasicass2.html";
    $path3 = "/phpbasicass3";
    $path4 = "/phpbasicass4";
    $path5 = "/phpbasicass5";
    $path6 = "/phpbasicass6.php";
    if (isset($_POST["submit"])) {
        $user = strtolower($_POST["user"]);
        // echo $_SESSION[$user];
        // echo "if";
        if($_SESSION[$user] == $_POST["password"]){
          echo "<a href='$path1' target='_blank' name = 'q=1'>q=1</a><br>";
          echo "<a href='$path2' target='_blank' name = 'q=2'>q=2</a><br>";
          echo "<a href='$path3' target='_blank' name = 'q=3'>q=3</a><br>";
          echo "<a href='$path4' target='_blank' name = 'q=4'>q=4</a><br>";
          echo "<a href='$path5' target='_blank' name = 'q=5'>q=5</a><br>";
          echo "<a href='$path6' target='_blank' name = 'q=6'>q=6</a><br>";
        } else {
          echo "username aur password is wrong";
          // /echo "else";
        }
      }
    ?>
</body>
</html>
