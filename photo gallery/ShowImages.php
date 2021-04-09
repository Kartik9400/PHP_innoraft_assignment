<?php
/**
 * Class Insert used to insert data
 */
class ShowImages
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
     * @return [NULL]                  []
     */
    public function show()
    {
        $sql = "SELECT * FROM image_data";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<div style = 'display:grid;'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div style = 'display:grid-item;'>";
                echo "<img src = '".$row['image_path']."' alt='upload ". $row['image_path']."' width='100'>";
                echo $row['image_description'];
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "0 results";
        }
        $this->conn->close();
    }
}
