 <?php
    // $marks=array();
    class AddMarksField{
      public $Val;
      public $Err = "";

      function __construct($marks){
        if(!empty($_POST["marks"])){
          $this->Val = preg_split('/[\|\s]+/', $marks);
          // var_dump($this->Val);
          for ($i=0; $i < count($this->Val); $i+=2) {
              $j = $i + 1;
              if ($j>=count($this->Val) or !preg_match("/^[a-zA-Z-' ]*$/", $this->Val[$i]) or !preg_match("/^[0-9]*$/", $this->Val[$j])) {
                $this->Err = "Fill up accurately";
                break;
              }
          }
        } else {
          $this->Err = "Fill the marks";
        }
      }

      function output(){
        if(!empty($this->Err)){
          echo "Fill up correctly";
        } else {
          echo "<table border='1px solid black'>";
          for ($i=0; $i < count($this->Val); $i+=2) {
              $j = $i + 1;

              echo "<tr>";
              echo  "<td>". $this->Val[$i]. "</td>";
              echo  "<td>". $this->Val[$j]. "</td>";
              echo "</tr>";

          }
        echo "</table>";
        }
      }
    }
