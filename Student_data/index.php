<?php
  require "StudentData.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <!-- Return - subject name, subject code and min marks -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Grade: <input type="textbox" name="grade">
    <input type="submit" name="submit"><br><br>
  </form>

  <!-- Return - subject code and student marks -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Student Id: <input type="textbox" name="id">
    <input type="submit" name="submit"><br><br>
  </form>

  <!-- Return - student data -->
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Print data: <input type="submit" name="submit">
  </form>

  <?php
    if (isset($_POST["submit"])) {
        $StuData = new StudentData();

        if (isset($_POST["grade"])) {
            $StuData->getSubject($_POST["grade"]);
        } elseif (isset($_POST["id"])) {
            $StuData->getMarks($_POST["id"]);
        } else {
            $StuData->showData();
        }
    }

    ?>
</body>
</html>
