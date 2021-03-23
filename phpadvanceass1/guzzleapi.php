<?php
    require_once "vendor/autoload.php";
    use GuzzleHttp\Client;

    class fetch {
      // public $var;
      public $body;
      function _construct($url) {
        $client = new GuzzleHttp\Client();
        $var = $client->get($url);
        $this->body =  $var->getbody();
      }
      function get_file(){

         return json_decode($this->body);
      }
    }

    $obj = new fetch("https://www.innoraft.com/jsonapi/node/services");
    $result = $obj->get_file();
  // echo "done";
  // echo $res->getStatusCode();

  // print_r ($res);
  // echo $res->getbody();
  // $result =
  // echo $result->data[0]->type;
