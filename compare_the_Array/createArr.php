<?php
/**
 * Class Create Array
 */
class CreateArr
{
    public $row;
    public $col;
    public $arr = [];

    /**
     * [__construct initialize variable]
     *
     * @param [int] $row [user input row]
     * @param [int] $col [user input column]
     */
    function __construct($row, $col)
    {
        $this->row = $row;
        $this->col = $col;
    }

    /**
     * [putValue create a 2D multidimentional array]
     *
     * @return [array] [2D multidimentional array]
     */
    function putValue()
    {
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                $this->arr[$i][$j] = $i + $j + $this->row;
            }
        }
        // var_dump($this->arr);
        return  $this->arr;
    }
}
?>
