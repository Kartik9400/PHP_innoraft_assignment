<?php

/**
 * Class products
 */
class Products
{
    public $products = array(
    array('pd' => 'pd1', 'sp' => 5, 'sd' => '4thFeb', 'ct' => 'C1'),
    array('pd' => 'pd1', 'sp' => 15, 'sd' => '5thFeb', 'ct' => 'C1'),
    array('pd' => 'pd2', 'sp' => 50, 'sd' => '4thFeb', 'ct' => 'C1'),
    array('pd' => 'pd3', 'sp' => 40, 'sd' => '6thFeb', 'ct' => 'C2'),
    array('pd' => 'pd2', 'sp' => 75, 'sd' => '3rdFeb', 'ct' => 'C1'),
    array('pd' => 'pd2', 'sp' => 65, 'sd' => '7thFeb', 'ct' => 'C1'),
    array('pd' => 'pd4', 'sp' => 190, 'sd' => '8thFeb', 'ct' => 'C2'),
    );
    public $result;

    /**
     * [__construct sort the array according to date then catogory than
     * product id and add index]
     */
    function __construct()
    {
        //sort according to date
        usort($this->products, function ($a, $b) {
            return $a['sd'] <=> $b['sd'];
        }
        );

        //sort according to category
        usort($this->products, function ($a, $b) {
            return $a['ct'] <=> $b['ct'];
        }
        );

        //sort according to product id
        usort($this->products, function ($a, $b) {
            return $a['pd'] <=> $b['pd'];
        }
        );

        $category = "C1-P1";
        $prev_value = 0;
        $ini_ct = "C1";
        $ini_pd = "pd1";
        $i = 1;
        $j = 1;
        foreach ($this->products as $key => $value) {
            # code...
            if ($ini_ct !== $value['ct']) {
                $i++;
                $ini_ct = 'C'.$i;
                $j = 1;
                $ini_pd = "pd1";
                $category = $ini_ct."-P".$j;
                $prev_value = 0;
            }
            if ($ini_pd !== $value['pd']) {
                $j++;
                $ini_pd = "pd".$j;
                $category = $ini_ct."-P".$j;
                $prev_value = 0;
            }
            $this->result[$key]['pd'] = $value['pd'];
            $this->result[$key]['tsp'] = $value['sp'] + $prev_value;
            $prev_value += $value['sp'];
            $this->result[$key]['sd'] = date("d-m-Y", strtotime($value['sd']));
            $this->result[$key]['ct'] = $category;
        }
        print_r($this->result);
    }
}
?>
