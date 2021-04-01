<?php
  /**
 * Class compare to compare multidimentional array
  */
class Compare
{
    public $arr;
    /**
     * [__construct initialize variable]
     *
     * @param [array] $arr [2d multidimentional array]
     */
    function __construct($arr)
    {
        $this->arr = $arr;
    }

    /**
     * [diff provide different in arrays of multidimentional arrays]
     *
     * @return [null] []
     */
    function diff()
    {
        // var_dump(count($this->arr));
        for ($i = 0; $i < count($this->arr); $i++) {
            for ($j = 0; $j < count($this->arr); $j++) {
                if ($i != $j) {
                    var_dump(array_diff($this->arr[$i], $this->arr[$j]));
                    echo "<br><br>";
                }
            }
        }
    }
}

