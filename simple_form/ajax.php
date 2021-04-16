<?php
/**
 * Db.php connect to database and provides output
 */
require 'NameValidation.php';
require 'PhoneValidation.php';
require "EmailValidation.php";
require 'Db.php';
$firstname = $lastname = $PhoneVal = $EmailVal = "";
$fnameErr = $lnameErr = $PhoneErr = $EmailErr = "";

$fname= new NameValidation($_POST["fname"]);
$lname= new NameValidation($_POST["lname"]);
$firstname = $fname->value;
$lastname = $lname->value;
$fnameErr = $fname->Err;
$lnameErr = $lname->Err;

$phone = new PhoneValidation($_POST["mobileNumber"]);
$PhoneVal = $phone->value;
$PhoneErr = $phone->Err;

$email = new EmailValidation($_POST["email"]);
$EmailVal = $email->value;
if ($email->validate()==0) {
    $EmailErr = "Fill up a valid email";
}


if (empty($fnameErr) and empty($lnameErr) and empty($PhoneErr)
    and empty($EmailErr)
) {
    echo "Hello ";
    echo $firstname.' '.$lastname;
    echo "<br><br>";
    echo "+91-".$PhoneVal;
    echo "<br><br>";
    echo $EmailVal;
    echo "<br><br>";
    $db = new Db();
    $db->insert($firstname, $lastname, $EmailVal, $PhoneVal);
} else {

    echo "not a valid input<br>";
    echo "<h3>Error</h3>";
    echo $fnameErr;
    echo $lnameErr;
    echo $PhoneErr;
    echo $EmailErr;
}
