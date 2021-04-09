<?php

/**
 * Class Email Validation validate the email
 */
class EmailValidation
{
    public $email;

    /**
     * [__construct initialize variable]
     *
     * @param [email] $email [initializing email variable]
     */
    function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * [validate check whether email is authenticate email or not]
     *
     * @return [bool] [1 if true else 0]
     */
    function validate()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $access_key = '276fa1a42ff2c254a1893c50e3d0092f';
            $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$this->email.'');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($json, true);
            return $result["format_valid"] and $result["smtp_check"];
        } else {
            return 0;
        }
    }
}
