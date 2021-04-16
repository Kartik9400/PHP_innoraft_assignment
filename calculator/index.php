<?php ?>
<!DOCTYPE html>
<html>
<head>
  <title>Calculator</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/
  ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>
    First number: <input type="text" name="input1" id="input1" required/><br><br>
    Second number: <input type="text" name="input2" id="input2" required/><br><br>
    Operator: <select id="operator">
      <option>Select an operator</option>

      <option>sub</option>
      <option>add</option>
      <option>mul</option>
      <option>div</option>
    </select><br><br>
    <button type="submit" name="submit" value="calculate"
    onclick="javascript:ajax_post();">calculate</button>
    <div id="status"></div>
    <script type="text/javascript" src="custom.js"></script>
</body>
</html>
