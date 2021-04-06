<?php
  include "SaveInfo.php";
  $user = new SaveInfo();
  session_start();


  $Fname = $_SESSION["FirstName"];
  $Lname = $_SESSION["LastName"];
  $img_name = $_SESSION["ImgName"];
  $MarksValue = $_SESSION["marks_value"];
  $PhoneVal = $_SESSION["phone_val"];
  $EmailVal = $_SESSION["email_val"];
  // $user = new SaveInfo();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php

echo "hello ";
echo $Fname.' '.$Lname;
echo "<br>";
echo "<img src = '".__DIR__."/".$img_name."'>";
echo "<br>";
echo $MarksValue;
echo "<br>";
echo $PhoneVal;
echo "<br>";
echo $EmailVal;
$content = ob_get_contents();
$user->GetContent($content);
      // flush();
echo $content;
?>
</body>
</html>

