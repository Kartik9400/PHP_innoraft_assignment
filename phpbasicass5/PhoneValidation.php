<?php
  class PhoneValidation{
    public $value = "";
    public $Err = "";
    function __construct($MobileNum){
      if(empty($MobileNum)){
        $this->Err = "Number is required";
      } else{

        if(!preg_match("/[6-9][0-9]{9}/", $MobileNum)){
          $this->Err = "Fill a valid name";
        } else {
          $this->value = $MobileNum;
        }
      }
    }

    function output(){
      echo "+91-".$this->value;
    }
  }
