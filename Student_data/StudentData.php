<?php
/**
 * @file
 * Added a class student data in this file
 */
/**
 * Doc comment for student data
 */
class StudentData
{
    public $students = array(
      "st1"=>
      array("name"=>"Kartik", "dob"=>"9 april 2000", "grade"=>"12",
        "marks"=>array('P'=>'35', 'C'=>'45', 'M'=>'55', 'E'=>'55', 'H'=>'65')),
      "st2"=>
      array("name"=>"John", "dob"=>"6 may 1999", "grade"=>"12",
        "marks"=>array('P'=>'35', 'C'=>'45', 'M'=>'5', 'E'=>'5', 'H'=>'10')),
      "st3"=>
      array("name"=>"Mohan", "dob"=>"3 june 1998", "grade"=>"11",
        "marks"=>array('P'=>'35', 'C'=>'5', 'B'=>'5', 'E'=>'5', 'H'=>'6')),
      "st4"=>
      array("name"=>"Rahul", "dob"=>"1 july 1997", "grade"=>"11",
        "marks"=>array('P'=>'45', 'C'=>'55', 'B'=>'50', 'E'=>'65', 'H'=>'Not attended'))
    );

    public $subject = array(
      "12"=>array(
        array('Physics','P', '20'),
        array('Chemistry', 'C', '20'),
        array('Maths', 'M', '25'),
        array('English', 'E', '30'),
        array('Hindi', 'H', '30')
      ),
      "11"=>array(
        array('Physics','P', '20'),
        array('Chemistry', 'C', '20'),
        array('Biology', 'B', '35'),
        array('English', 'E', '30'),
        array('Hindi', 'H', '30')
      )
    );

    /**
     * [__construct check if data is loaded or not]
     */
    function __construct()
    {
        echo "data is loaded successfully<br>";
    }
    /**
     * [getSubject output subjects in form of a table for a particular grade]
     *
     * @param [string] $grade [argument which tell grade]
     *
     * @return [null] []
     */
    function getSubject($grade)
    {
        echo "<table border='1px solid black'>";
        echo "<th>Subject name</th>";
        echo "<th>Subject code</th>";
        echo "<th>Subject min required marks</th>";

        foreach ($this->subject[$grade] as $sub) {
            echo "<tr>";
            foreach ($sub as $item) {
                echo "<td>$item</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    }

    /**
     * [getMarks output marks of a particular student]
     *
     * @param [string] $id [argument tell unique id of a student]
     *
     * @return [null]     [description]
     */
    function getMarks($id)
    {
        var_dump($this->students[$id]["marks"]);
    }

    /**
     * [showData show students data in form of table]
     *
     * @return [null] []
     */
    function showData()
    {
        echo "<table border='1px solid black'>";
        echo "<th>Name</th>";
        echo "<th>Dob</th>";
        echo "<th>Grade</th>";
        echo "<th>Subjects</th>";
        echo "<th>Result</th>";
        foreach ($this->students as $key=>$value) {
            echo "<tr>";
            echo "<td>".$value['name']."</td>";
            echo "<td>".strtolower($value['dob'])."</td>";
            echo "<td>".$value['grade']."</td>";
            $Count = 0;
            echo "<td>";
            foreach ($this->subject[$value['grade']] as $sub) {
                echo $sub[1].'('.$value["marks"][$sub[1]].','.$sub[2].')';
                echo "<br>";
                if ($value["marks"][$sub[1]] > $sub[2]) {
                    $Count+=1;
                }
            }
            echo "</td>";
            echo "<td>";
            echo ($Count*5 >= count($value["marks"])*2 ? "pass" : "fail");
            echo "</td>";
            echo "</tr>";
        }
        echo "</tr>";
    }
}
?>
