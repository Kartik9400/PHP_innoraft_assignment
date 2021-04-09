<?php
require 'ImageUpload.php';
require 'ShowImages.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Photo gallery</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>"
    enctype = "multipart/form-data">
    Image :<input type="file" name = "fileToUpload" id="fileToUpload" required>
    <br><br>
    <textarea name="description" row = "50" cols="50" required></textarea>
    <br><br>
    <input type = "submit" name = "submit" value = "Submit"><br><br>
  </form>

  <?php
    if ($_REQUEST['submit']=='Submit') {
        $tmp_path = $_FILES["fileToUpload"]["tmp_name"];
        $img_name = $_FILES["fileToUpload"]["name"];
        $img_file = new ImageUpload($tmp_path, $img_name);
        echo $img_file->Err;
        if ($img_file->uploadOk === 1) {
            $img_file->store($_POST['description']);
        }
    }
    ?>

  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <input type="submit" name="submit" value= "Show images">
  </form>

  <?php
    //for displaying of image
    if ($_REQUEST['submit']=='Show images') {
        $display_img = new ShowImages();
        $display_img->show();
    }
    ?>
</body>
</html>
