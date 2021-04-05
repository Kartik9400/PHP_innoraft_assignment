<?php
    require_once "./vendor/autoload.php";
    use GuzzleHttp\Client;
/**
 * Class fetch to fetch
 */
class Fetch
{
    public $link;
    /**
     * [__construct description]
     *
     * @param [json] $data [contain json data which create gists file]
     */
    function __construct($data)
    {
        $Token = "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";
        $url = "https://api.github.com/gists";
        $client = new GuzzleHttp\Client();
        $response = $client->post(
            $url, ['headers' =>
            ['Authorization'=>'token ' . $Token]
            ,'body'=>$data]
        );
        $this->link = json_decode($response->getBody())->html_url;
    }

}
