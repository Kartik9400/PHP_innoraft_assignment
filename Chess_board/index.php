<?php
  include 'ChessBoard.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>
  <form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Input(size of chess board): <input type="textbox" name="box">
    <input type="submit" name="submit">
  </form>
  <?php
    if (isset($_POST["submit"])) {
      // echo $_POST["box"];
      $board = new ChessBoard($_POST["box"]);
    }
   ?>
 </body>
 </html>
