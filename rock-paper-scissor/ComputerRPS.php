<?php
  class ComputerRPS{
    public $computer;
    public $arr = array();
    function __construct(){
      $tmpValue = rand(1,3);
      if ($tmpValue==1) {
        $this->computer = 'r';
      } elseif ($tmpValue==2) {
        $this->computer = 'p';
      } elseif ($tmpValue==3) {
        $this->computer = 's';
      }
      $this->arr["pr"] = $this->arr["rs"] = $this->arr["sp"] = 2;
      $this->arr["pp"] = $this->arr["rr"] = $this->arr["ss"] = 1;
      $this->arr["rp"] = $this->arr["sr"] = $this->arr["ps"] = 0;

    }

    function validate($content){
      if($content == 'r' or $content == 'p' or $content == 's'){
        return 1;
      } else {
        return 0;
      }
    }

    function check($RPS){
      $index = $RPS.$this->computer;
      echo ($this->arr[$index]==2 ? "user wins" :
        ($this->arr[$index]==1 ? "Draw" :
         "Computer wins"));
    }
  }
 ?>
