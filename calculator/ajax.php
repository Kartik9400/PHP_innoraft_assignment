<?php
/**
 * This file is used to call a class calculator.php
 */
require 'Calculator.php';
$cal = new Calculator;
$a = $_POST['name'];
$b = $_POST['id'];
$op = $_POST['op'];
$cal->calc($a, $b, $op);
