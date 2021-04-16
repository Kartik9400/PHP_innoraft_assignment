<?php
class NameValidation
{
    public $value = "";
    public $Err = "";
    /**
     * [__construct check whether enter name is valid or not]
     *
     * @param [string] $name [name of user]
     */
    function __construct($name)
    {
        // echo $name;
        if (empty($name)) {
            $this->Err = "Name is required";
        } else {

            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $this->Err = "Name contain only alphabetic letter";
            } else {
                $this->value = $name;
            }
        }
    }
}
