<?php
session_start();
include 'LoginDetail.php';
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
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Username: <input type = "text" name = "user" value = "<?php echo $_POST["user"]; ?>" required/>
    <br><br>
    Password: <input type="password" name="password" required/>
    <br><br>
    <input type="submit" name="submit">
    <!-- <input type = "submit" name = "ForgetPassword" value="Forget password"> -->
  </form>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <input type = "submit" name = "ForgetPassword" value="Forget password">
  </form>
  <?php
    if (isset($_POST["ForgetPassword"])) {

        header("Location:ForgetPassword.php");
    }
   ?>
  <?php
    $path1 = "../../phpbasicass1";
    $path2 = "../../phpbasicass2";
    $path3 = "../../phpbasicass3";
    $path4 = "../../phpbasicass4";
    $path5 = "../../phpbasicass5";
    $path6 = "../../phpbasicass6";
    if (isset($_POST["submit"])) {
        $login = new LoginDetail($_POST["user"], $_POST["password"]);
        if($login){
          if($_GET["q"]==1){
            header("Location:$path1");
          } elseif($_GET["q"]==2){
            header("Location:$path2");
          } elseif($_GET["q"]==3){
            header("Location:$path3");
          } elseif($_GET["q"]==4){
            header("Location:$path4");
          } elseif($_GET["q"]==5){
            header("Location:$path5");
          } elseif($_GET["q"]==6){
            header("Location:$path6");
          } else{
          echo "<a href='$path1' target='_blank'>q=1</a><br>";
          echo "<a href='$path2' target='_blank'>q=2</a><br>";
          echo "<a href='$path3' target='_blank'>q=3</a><br>";
          echo "<a href='$path4' target='_blank'>q=4</a><br>";
          echo "<a href='$path5' target='_blank'>q=5</a><br>";
          echo "<a href='$path6' target='_blank'>q=6</a><br>";
        }
        } else {
          echo "username aur password is wrong";
        }
      }
    ?>

</body>
</html>
