<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
/**
 * [goToAuthUrl ]
 *
 * @return [type] [description]
 */
function goToAuthUrl()
{
    $client = new GuzzleHttp\Client();
    $client_id = '0e87fe5fa6f984cc2172';
    $redirect_uri = 'http://localhost/php_advance_extra_question/login_form/gitOauth.php';
    $client_secret = '887c0024f661e84ce2443c303d4baab3dff49677';
    $url = 'https://github.com/login/oauth/authorize?client_id='.$client_id
    .'&redirect_uri='.$redirect_uri.'&scope=user';
    header('Location: ' . $url);
    // $var = $client->get($url);
    // var_dump($var);
}

function fetchUrl()
{
    $client = new GuzzleHttp\Client();
    $client_id = '0e87fe5fa6f984cc2172';
    $redirect_uri = 'http://localhost/php_advance_extra_question/login_form/
    gitOauth.php';
    $client_secret = '887c0024f661e84ce2443c303d4baab3dff49677';
    $url = 'https://github.com/login/oauth/access_token';
    $var = $client->post($url, [
        'form_params' => [
            'client_id' => $client_id,
            'client_secret' =>$client_secret,
            'code'=>$_GET['code']
        ]
    ]
    );
    var_dump($var->getBody());
}

function getData()
{
    $Token = $_SESSION['access_token'];
    $client = new GuzzleHttp\Client();
    $url = 'https://api.github.com/user';

    $var = $client->post(
        $url, ['headers' =>
        ['Authorization'=>'token ' . $Token]]
    );

    // print_r($var);
}
