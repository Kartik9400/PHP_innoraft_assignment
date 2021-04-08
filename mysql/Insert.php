<?php
/**
 * Class Insert used to insert data
 */
class Insert
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
        $dbname = "employee";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * [InsertData inserting data in all the table]
     *
     * @param [string] $employee_id           [id of the employee]
     * @param [string] $employee_first_name   [first name of employee]
     * @param [string] $employee_last_name    [last name of employee]
     * @param [string] $Graduation_percentile [employee graduation percentile]
     * @param [string] $employee_salary       [salary of employee]
     * @param [string] $employee_code         [code of employee]
     * @param [string] $employee_code_name    [code name of employee]
     * @param [string] $employee_domain       [domain of employee]
     *
     * @return [null] []
     */
    public function insertData(
        $employee_id,
        $employee_first_name,
        $employee_last_name,
        $Graduation_percentile,
        $employee_salary,
        $employee_code,
        $employee_code_name,
        $employee_domain
    ) {
        $sql1 = "INSERT INTO employee_code_table
        VALUES ('$employee_code', '$employee_code_name'
        , '$employee_domain');";
        $sql2 = "INSERT INTO employee_salary_table
        VALUES ('$employee_id', '$employee_salary'
        , '$employee_code');";
        $sql3 = "INSERT INTO employee_details_table
        VALUES ('$employee_id', '$employee_first_name'
        , '$employee_last_name', '$Graduation_percentile')";
        //checking query entered successfully
        if ($this->conn->query($sql1) === true and $this->conn->query($sql2) === true and $this->conn->query($sql3) === true) {
            echo "entry successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
        $this->conn->close();
    }
}
