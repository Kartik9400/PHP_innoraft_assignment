<!DOCTYPE html>
<?php
  if(isset($_POST["submit"])){
  header("Location: /myfile.doc");
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment; filename=myfile.doc");

  // file_put_contents("myfile1.doc", file_get_contents("myfile.doc"));
  ob_clean();
  flush();
}
?>
<?php
  if(isset($_POST["submit"])){
    ob_start();
  }
?>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    $fname=$lname=$fullname=$mobileNumber="";
    $fnameErr=$lnameErr=$mobileNumberErr="";

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
      if(!empty($_POST["marks"])){
        $marks = preg_split('/[|\s]+/', $_POST["marks"]);

      }
      if(empty($_POST["mobileNumber"])){
        $mobileNumberErr = "Mobile number not filled";
      } else {
        if(!preg_match("/[6-9][0-9]{9}/", $_POST["mobileNumber"])){
          $mobileNumberErr = "not a valid indian number";
        } else{
          $mobileNumber = $_POST["mobileNumber"];
        }
      }
    }
   ?>
  <?php
    $uploadOk = 1;
    $img_path = basename($_FILES["fileToUpload"]["name"]);
    $imgFileType = strtolower(pathinfo($img_path, PATHINFO_EXTENSION));
    if(isset($_POST["submit"])){
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $img_path);
        // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "myfile.doc");
        $uploadOk = 1;
      } else {
        echo "File is not an image";
        $uploadOk = 0;
      }
    }
    ?>
  <?php
    $email="";
    $emailErr="";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["email"])){
        $emailErr = "email is required";
      } else {
        // if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i", $_POST["email"])){
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
          $email = $_POST["email"];
          $access_key = '276fa1a42ff2c254a1893c50e3d0092f';
          $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email.'');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $json = curl_exec($ch);

          curl_close($ch);
          $result = json_decode($json, true);
        } else{
          $emailErr = "not a valid email";
        }
      }
    }
    ?>
  <form method="post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
    First name :<input type = "textbox" name = "fname" value="<?php echo $fname; ?>" ><span class="Error">* <?php echo $fnameErr;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" value="<?php echo $lname; ?>" ><span class="Error">* <?php echo $lnameErr;?></span><br><br>

    Full name :<input type = "textbox" name = "fullname" value="<?php echo $fullname;?>" readonly><br><br>
    Image :<input type="file" name = "fileToUpload" id="fileToUpload" value="<?php echo $img_path; ?>"><img src="<?php echo '/var/www/html/'.$img_path; ?>" width="100" height="100"><br><br>
    Marks(subject|number):<textarea name="marks" row = "50" cols="50"><?php print_r($_POST["marks"]); ?></textarea><br><br>
    Mobile number:<input type="tel" name = "mobileNumber" value="<?php echo $mobileNumber; ?>"><span class = "Error">* <?php echo $mobileNumberErr ?></span><br><br>
    Email: <input type="text" name="email" value="<?php echo $email; ?>"><span class = "Error">*<?php echo $emailErr; ?></span><br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>
  <?php
    // echo "$fullname";
    if(isset($_POST["submit"])){
      file_put_contents("myfile.doc", ob_get_contents());
      // ob_clean();
    }
    ?>
</body>
</html>
