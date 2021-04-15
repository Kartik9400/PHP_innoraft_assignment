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
    // $var = $client->get($url);
    header('Location: ' . $url);

    // var_dump($var);
}

function getAccessToken($oauth_code)
{
    $tokenURL = 'https://github.com/login/oauth/access_token';
    $clientID = '0e87fe5fa6f984cc2172';
    $clientSecret = '887c0024f661e84ce2443c303d4baab3dff49677';
    $token = apiRequest(
        $tokenURL . '?' . http_build_query(
            [
                  'client_id' => $clientID,
                  'client_secret' => $clientSecret,
                  'code' => $oauth_code
            ]
        )
    );
    return $token->access_token;
}
function apiRequest($access_token_url)
{
    $apiURL = $access_token_url;
    $context  = stream_context_create(
        [
          'http' => [
            'user_agent' => 'CodexWorld GitHub OAuth Login',
            'header' => 'Accept: application/json'
          ]
        ]
    );
    $response = @file_get_contents($apiURL, false, $context);
    return $response ? json_decode($response) : $response;
}


function fetchUrl()
{
    $client = new GuzzleHttp\Client();
    $client_id = '0e87fe5fa6f984cc2172';
    $redirect_uri = 'http://localhost/php_advance_extra_question/login_form/
    gitOauth.php';
    $client_secret = '887c0024f661e84ce2443c303d4baab3dff49677';
    $url = 'https://github.com/login/oauth/access_token';
    $var = $client->post($url,  [
            GuzzleHttp\RequestOptions::JSON => [
                    'client_id' => $client_id,
                    'client_secret' =>$client_secret,
                    'code'=>$_GET['code']
                ] // or 'json' => [...]
        ]
    );
    var_dump($var->getBody());
    die;
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
