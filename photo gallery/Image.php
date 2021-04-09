<?php
/**
 * Class Insert used to insert data
 */
class Image
{
    public $conn;

    /**
     * [__construct connect to sql server]
     */
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "FlrN6125+";
        $dbname = "images";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * [insertData insert image data]
     *
     * @param [string] $img_path        [represent path of the image]
     * @param [string] $img_description [description of image]
     *
     * @return [NULL]                  []
     */
    public function insertData(
        $img_path,
        $img_description
    ) {
        $sql = "INSERT INTO image_data (image_path, image_description)
        VALUES ('$img_path', '$img_description')";
        //checking query entered successfully
        if ($this->conn->query($sql) === true) {
            echo "entry successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
        $this->conn->close();
    }
}
