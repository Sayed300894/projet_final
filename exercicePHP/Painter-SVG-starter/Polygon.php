<?php
class Polygon{
    private $points;
    private $color;
    function __construct()
    {
        $this->points = array(
            70 ,20, 70, 180, 200, 180
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