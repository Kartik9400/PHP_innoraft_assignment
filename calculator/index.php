<?php ?>
<!DOCTYPE html>
<html>
<head>
  <title>Calculator</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/
  ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>
    First number: <input type="number" name="input1" id="input1" required/><br><br>
    Second number: <input type="number" name="input2" id="input2" required/><br><br>
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
    <script type="text/javascript">
      function ajaxReturn(x)
      {
          if(x.readyState == 4 && x.status == 200) {
              return true;
          }
      }

      function ajax_post()
      {
          var ajax = new XMLHttpRequest();

          ajax.onreadystatechange = function()
          {
              if(ajaxReturn(ajax) == true)
              {
                  document.getElementById("status").innerHTML ="Value = " + ajax.responseText;
              }
          }
          var inp1 = document.getElementById("input1").value;
          var inp2 = document.getElementById("input2").value;
          var operator = document.getElementById("operator").value;
          var datastring = "name="+inp1+"&id="+inp2+"&op="+operator;
          ajax.open( "POST", "ajax.php", true);
          ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          ajax.send(datastring);
      }
    </script>
</body>
</html>
