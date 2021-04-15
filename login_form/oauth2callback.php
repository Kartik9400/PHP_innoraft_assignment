<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/php_advance_extra_question/login_form/oauth2callback.php');
$client->addScope("email");
// $client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

if (! isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/php_advance_extra_question/
    login_form/google.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
