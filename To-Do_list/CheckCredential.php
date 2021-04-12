<?php

class CheckCredential
{
    public $conn;

    /**
     * [__construct connect to database]
     */
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "FlrN6125+";
        $dbname = "todolist";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * [Check if password is correct]
     *
     * @param [string] $user     [user name]
     * @param [string] $password [user password]
     *
     * @return [null]  []
     */
    public function check($user, $password)
    {
        echo 'I am here';
        $sql = "SELECT * FROM loginForm WHERE user = '$user'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0 and $result->fetch_assoc()['password'] == $password) {
            header("Location: AddTask.php");
        } else {
            echo "Creadential wrong";
        }
        $this->conn->close();
    }

    /**
     * [addUser add new user]
     *
     * @param [string] $user     [user name]
     * @param [string] $password [user password]
     *
     * @return [null] []
     */
    public function addUser($user, $password)
    {
        $sql = "INSERT INTO loginForm (user, password)
        VALUES ('$user', '$password')";

        if ($this->conn->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }
}
