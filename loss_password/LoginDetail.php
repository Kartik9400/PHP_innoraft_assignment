<?php
session_start();

/**
 * Class Login Detail
*/
class LoginDetail
{
    public $user = "";
    public $password = "";
    /**
     * [__construct description]
     *
     * @param [type] $user     [description]
     * @param [type] $password [description]
     */
    function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * [validate check if user entered right or wrong credential]
     *
     * @return [bool] [check if user entered right or wrong password]
     */
    function validate()
    {
        if ($_SESSION[$this->user][0] == $this->password) {
            return 1;
        } else {
            return 0;
        }
    }
}
