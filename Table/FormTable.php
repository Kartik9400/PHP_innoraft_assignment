<?php
  class FormTable{
    public $row;
    public $column;

    function __construct($row, $column){
      $this->row = $row;
      $this->column = $column;
    }

    function view(){
      echo "<table border='1px solid black'>";
      for ($i = 1; $i <= $this->row; $i++) {
        echo "<tr>";
        for($j = 1; $j <= $this->column; $j++){
          echo "<td>";
          echo "$i". '*' ."$j=";
          echo $i*$j;
          echo "</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
    }
  }
?>
