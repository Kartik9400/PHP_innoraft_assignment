<?php
/**
 * Query class is used to fetch the query
 */
class Query
{
    public $conn;
    /**
     * [__construct creating a connection]
     */
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "FlrN6125+";
        $dbname = "employee";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    /**
     * [getData output the fetched query]
     *
     * @param [string] $query [the asked query]
     *
     * @return [null]        []
     */
    function getData($query)
    {
        $sql = "$query";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            for ($i=0; $i < $result->num_rows; $i++) {
                # code...
                foreach ($result->fetch_assoc() as $key => $value) {
                    # code...
                    echo $key . '=';
                    echo $value;
                    echo "  ";
                }
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}
