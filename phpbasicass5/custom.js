$(document).ready(function(){
  $("#fname, #lname").keyup(function(){
    $("#fullname").val($("#fname").val()+" "+ $("#lname").val());
  });
});
