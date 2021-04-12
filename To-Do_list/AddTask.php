<?php
require 'Task.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Tasks</title>
</head>
<body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <textarea name = "task" cols = "50" rows = "20" required></textarea><br><br>
    <input type="submit" name="submit" value="Add task"><br><br>
  </form>
  <?php
    if (isset($_POST['submit']) and $_REQUEST['submit']=='Add task') {
        $task = new Task();
        $task->insertTask($_POST['task']);
    }
    ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <input type="submit" name="submit" value="Show task"><br><br>
  </form>
  <?php
    if (isset($_POST['submit']) and $_REQUEST['submit']=='Show task') {
        $task = new Task();
        $task->showTask();
    }
    ?>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      id: <input type="textbox" name="id">&nbsp;
      <input type="submit" name="submit" value="Completed"><br><br>
  </form>
  <?php
    if (isset($_POST['submit']) and $_REQUEST['submit']=='Completed') {
        $task = new Task();
        $task->deleteTask($_POST['id']);
    }
    ?>
</body>
</html>
