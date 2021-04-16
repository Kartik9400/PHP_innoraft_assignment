<?php

class Db
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
        $dbname = "form_info";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    /**
     * [insert insert the record and tell whether the record inserted successfully]
     *
     * @param [string] $fname  [user first name]
     * @param [string] $lname  [user last name]
     * @param [string] $email  [user email]
     * @param [tel]    $mobile [user mobile]
     *
     * @return [null]         []
     */
    public function insert($fname, $lname, $email, $mobile)
    {
        $sql = "INSERT INTO user (firstname, lastname, email, mobile)
        VALUES ('$fname', '$lname', '$email', '$mobile')";

        if ($this->conn->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }
}
