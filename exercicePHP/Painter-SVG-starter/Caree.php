<?php
    class Caree{
        private $x;
        private $y;
        private $width;
        private $height;
        private $color;
        private $opacity;
        function __construct()
        {
            $this->x = 80;
            $this->y = 80;
            $this->width = 120;
            $this->height = 120;
            $this->color = "red";
            $this->opacity = 0.4;
        }
        function setLocation($x,$y){
            $this->x = $x;
            $this->y = $y;
        }
        function setSize($width, $height){
            $this->width = $width;
            $this->height = $height;
        }
        function setFill($color, $opacity){
            $this->color = $color;
            $this->opacity = $opacity;
        }
        function draw(){

         return  '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.       $this->opacity.'"/>';
        }
    }