<?php

  class EmailValidation{
    public $value;
    function __construct($email) {
      $this->value = $email;
    }
    function validate(){
      if (filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
        $access_key = '276fa1a42ff2c254a1893c50e3d0092f';
        $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$this->value.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($json, true);
        return $result["format_valid"] and $result["smtp_check"];
      } else{
        return 0;
      }
    }
  }
