<?php
  include "AddMarksField.php";
  include 'ImageUpload.php';
  include 'NameValidation.php';
  include 'PhoneValidation.php';
  include "EmailValidation.php";

  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>save user info</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="custom.js"></script>
</head>
<body>
  <?php
    $firstname = $lastname = $MarksValue = $PhoneVal = $EmailVal = "";
    $fnameErr = $lnameErr = $imgErr = $PhoneErr = $EmailErr = "";
    if (isset($_POST["submit"])) {

        $fname= new NameValidation($_POST["fname"]);
        $lname= new NameValidation($_POST["lname"]);
        $firstname = $fname->value;
        $lastname = $lname->value;
        $fnameErr = $fname->Err;
        $lnameErr = $lname->Err;
        $_SESSION["FirstName"] = $fname->value;
        $_SESSION["LastName"] = $lname->value;

        $tmp_path = $_FILES["fileToUpload"]["tmp_name"];
        $img_name = $_FILES["fileToUpload"]["name"];
        $img_file = new ImageUpload($tmp_path, $img_name);
        $imgErr = $img_file->Err;
        $_SESSION["ImgName"] = $img_name;


        $marks = new AddMarksField($_POST["marks"]);
        $MarksValue = $_POST["marks"];
        $_SESSION["marks_value"] = $MarksValue;

        $phone = new PhoneValidation($_POST["mobileNumber"]);
        $PhoneVal = $phone->value;
        $PhoneErr = $phone->Err;
        $_SESSION["phone_val"] = $PhoneVal;

        $email = new EmailValidation($_POST["email"]);
        $EmailVal = $email->value;
        $_SESSION["email_val"] = $EmailVal;
        if ($email->validate()==0) {
            $EmailErr = "Fill up a valid email";
        }
        // if(file_exists("myfile.doc")){
        //  $user = new SaveInfo();
        // }


    }
  ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype = "multipart/form-data">
    First name :<input type = "textbox" name = "fname" id = "fname" value="<?php echo $firstname; ?>" required><span class="Error">* <?php echo $fnameErr;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" id = "lname"value="<?php echo $lastname; ?>" required><span class="Error">* <?php echo $lnameErr;?></span><br><br>
    Full name :<input type = "textbox" name = "fullname" id = "fullname" value = "<?php echo $firstname.' '.$lastname;?>"readonly><br><br>
    Image :<input type="file" name = "fileToUpload" id="fileToUpload" required><span class="Error">*<?php echo $imgErr;?></span><br><br>
    Marks(subject|number):<textarea name="marks" row = "50" cols="50"><?php print_r($MarksValue); ?></textarea><br><br>
    Mobile number:<input type="tel" name = "mobileNumber" value="<?php echo $PhoneVal; ?>" required><span class = "Error">* <?php echo $PhoneErr ?></span><br><br>
    Email: <input type="text" name="email" value="<?php echo $EmailVal; ?>" required><span class = "Error">* <?php echo $EmailErr ?></span><br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>
  <?php
    if (isset($_POST["submit"]) and empty($fnameErr) and empty($lnameErr) and empty($imgErr) and empty($PhoneErr) and empty($EmailErr)) {
      header("Location:nextfile.php");
      }
      ?>
</body>
</html>
