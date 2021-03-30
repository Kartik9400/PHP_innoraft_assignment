<?php
  session_start();
class LossPassword {
  function __construct($user, $subject){
    if(array_key_exists($user, $_SESSION)){
      // echo $_SESSION[$user][1];
      if($_SESSION[$user][1] == $subject){

        header("location: newPassword.php");
      } else {
        echo "entered wrong subject";
      }
    } else {
      echo "username entered is not correct";
    }
  }
}
