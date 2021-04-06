<?php
/**
 * [@file SeatArrangement.php]
 */
class SeatArrangement
{
    public $array;
    public $result;

    /**
     * [__construct creates the arrangement]
     *
     * @param [int] $girl [number of girls]
     * @param [int] $boy  [number of boys]
     */
    function __construct($girl, $boy)
    {
        $i = 0;
        while ($i < $girl) {
            $this->array[$i]['name'] = 'G'.$i;
            $this->array[$i]['gender'] = 'F';
            $i++;
        }

        while ($i-$girl < $boy) {
            $this->array[$i]['name'] = 'B'.($i-$girl);
            $this->array[$i]['gender'] = 'M';
            $i++;
        }

        //Sorting put all the boys at starting and girls at last
        usort($this->array, function ($a, $b) {
            return $a['gender'] < $b['gender'];
        });

        $i = 0;
        $j = count($this->array)-1;
        $k = 0; //count of resultant array
        while ($i <= $j) {
            if ($this->array[$i]['Gender'] === 'F' and $i !== $j) {
                echo "girls are very much required arrangement can be possible";
                break;
            }
            $this->result[$k] = $this->array[$j]['name'];
            $k++;
            $j--;
            if ($j < $i) {
                break;
            }
            $this->result[$k] = $this->array[$i]['name'];
            $k++;
            $i++;

        }

        if ($i > $j) {
            print_r($this->result);
        }
    }
}

?>
