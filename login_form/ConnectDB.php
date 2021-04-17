<?php

class ConnectDB
{
    public $conn;
    public $userTbl = 'users';
    /**
     * [__construct creating a connection]
     */
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "FlrN6125+";
        $dbname = "github_google";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    /**
     * [checkUser description]
     *
     * @return [null]           []
     */
    public function checkUser($name, $email)
    {
        $sql = "SELECT name, email FROM user WHERE name='$name'and email='$email'";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Welcome ".$result->fetch_assoc()['name']."</h3>";
        } else {
            echo "<h3>Thankyou for sign up</h3>";
            $sql1 = "INSERT INTO user (name, email)
            VALUES ('$name', '$email')";

            if ($this->conn->query($sql1) === true) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }
    }
}
