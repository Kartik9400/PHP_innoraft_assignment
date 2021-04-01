<?php
/**
 * Class Form Table create a table as requested
 */
class FormTable
{
    public $row;
    public $column;

    /**
     * [__construct description]
     *
     * @param [int] $row    [user input rows]
     * @param [int] $column [user input columns]
     */
    function __construct($row, $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    /**
     * [view output the data in table format]
     *
     * @return [null] []
     */
    function view()
    {
        echo "<table border='1px solid black'>";
        for ($i = 1; $i <= $this->row; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $this->column; $j++) {
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
