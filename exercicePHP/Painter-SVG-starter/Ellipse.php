<?php
class Ellipse{
    private $cx;
    private $cy;
    private $rayonx;
    private $rayony;
    private $color;
    private $opacity;
    function __construct()
    {
        $this->cx = 380;
        $this->cy = 280;
        $this->rayonx = 90;
        $this->rayony = 60;
        $this->color = "black";
        $this->opacity = 0.9;
    }
    function setLocation($cx, $cy){
        $this->cx = $cx;
        $this->cy = $cy;
    }
    function setSize($rayonx, $rayony){
        $this->rayonx = $rayonx;
        $this->rayony = $rayony;
    }
    function setFill($color, $opacity){
        $this->color = $color;
        $this->opacity = $opacity;
    }
    function draw(){
        return '<ellipse cx="'.$this->cx.'" cy="'.$this->cy.'" rx="'.$this->rayonx.'" ry="'.$this->rayony.'"  fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }

}