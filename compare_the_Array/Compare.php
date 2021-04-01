<?php
/**
 * Class compare to compare multidimentional array
  */
class Compare
{
    public $arr1;
    public $arr2;
    /**
     * [__construct initialize variable]
     *
     * @param [array] $arr [2d multidimentional array]
     */
    function __construct($arr1, $arr2)
    {
        $this->arr1 = $arr1;
        $this->arr2 = $arr2;

    }

    /**
     * [diff find difference between 2 multidimentional array]
     *
     * @return [null] []
     */
    function diff()
    {
        // var_dump(count($this->arr));
        if ($this->arr1===$this->arr2) {
            echo 'Identical';
        } else {
            for ($i=0; $i < max(count($this->arr1), count($this->arr2)); $i++) {
                # code...
                if (count($this->arr1) > count($this->arr2)) {
                    var_dump(array_diff($this->arr1[$i], $this->arr2[$i]));
                    echo "<br><br>";
                } else {
                    var_dump(array_diff($this->arr2[$i], $this->arr1[$i]));
                    echo "<br><br>";
                }
            }
        }



    }
}
