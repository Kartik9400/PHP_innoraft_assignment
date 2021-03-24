<?php
    require_once "vendor/autoload.php";
    use GuzzleHttp\Client;

    class Fetch {
      public $body;
      function __construct($url) {
        $client = new GuzzleHttp\Client();
        $var = $client->get($url);
        $this->body =  $var->getbody();
      }
      function get_file(){

         return json_decode($this->body)->data;
      }
    }


