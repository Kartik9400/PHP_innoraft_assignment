<?php
/**
 * [@file LossPassword check secret ans send by Forget Password page]
 */
session_start();
/**
 * Class LossPassword for checking secret answer
 */
class LossPassword
{
    /**
     * [__construct check if particular username exist in database and
     * secret answer]
     *
     * @param [string] $user    [username of the user]
     * @param [string] $subject [fav subject of the user]
     */
    function __construct($user, $subject)
    {
        if (array_key_exists($user, $_SESSION)) {
            // echo $_SESSION[$user][1];
            if ($_SESSION[$user][1] == $subject) {
                header("location: newPassword.php");
            } else {
                echo "entered wrong subject";
            }
        } else {
            echo "username entered is not correct";
        }
    }
}
