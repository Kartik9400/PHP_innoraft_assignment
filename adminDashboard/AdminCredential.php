<?php

session_start();

/**
 * Class check credential check the credential and add new user
 */
class AdminCredential
{
    public $conn;
    public $body;
    /**
     * [__construct connect to database]
     */
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "FlrN6125+";
        $dbname = "credential";

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
        $sql = "SELECT name FROM admin WHERE password = '$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0 and $result->fetch_assoc()['name'] == $user) {
            header("Location: Permission.php");
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
    public function addAdmin($user, $password)
    {
        $sql = "INSERT INTO admin (name, password)
        VALUES ('$user', '$password')";

        if ($this->conn->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }

    public function updateStatus($id)
    {

        return "<a href='Update.php?id=$id'>Update</a>";
    }

    public function getRequest()
    {
        $sql = "SELECT id FROM logindetail WHERE status_active = false";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $map[$row['id']] = $this->updateStatus($row['id']);
            }
            echo "<table><tr><th>ID</th><th>Button</th></tr>";
            foreach ($map as $key => $value) {
                echo "<tr><td>".$key."</td><td>"
                .$value."</td></tr>";
            }
        } else {
            echo "0 results";
        }

        $this->conn->close();
    }
}
