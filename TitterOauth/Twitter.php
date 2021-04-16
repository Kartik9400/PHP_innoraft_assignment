<?php
require "vendor/autoload.php";

use  Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Class twitter to fetch twitter feed of any user
 */
class Twitter
{
    private $_api_key = 'RtkgTKPF72dJgs79VX5BVzcyA';
    private $_api_secret = 'Y1oQVz6CqudfmdpryDPNSRtGPF2NVFBR7BffUJWjJLtu9QM1KW';
    private $_access_token = '923927317470093312-4Twa9zEGR03lOr4sQGPDl1EB0ag1Ds3';
    private $_access_secret = 'ihn5UwENAmGYm2WWIsOKPDx6DtwMlPUSejyAga7X3WyaO';
    private $_conn;
    /**
     * [__construct create a connection with twitter o auth]
     */
    public function __construct()
    {
        $this->_conn = new TwitterOAuth(
            $this->_api_key,
            $this->_api_secret,
            $this->_access_token,
            $this->_access_secret
        );
    }

    /**
     * [showContent show feed of a person]
     *
     * @return [null] []
     */
    public function showContent()
    {
        $twitterID = 'kartik50580284';
        $tweetNum = 25;
        $feedData = $this->_conn->get(
            "statuses/home_timeline",
            array(
            'screen_name'     => $twitterID,
            'count'           => $tweetNum,
            'exclude_replies' => false
            )
        );
        echo "<ul>";
        foreach ($feedData as $tweet) {
            $latestTweet = $tweet->text;
            $latestTweet = preg_replace('/https:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="https://$1" target="_blank">https://$1</a>', $latestTweet);
            $latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a class="tweet-author" href="https://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);
            echo "<li>";
            echo "<a href='".$tweet->user->url."' title='". $tweet->user->name ."'>";
            echo "<img src='". $tweet->user->profile_image_url ."'>";
            echo "</a>";
            echo $latestTweet;
            echo "</li>";
        }
        echo "</ul>";
    }
}
