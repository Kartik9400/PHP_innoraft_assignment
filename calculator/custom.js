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
  var datastring = "num1="+inp1+"&num2="+inp2+"&op="+operator;
  ajax.open( "POST", "ajax.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send(datastring);
}
