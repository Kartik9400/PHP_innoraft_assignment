<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
/**
 * Class chessboard
 */
class ChessBoard
{
  /**
   * [__construct output a chessboard]
   *
   * @param [int] $box [specifies length and breadth]
   */
    function __construct($box)
    {
        if ($box > 0) {
            $i = 0;
            while ( $i < $box) {
                //Added line with white block first
                echo "<div id = 'boxrow'>";
                for ($j = 0; $j < $box; $j++) {
                    echo "<div id = 'block1'></div>";
                }

                echo "<div>";
                $i++;

                //if $box is odd so break
                if ($i >= $box) {
                    break;
                }
                echo "<div id = 'boxrow'>";

                //Added line where black block first
                for ($j = 0; $j < $box; $j++) {
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

