<?php

  class emailvalidation{
    public $email;
    // public $emailErr;
    function __construct($email) {
      $this->email = $email;
      var_dump($this->email);
    }
    function validate(){
      echo $this->email;
      if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        // $email = $_POST["email"];
        $access_key = '276fa1a42ff2c254a1893c50e3d0092f';
        $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$this->email.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        // echo "validate";
        curl_close($ch);
        $result = json_decode($json, true);
        return $result["format_valid"];
        // echo $email;
        //   return 1;
        // }

      } else{
        // $this->emailErr = "not a valid email";
        return 0;
      }
    }
  }
