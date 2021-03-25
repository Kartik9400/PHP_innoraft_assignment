<?php
  include "../Class/AddMarksField.php";
  include '../Class/ImageUpload.php';
  include '../Class/NameValidation.php';
  include '../Class/PhoneValidation.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../Class/style.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="../Class/custom.js"></script>
</head>
<body>
  <?php
    if (isset($_POST["submit"])){
      $fname= new NameValidation($_POST["fname"]);
      $lname= new NameValidation($_POST["lname"]);


      $tmp_path = $_FILES["fileToUpload"]["tmp_name"];
      $img_name = $_FILES["fileToUpload"]["name"];
      $img_file = new ImageUpload($tmp_path, $img_name);


      $marks = new AddMarksField($_POST["marks"]);


      $phone = new PhoneValidation($_POST["mobileNumber"]);

    }
  ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype = "multipart/form-data">
    First name :<input type = "textbox" name = "fname" id = "fname" value="<?php echo $fname->value; ?>" required><span class="Error">* <?php echo $fname->Err;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" id = "lname"value="<?php echo $lname->value; ?>" required><span class="Error">* <?php echo $lname->Err;?></span><br><br>
    Full name :<input type = "textbox" name = "fullname" id = "fullname" value = "<?php echo $fname->value.' '.$lname->value;?>"readonly><br><br>
    Image :<input type="file" name = "fileToUpload" id="fileToUpload" required><span class="Error">* <?php echo $img_file->Err;?></span><br><br>
    Marks(subject|number):<textarea name="marks" row = "50" cols="50"><?php print_r($_POST["marks"]); ?></textarea><br><br>
    Mobile number:<input type="tel" name = "mobileNumber" value="<?php echo $phone->value; ?>" required><span class = "Error">* <?php echo $phone->Err ?></span><br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>

  <?php
    echo "Hello ";
    echo $fname->value.' '.$lname->value;
    echo "<br>";

    echo "<img src='".$img_file->path ."' width='100'>";
    echo "<br>";

    $marks->output();
    echo "<br>";

    $phone->output();
  ?>


</body>
</html>
