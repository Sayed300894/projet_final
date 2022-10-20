<?php
class Polygon_2{
    private $points;
    private $color;
    function __construct()
    {
        $this->points = array(
            10 ,20, 70, 180, 100, 180, 90, 70, 55, 95 
        );
        $this->color;
    }
    function setSize_color($points, $color){
        $this->points = $points;
        $this->color = $color;
    }
    function draw(){
        return  '<polygon points="'.implode( " ",$this->points).'" fill="'.$this->color.'"/>';
    }
}