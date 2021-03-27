<?php
  ob_start();
  echo "Hello ";
  file_put_contents("myfile.doc", ob_get_contents());
?>
if ($fname->value or $lname->value) {}
if (empty($imgErr)) {}

if ($email->validate()) {}
ob_start();
file_put_contents("myfile.doc", ob_get_contents());
ob_clean();
