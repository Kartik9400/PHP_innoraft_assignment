<?php

/**
 * Class calulator calculates the value
 */
class Calculator
{
    /**
     * [calc calculates the value]
     *
     * @param [int]    $a    [prev result]
     * @param [int]    $b    [user input]
     * @param [string] $char [operator]
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

}
