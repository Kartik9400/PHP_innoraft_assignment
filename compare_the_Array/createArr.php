<?php
    class createArr{
      public $row;
      public $col;
      public $arr = [];
      function __construct($row, $col){
        $this->row = $row;
        $this->col = $col;
      }

      function putValue() {
        for ($i = 0; $i < $this->row; $i++) {
          for ($j = 0; $j < $this->col; $j++) {
            $this->arr[$i][$j] = $i + $j;
          }
        }
        // var_dump($this->arr);
        return  $this->arr;
      }
    }
  ?>
