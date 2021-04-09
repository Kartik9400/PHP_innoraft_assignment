<?php

/**
 * Class Store stores the data and displays the tabls
 */
class Store
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
        $dbname = "storeCodeSnippet";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * [insertData inserts the data]
     *
     * @param [string] $language    [language of code snippet]
     * @param [string] $codeSnippet [code snippet]
     * @param [string] $description [description about code snippet]
     *
     * @return [null]              []
     */
    public function insertData(
        $language,
        $codeSnippet,
        $description
    ) {
        $sql = "INSERT INTO codeData (lang, code, description)
        VALUES ('$language', '$codeSnippet', '$description')";
        //checking query entered successfully
        if ($this->conn->query($sql) === true) {
            echo "entry successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
        $this->conn->close();
    }

    /**
     * [show displays the values]
     *
     * @return [null] []
     */
    public function show()
    {
        $sql = "SELECT lang, code, description FROM codeData";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1px solid black'><tr><th>Language</th><th>Code</th><th>Description</th></tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["lang"]."</td><td>".$row["code"]."</td><td>".$row["description"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $this->conn->close();
    }
}
