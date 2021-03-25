<?php
  class NameValidation{
    public $value = "";
    public $Err = "";
    function __construct($name){
      // echo $name;
      if(empty($name)){
        $this->Err = "Name is required";
      } else{

        if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
          $this->Err = "First name contain only alphabetic letter";
        } else {
          $this->value = $name;
        }
      }
    }
  }
