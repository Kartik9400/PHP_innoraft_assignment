<?php
  session_start();
  include "../Class/SaveInfo.php";

  $Fname = $_SESSION["FirstName"];
  $Lname = $_SESSION["LastName"];
  $img_name = $_SESSION["ImgName"];
  $MarksValue = $_SESSION["marks_value"];
  $PhoneVal = $_SESSION["phone_val"];
  $EmailVal = $_SESSION["email_val"];
  $user = new SaveInfo();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
ob_start();
echo 'hello ';
echo $Fname.' '.$Lname;
echo '\n';
echo '<img src = "'.'../Class/'.$img_name.'">';
echo '\n';
echo $MarksValue;
echo '\n';
echo $PhoneVal;
echo '\n';
echo $EmailVal;
$user->GetContent();
?>
</body>
</html>

