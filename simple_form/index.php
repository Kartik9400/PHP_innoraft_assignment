<?php ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>

  <script type="text/javascript" src="http://ajax.googleapis.com/
  ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>
  First name :<input type = "textbox" name = "fname" id = "fname"
  required>

  <br><br>
  Last name :<input type = "textbox" name = "lname" id = "lname"
  required>
  <br><br>
  Mobile number:<input type="tel" name = "mobileNumber" id = "mobileNumber"
  required>
  <br><br>
  Email: <input type="text" name="email" id = "email"
  required>
  <br><br>
  <button type="submit" name="submit" value="insert"
  onclick="javascript:ajax_post();">Insert</button>
  <br><br>
  <div id="status"></div>
  <script type="text/javascript" src="custom.js"></script>

</body>
</html>
