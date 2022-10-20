<?php
class Circle{
    private $cx;
    private $cy;
    private $rayon;
    private $color;
    private $opacity;
    function __construct()
    {
        $this->cx = 380;
        $this->cy = 280;
        $this->rayon = 90;
        $this->color = "black";
        $this->opacity = 0.9;
    }
    function setLocation($cx, $cy){
        $this->cx = $cx;
        $this->cy = $cy;
    }
    function setSize($rayon){
        $this->rayon = $rayon;
    }
    function setFill($color, $opacity){
        $this->color = $color;
        $this->opacity = $opacity;
    }
    function draw(){
        return '<circle cx="'.$this->cx.'" cy="'.$this->cy.'" r="'.$this->rayon.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }

}