<?php
  class ComputerRPS{
    public $computer;
    function __constuct(){
      $tmpValue = rand(1,3);
      if ($tmpValue==1) {
        $this->computer = 'r';
      } elseif ($tmpValue==2) {
        $this->computer = 'p';
      } elseif ($tmpValue==3) {
        $this->computer = 's';
      }
    }

    function validate($content){
      if($content == 'r' or $content == 'p' or $content == 's'){
        return 1;
      } else {
        return 0;
      }
    }

    function check($RPS){
      if($RPS === $this->computer) {
          echo "draw";
        } elseif ($RPS == 'r') {
          if($this->computer == 'p') {
            echo "computer wins";
          } else {
            echo "user wins";
          }
        } elseif ($RPS == 'p') {
          if($this->computer == 's') {
            echo "computer wins";
          } else {
            echo "user wins";
          }
        } else {
          if($this->computer == 'r'){
            echo "computer wins";
          } else {
            echo "user wins";
          }
        }
    }
  }
 ?>
