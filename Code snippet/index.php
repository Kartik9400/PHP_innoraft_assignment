<?php
require 'Store.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Store code snippet</title>
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
  <form method="post">
    <textarea cols="80" rows="10" id = "codeSnippet" name="codeSnippet" required>
    </textarea>
    <script type="text/javascript">
      CKEDITOR.replace( 'codeSnippet' );
    </script><br><br>
    Language: <input type="textbox" name="language" required><br><br>
    Description: <input type="textbox" name="description"><br><br>
    <input type="submit" name="submit" value="Submit"/>
  </form>

    <?php
    if ($_REQUEST['submit']=='Submit') {
        $codeSnippet = new Store();
        $codeSnippet->insertData(
            $_POST['language'],
            $_POST['codeSnippet'],
            $_POST['description']
        );
    }
    ?>
  <form>
    <input type="submit" name="submit" value="Show_table">
  </form>
  <?php
    if ($_REQUEST['submit']=='Show_table') {
        $showSnippet = new Store();
        $showSnippet->show();
    }
    ?>

</body>
</html>
