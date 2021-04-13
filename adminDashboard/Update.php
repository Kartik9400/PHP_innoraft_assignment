<?php
$servername = "localhost";
$username = "root";
$password = "FlrN6125+";
$dbname = "credential";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$sql = "UPDATE logindetail SET status_active = true WHERE id = '$id'";
if ($conn->query($sql) === true) {
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
