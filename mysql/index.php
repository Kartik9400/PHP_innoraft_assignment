<?php
  require 'Query.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>employee data</title>
</head>
<body>
  <?php
    /**
     * [$servername name of the server working on]
     *
     * @var string
     */
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
    ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Employee code: <input type="textbox" name="employee_code"><br><br>
    Employee code name: <input type="textbox" name="employee_code_name"><br><br>
    Employee Domain: <input type="textbox" name="employee_domain"><br><br>
    <input type="submit" name="submit" value="employee code table">
  </form>
  <?php
    //enter value inside employee code table
    if ($_REQUEST['submit']=='employee code table') {
        $sql = "INSERT INTO employee_code_table
        VALUES ('$_POST[employee_code]', '$_POST[employee_code_name]'
        , '$_POST[employee_domain]')";
        //checking query entered successfully
        if ($conn->query($sql) === true) {
            echo "entry successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        // $conn->close();
    }
    ?>
  <br><br>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Employee Id: <input type="textbox" name="employee_id"><br><br>
    Employee salary: <input type="textbox" name="employee_salary"><br><br>
    Employee code: <input type="textbox" name="employee_code"><br><br>
    <input type="submit" name="submit" value="employee salary table">
  </form>
  <?php
    //enter value inside employee salary table
    if ($_REQUEST['submit']=='employee salary table') {
        $sql = "INSERT INTO employee_salary_table
        VALUES ('$_POST[employee_id]', '$_POST[employee_salary]'
        , '$_POST[employee_code]')";
        //checking query entered successfully
        if ($conn->query($sql) === true) {
            echo "entry successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        // $conn->close();
    }
    ?>
  <br><br>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Employee Id: <input type="textbox" name="employee_id"><br><br>
    Employee first name: <input type="textbox" name="employee_first_name"><br><br>
    Employee last name: <input type="textbox" name="employee_last_name"><br><br>
    Graduation percentile: <input type="textbox" name="Graduation_percentile">
    <br><br>
    <input type="submit" name="submit" value="employee details table">
  </form>
  <?php
    //enter value inside employee detail table
    if ($_REQUEST['submit']=='employee details table') {
        $sql = "INSERT INTO employee_details_table
        VALUES ('$_POST[employee_id]', '$_POST[employee_first_name]'
        , '$_POST[employee_last_name]', '$_POST[Graduation_percentile]')";
        //checking query entered successfully
        if ($conn->query($sql) === true) {
            echo "entry successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        // $conn->close();
    }
    ?>
  <br><br>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Enter query: <textarea name="query" col="50" row='10'></textarea><br><br>
    <input type="submit" name="submit" value="ask query">
  </form>
  <?php
    if ($_REQUEST['submit']=='ask query' and isset($_POST['query'])) {
        $ask_query = new Query();
        $ask_query->getData($_POST['query']);
    }
    ?>
</body>
</html>
