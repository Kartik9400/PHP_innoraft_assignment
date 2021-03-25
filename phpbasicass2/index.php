<?php
  include 'ImageUpload.php';
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
      $fnameErr = $lnameErr = $imgErr = "";
      if(isset($_POST["submit"])){
        $fname= new NameValidation($_POST["fname"]);
        $lname= new NameValidation($_POST["lname"]);
        // var_dump($fname);
        $firstname = $fname->value;
        $lastname = $lname->value;
        $fnameErr = $fname->Err;
        $lnameErr = $lname->Err;

        $tmp_path = $_FILES["fileToUpload"]["tmp_name"];
        $img_name = $_FILES["fileToUpload"]["name"];
        $img_file = new ImageUpload($tmp_path, $img_name);
        $imgErr = $img_file->Err;
      }
    ?>
  <p class="Error">* required field</p>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype = "multipart/form-data">
    First name :<input type = "textbox" name = "fname" id = "fname" value="<?php echo $firstname; ?>" required><span class="Error">* <?php echo $fnameErr;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" id = "lname"value="<?php echo $lastname; ?>" required><span class="Error">* <?php echo $lnameErr;?></span><br><br>
    Full name :<input type = "textbox" name = "fullname" id = "fullname" value = "<?php echo $firstname.' '.$lastname;?>"readonly><br><br>
    Image :<input type="file" name = "fileToUpload" id="fileToUpload" required><span class="Error">*</span><br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>
  <br>
  <?php
    if (isset($_POST["submit"])){
      if($fname->value or $lname->value){
        echo "Hello ";
      }
      echo $fname->value.' '.$lname->value;
      echo "<br>";
      echo "<img src='".$img_file->path ."' width='100'>";
    }
  ?>

</body>
</html>
