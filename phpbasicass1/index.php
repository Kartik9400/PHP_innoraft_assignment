<?php
  include 'NameValidation.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="custom.js"></script>
</head>
<body>
  <?php
  $firstname = $lastname = "";
  $fnameErr = $lnameErr = "";
      if(isset($_POST["submit"])){
        $fname= new NameValidation($_POST["fname"]);
        $lname= new NameValidation($_POST["lname"]);
        // var_dump($fname);
        $firstname = $fname->value;
        $lastname = $lname->value;
        $fnameErr = $fname->Err;
        $lnameErr = $lname->Err;
      }

    ?>
  <p class="Error">* required field</p>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype = "multipart/form-data">
    First name :<input type = "textbox" name = "fname" id = "fname" value="<?php echo $firstname; ?>" ><span class="Error">* <?php echo $fnameErr;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" id = "lname"value="<?php echo $lastname; ?>" ><span class="Error">* <?php echo $lnameErr;?></span><br><br>

    Full name :<input type = "textbox" name = "fullname" id = "fullname" value = "<?php echo $firstname.' '.$lastname;?>"readonly><br><br>
    <input type = "submit" name = "submit" id = "submit" value = "Submit"><br><br>
    </form>

  <?php
  if(isset($_POST["submit"])){
    if($fname->value or $lname->value){
      echo "Hello ";
    }

    echo $fname->value.' '.$lname->value;
  }
  ?>
</body>
</html>
