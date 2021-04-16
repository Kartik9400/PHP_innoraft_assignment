<?php

/**
 * Class calulator calculates the value
 */
class Calculator
{
    /**
     * [calc calculates the value]
     *
     * @param [int]    $a  [prev result]
     * @param [int]    $b  [user input]
     * @param [string] $op [operator]
     *
     * @return [int]       [desired result]
     */
    public function calc($a, $b, $op)
    {
        switch ($op) {
        case "add":
            echo $a + $b;
            break;
        case "sub":
            echo $a - $b;
            break;
        case "mul":
            echo $a * $b;
            break;
        case "div":
            if ($b == 0) {
                echo "Not valid";
            } else {
                echo $a / $b;
            }
            break;
        default:
            echo 'not inside its functionality';
            break;
        }
    }

    /**
     * [check whether the input is number or not]
     *
     * @param [number] $num [user input]
     *
     * @return [null]      []
     */
    public function check($num)
    {
        if (preg_match("/^[\-]{0,1}[0-9]*[\.]{0,1}[0-9]*$/", $num)) {
            return true;
        } else {
            return false;
        }
    }
}
