<?php
$servername = "localhost";
  $username = "root";
  $password = "FlrN6125+";
  $dbname = "employee";

  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create employee code table
$sql1 = "CREATE TABLE employee_code_table (
employee_code VARCHAR(50),
employee_code_name VARCHAR(50) NOT NULL,
employee_domain VARCHAR(50)
)";
//Create employee salary table
$sql2 = "CREATE TABLE employee_salary_table (
employee_id VARCHAR(50) NOT NULL,
employee_salary VARCHAR(6) NOT NULL,
employee_code VARCHAR(50)
)";
//Create employee details table
$sql3 = "CREATE TABLE employee_details_table (
employee_id VARCHAR(10) NOT NULL,
employee_first_name VARCHAR(50) NOT NULL,
employee_last_name VARCHAR(50),
Graduation_percentile VARCHAR(4)
)";

if ($conn->query($sql1) === true and $conn->query($sql2) === true and $conn->query($sql3) === true) {
    echo "Tables created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
