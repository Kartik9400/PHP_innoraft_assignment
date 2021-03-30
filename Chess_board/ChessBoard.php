<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
  class ChessBoard{
    function __construct($box){
      // echo $box;
      if ($box > 0) {
        $i = 0;
        while ( $i < $box) {
          echo "<div id = 'boxrow'>";
          for ($j = 0; $j < $box; $j++) {
            // echo $i;
            // echo $j;
            echo "<div id = 'block1'></div>";
          }

          echo "<div>";
          $i++;
          if ($i >= $box) {
            break;
          }
          echo "<div id = 'boxrow'>";
          for ($j = 0; $j < $box; $j++) {
            // echo $i;
            // echo $j;
            echo "<div id = 'block2'></div>";
          }

          echo "<div>";
          $i++;
        }
      } else {
        echo "Not entered correct value";
      }
    }
  }
?>
</body>
</html>

