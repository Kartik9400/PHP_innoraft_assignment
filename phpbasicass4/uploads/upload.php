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

  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype = "multipart/form-data">
    First name :<input type = "textbox" name = "fname" value="<?php echo $fname; ?>" ><span class="Error">* <?php echo $fnameErr;?></span><br><br>
    Last name :<input type = "textbox" name = "lname" value="<?php echo $lname; ?>" ><span class="Error">* <?php echo $lnameErr;?></span><br><br>

    Full name :<input type = "textbox" name = "fullname" value="<?php echo $fullname;?>" readonly><br><br>
    Image :<input type="file" name = "fileToUpload" id="fileToUpload"><br><br>
    Marks(subject|number):<textarea name="marks" row = "50" cols="50"><?php print_r($_POST["marks"]); ?></textarea><br><br>
    Mobile number:<input type="tel" name = "mobileNumber" value="<?php echo $mobileNumber; ?>"><span class = "Error">* <?php echo $mobileNumberErr ?></span><br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>

  <?php
    if(!empty($fullname)){
      echo "Hello ";
    }

    echo $fullname;

  ?>
  <br>

  <?php
    // $img_dir = "uploads/";
    $uploadOk = 1;
    $img_path = basename($_FILES["fileToUpload"]["name"]);
    $imgFileType = strtolower(pathinfo($img_path, PATHINFO_EXTENSION));
    //check if image is actual img or not
    if(isset($_POST["submit"])){
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      // echo $check["mime"];
      // echo $img_path;
      if($check !== false){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $img_path);
          // echo "file uploaded";
        // }
        $uploadOk = 1;
      } else {
        echo "File is not an image";
        $uploadOk = 0;
      }
    }
  ?>

  <img src="<?php echo $img_path; ?>" width="100" height="100">

  <?php
    if(!empty($_POST["marks"])){
      echo "<table border='1px solid black'>";
        echo "<th>Subjects</th>";
        echo "<th>Marks</th>";

          for ($i=0; $i < count($marks); $i+=2) {
              $j = $i + 1;

              echo "<tr>";
              echo  "<td> $marks[$i] </td>";
              echo  "<td>$marks[$j] </td>";
              echo "</tr>";

          }
      echo "</table>";
    }
  ?><br>

  <?php
    if(!empty($mobileNumber)){
      echo "+91-$mobileNumber";
    }

  ?>
</body>
</html>
