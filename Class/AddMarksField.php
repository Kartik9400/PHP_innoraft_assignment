 <?php
    // $marks=array();
    class AddMarksField{
      public $Val;
      public $Err = "";

      function __construct($marks){
        if(!empty($_POST["marks"])){
          $this->Val = preg_split('/[|\s]+/', $marks);
        } else {
          $Err = "Fill the marks";
        }
      }

      function output(){
        echo "<table border='1px solid black'>";
        echo "<th>Subjects</th>";
        echo "<th>Marks</th>";
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
