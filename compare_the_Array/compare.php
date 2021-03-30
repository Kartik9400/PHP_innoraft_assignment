<?php
  class compare{
    public $arr;
    function __construct($arr){
      $this->arr = $arr;

    }

    function diff(){
      // var_dump(count($this->arr));
      for ($i = 0; $i < count($this->arr); $i++){
        for ($j = 0; $j < count($this->arr); $j++){
          if ($i != $j) {
            var_dump(array_diff($this->arr[$i], $this->arr[$j]));
            echo "<br><br>";
          }
        }
      }
    }
  }
