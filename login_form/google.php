<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$client->addScope("email");
// $client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {

    $client->setAccessToken($_SESSION['access_token']['access_token']);
    $drive = new Google_Service_Oauth2($client);
    // print_r($drive);
    //echo $drive->userinfo;
    echo json_encode($drive);
    // session_destroy();
    // echo "<button><a href = 'Logout.php'>Logout</a></button>";
} else {
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/php_advance_extra_question/
    login_form/oauth2callback.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
