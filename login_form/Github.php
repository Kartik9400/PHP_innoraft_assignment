<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;

/**
 * Class github create a login page and get info from github
 */
class GitHub
{
    public $client_id = '0e87fe5fa6f984cc2172';
    public $redirect_uri = 'http://localhost/php_advance_extra_question/login_form/gitOauth.php';
    public $client_secret = '887c0024f661e84ce2443c303d4baab3dff49677';
    /**
     * [goToAuthUrl to get auth url]
     *
     * @return [url] [to get authorization request from new login]
     */
    public function goToAuthUrl()
    {

        return $url = 'https://github.com/login/oauth/authorize?client_id='.
        $this->client_id.'&redirect_uri='.$this->redirect_uri.'&scope=user';
        // $var = $client->get($url);
        // var_dump($var);
    }

    /**
     * [apiRequest To get access token]
     *
     * @param [url] $access_token_url [url generated to get access token]
     *
     * @return [token]    [content of token contains info about access token]
     */
    public function apiRequest($access_token_url)
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
    /**
     * [getAccessToken To get access token]
     *
     * @param [string] $oauth_code [code generated using authorization]
     *
     * @return [string]             [value of access token]
     */
    public function getAccessToken($oauth_code)
    {
        $tokenURL = "https://github.com/login/oauth/access_token";
        $token = $this->apiRequest(
            $tokenURL . '?' . http_build_query(
                [
                      'client_id' => $this->client_id,
                      'client_secret' => $this->client_secret,
                      'code' => $oauth_code
                ]
            )
        );
        // var_dump($token);
        return $token->access_token;
    }
    /**
     * [getData To get data of the user]
     *
     * @return [null] []
     */
    public function getData()
    {
        $Token = $_SESSION['access_token'];
        $client = new GuzzleHttp\Client();
        $url = 'https://api.github.com/user';

        $var = $client->post(
            $url,
            ['headers' =>
            ['Authorization'=>'bearer ' . $Token]]
        );
        return json_decode($var->getBody());
    }
}
