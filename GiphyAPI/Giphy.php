<?php
/**
 *
 */
require_once "vendor/autoload.php";
use GuzzleHttp\Client;
/**
 *
 */
class Giphy
{
    public $body;
    public $link;

    /**
     * [__construct fetching the api]
     */
    function __construct()
    {
        $url = 'https://api.giphy.com/v1/gifs/random?api_key=Vj95NtuzoVb7MQQg5nOWMRCr42fRDCgT&tag=&rating=g';
        $client = new GuzzleHttp\Client();
        $var = $client->get($url);
        $this->body =  $var->getbody();
        $this->link = json_decode($this->body)->data->images->original->webp;
    }
    /**
     * [getGiphy print the griphy]
     *
     * @return [null] []
     */
    function getGiphy()
    {
        echo "<img src='".$this->link."'alt='random gif'>";
    }
}
