<?php
session_start();

class LoginDetail{
  public $user = "";
  public $password = "";
  function __construct($user, $password){
    $this->user = $user;
    $this->password = $password;
  }

  function validate(){
    if($_SESSION[$this->user][0] == $this->password){
      return 1;
    } else {
      return 0;
    }
  }
}
