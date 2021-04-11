<?php
/**
 * Class Check check entered values;
 */
class Check
{
    /**
     * [validateName to check name containing only letters]
     *
     * @param [string] $name [input name by user]
     *
     * @return [bool]       [return 1 if expression is valid]
     */
    public function validateName($name)
    {
        if (empty($name)) {
            return 1;
        } else {
            return preg_match("/^[a-zA-Z ]*$/", $name);
        }
    }

    /**
     * [validateId to check if id contains the defined pattern]
     *
     * @param [string] $id [unique id]
     *
     * @return [bool]     [return 1 if expression is valid]
     */
    public function validateId($id)
    {
        if (preg_match("/^ru[0-9]*$/i", $id)) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * [validatepercentile to check percentile in defined pattern]
     *
     * @param [string] $percentile [user percentile]
     *
     * @return [bool]             [return 1 if expression is valid]
     */
    public function validatepercentile($percentile)
    {
        if (preg_match("/^[0-9]{2,3}\%$/", $percentile)) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * [validatesalary if salary is in given pattern]
     *
     * @param [string] $salary [user salary]
     *
     * @return [bool]         [return 1 if expression is valid]
     */
    public function validatesalary($salary)
    {
        if (preg_match("/^[0-9]{1,}k$/i", $salary)) {
            return 1;
        } else {
            return 0;
        }
    }
}
