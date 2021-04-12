<?php

session_start();
/**
 * Class check credential check the credential and add new user
 */
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
        $sql = "SELECT user FROM logindetail WHERE pswd = md5('$password')";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0 and $result->fetch_assoc()['user'] == $user) {
            echo "Enter password and username present in the record";
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
     * @param [string] $book     [user book]
     *
     * @return [null] []
     */
    public function addUser($user, $password, $book)
    {
        $sql = "INSERT INTO logindetail (user, pswd, book)
        VALUES ('$user', MD5('$password'), '$book')";

        if ($this->conn->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }

    /**
     * [checkBook description]
     *
     * @param [type] $user [description]
     * @param [type] $book [description]
     *
     * @return [type]       [description]
     */
    public function checkBook($user, $book)
    {
        $sql = "SELECT book FROM logindetail WHERE user = '$user'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0 and $result->fetch_assoc()['book'] == $book) {
            $_SESSION['user'] = $user;
            header("Location: Forget.php");
        } else {
            echo "Creadential wrong";
        }
        $this->conn->close();
    }
    /**
     * [newPassword description]
     *
     * @param [type] $user     [description]
     * @param [type] $password [description]
     *
     * @return [type]           [description]
     */
    public function newPassword($user, $password)
    {
        $sql = "UPDATE logindetail SET pswd = MD5('$password') WHERE user = '$user'";
        if ($this->conn->query($sql) === true) {
            echo "Password updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }
}
