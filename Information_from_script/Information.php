<?php

class Information
{
    /**
     * [request to check it is http aur https request]
     *
     * @return [null] []
     */
    function request()
    {
        echo "<br><br><h3>Request</h3>";
        if (!isset($_SERVER['HTTPS'])) {
            echo "It is a http request";
        } else {
            echo "It is a https request";
        }
        echo "<br>";
    }

    /**
     * [detectOS return os name]
     *
     * @return [null] []
     */
    function detectOS()
    {
        echo "<h3>OS: </h3>";
        echo PHP_OS."<br><br>";
        echo "<h3>Information about os: </h3>";
        echo php_uname()."<br><br>";

    }

    /**
     * [detectBrowser detects the browser server is using]
     *
     * @return [null] []
     */
    function detectBrowser()
    {
        echo "<h3>Your user agent is :</h3>". $_SERVER['HTTP_USER_AGENT'];
    }
}
