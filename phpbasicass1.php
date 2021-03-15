<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .Error{
      color: red;
    }
  </style>
</head>
<body>
  <?php
    $fname=$lname=$fullname="";
    $fnameErr=$lnameErr="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_POST["fname"])){
        $fnameErr = "First Name is required";
      } else{
        $fname = $_POST["fname"];
        if(!preg_match("/^[a-zA-Z-' ]*$/", $fname)){
          $fnameErr = "First name contain only alphabetic letter";
        }
      }
      if(empty($_POST["lname"])){
        $lnameErr = "Last Name is required";
      } else {
        $lname = $_POST["lname"];
        if(!preg_match("/^[a-zA-Z-' ]*$/", $lname)){
          $lnameErr = "Last name contain only alphabetic letter";
        }
      }
      if(!empty($_POST["fname"]) && !empty($_POST["lname"])){
        $fullname = $fname." ".$lname;
        if(!preg_match("/^[a-zA-Z' ]*$/",$fullname)){
          $fullname = "";
        }
      }

    }

  ?>
  <p class="Error">* required field</p>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    First name :<input type = "textbox" name = "fname" value="<?php echo $fname; ?>" ><span class="Error">* <?php echo $fnameErr;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" value="<?php echo $lname; ?>" ><span class="Error">* <?php echo $lnameErr;?></span><br><br>
    Full name :<input type = "textbox" name = "fullname" value="<?php echo $fullname;?>" readonly><br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>

  <!-- <script> -->
   <!-- function myFunction() { -->
  <?php
  if(!empty($fullname)){
    echo "Hello ";
  }

  echo $fullname;
  ?>
  <!-- } -->
  <!-- </script> -->
</body>
</html>
