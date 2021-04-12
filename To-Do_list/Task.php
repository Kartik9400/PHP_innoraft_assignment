<?php

class Task
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
     * [InsertTask insert a particular task]
     *
     * @param [string] $TASK [user to do task]
     *
     * @return [null]  []
     */
    public function insertTask($TASK)
    {
        $sql = "INSERT INTO tasks(tasks)
        VALUES ('$TASK')";

        if ($this->conn->query($sql) === true) {
            echo "New Task updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }

    /**
     * [DeleteTask delete a particular record after completion]
     *
     * @param [int] $id [id of the content to be working on]
     *
     * @return [null]  []
     */
    public function deleteTask($id)
    {
        // sql to delete a record
        $sql1 = "DELETE FROM tasks WHERE id='$id';";
        $sql2 = "ALTER TABLE tasks AUTO_INCREMENT = 1";

        if ($this->conn->query($sql1) === true and $this->conn->query($sql2) === true) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->conn->error;
        }

        $this->conn->close();
    }

    /**
     * [details give detail of particular task]
     *
     * @param [string] $id [particular id to get details]
     *
     * @return [null]     []
     */
    public function details($id)
    {
        $sql = "SELECT tasks FROM tasks WHERE id='$id'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "task: " . $row["tasks"]. "<br>";
                echo "this task will be deleted<br>";
                $this->deleteTask($id);
            }
        } else {
            echo "0 results";
        }
        $this->conn->close();
    }

    /**
     * [showTask give list of task]
     *
     * @return [null] []
     */
    public function showTask()
    {
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);
        $call = '<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>';
        if ($result->num_rows > 0) {
            echo "<table border = '1px solid black'>";
            echo "<th>id</th><th>Detail</th>";
            while ($row = $result->fetch_assoc()) {
                $val = $row["id"];
                echo "<tr>";
                echo "<td>";
                echo "id: " . $val. "&nbsp";
                echo "</td>";

                echo "<td>";
                echo $row["tasks"];
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
        $this->conn->close();
    }
}
