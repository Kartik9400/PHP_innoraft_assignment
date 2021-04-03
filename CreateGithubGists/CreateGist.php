<?php
  require 'Fetch.php';
/**
 * Class CreateGist to create a gist
 */
class CreateGist
{
    public $data;
    /**
     * [__construct initialize the variables]
     *
     * @param [json] $data [to create json data]
     */
    function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * [create description]
     *
     * @return [type] [description]
     */
    function create()
    {
        $fetch = new Fetch($this->data);
        echo "<br><br>";
        echo "<a href = '$fetch->link'>Gists link</a>";
    }
}

?>
