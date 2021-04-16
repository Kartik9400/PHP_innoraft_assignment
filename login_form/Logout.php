<?php
session_start();
unset($_GET['code']);
session_destroy();

header('Location: http://localhost/php_advance_extra_question/login_form/');
