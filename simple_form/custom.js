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
            document.getElementById("status").innerHTML ="Value = <br>" + ajax.responseText;
        }
    }
    var inp1 = document.getElementById("fname").value;
    var inp2 = document.getElementById("lname").value;
    var inp3 = document.getElementById("mobileNumber").value;
    var inp4 = document.getElementById("email").value;
    var datastring = "fname="+inp1+"&lname="+inp2+"&mobileNumber="+inp3+"&email="+inp4;
    ajax.open( "POST", "ajax.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(datastring);
    document.getElementById("status").innerHTML ="Processing...";
}
