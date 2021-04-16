<?php
/**
 * This file is used to call a class calculator.php
 */
require 'Calculator.php';
$cal = new Calculator;
if ($cal->check($_POST['num1']) and $cal->check($_POST['num2'])) {
    $a = $_POST['num1'];
    $b = $_POST['num2'];
    $op = $_POST['op'];
    $cal->calc($a, $b, $op);
} else {
    echo "entered value not a number";
}
