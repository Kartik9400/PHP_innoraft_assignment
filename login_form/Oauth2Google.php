<?php

require_once 'vendor/autoload.php';


class Oauth2Google
{
    public $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfigFile('client_secrets.json');
        $this->client->setRedirectUri(
            'http://' . $_SERVER['HTTP_HOST']
            . '/php_advance_extra_question/login_form/Google.php'
        );
        $this->client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
        $this->client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
        // $this->client->addScope("email");
        // $this->client->addScope("profile");
    }
    public function getUrl()
    {
        return $this->client->createAuthUrl();
    }

    public function getAccessCode($code)
    {
        $this->client->authenticate($code);
        return $this->client->getAccessToken();
    }

    public function getData($access_token)
    {
        $this->client->setAccessToken($access_token);
        $drive = new Google_Service_Oauth2($this->client);
        return $drive->userinfo->get();

    }
}
