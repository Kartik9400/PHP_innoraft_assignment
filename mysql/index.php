<?php
  require 'Query.php';
  require 'Insert.php';
  require 'Check.php';
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

    ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Employee Id: <input type="textbox" name="employee_id" required>
    <br><br>
    Employee first name: <input type="textbox" name="employee_first_name" required>
    <br><br>
    Employee last name: <input type="textbox" name="employee_last_name">
    <br><br>
    Graduation percentile: <input type="textbox" name="Graduation_percentile"
    required>
    <br><br>
    Employee salary: <input type="textbox" name="employee_salary" required>
    <br><br>
    Employee code: <input type="textbox" name="employee_code">
    <br><br>
    Employee code name: <input type="textbox" name="employee_code_name" required>
    <br><br>
    Employee Domain: <input type="textbox" name="employee_domain" required>
    <br><br>
    <input type="submit" name="submit" value="Insert data">
  </form>
  <br><br>
  <?php
    //enter value inside employee detail table
    if ($_REQUEST['submit']=='Insert data') {

        $validate = new Check;
        if ($validate->validateName($_POST['employee_first_name'])
            and $validate->validateName($_POST['employee_last_name'])
            and $validate->validateId($_POST['employee_id'])
            and $validate->validatepercentile($_POST['Graduation_percentile'])
            and $validate->validatesalary($_POST['employee_salary'])
        ) {
            $insert = new Insert();
            $insert->insertData(
                $_POST['employee_id'],
                $_POST['employee_first_name'],
                $_POST['employee_last_name'],
                $_POST['Graduation_percentile'],
                $_POST['employee_salary'],
                $_POST['employee_code'],
                $_POST['employee_code_name'],
                $_POST['employee_domain']
            );
        }

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
