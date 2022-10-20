<?php

//////////////////////////////
// Inclusion des dépendances /
//////////////////////////////
include 'Rect.php';
include 'Ellipse.php';
include 'Circle.php';
include 'Polygon.php';
include 'Polygon_2.php';
include 'Caree.php';



///////////////////////
// Traitement PHP ici /
///////////////////////
$rect = new Rect();
$rect->setLocation(0, 100);
$rect->setSize(180, 100);
$rect->setFill("red", 1);
$svg = $rect->draw();




$ellipse = new Ellipse();
$ellipse->setLocation(450, 230);
$ellipse->setSize(50, 90);
$ellipse->setFill("green", 1);
$svgEllipse = $ellipse->draw();

$caree = new Caree();
$caree->setLocation(280, 250);
$caree->setSize(110, 110);
$caree->setFill("blue", 0.3);
$svgCaree = $caree->draw();

$circle = new Circle();
$circle->setLocation(200, 300);
$circle->setSize(160);
$circle->setFill("yellow", 0.4);
$svgCircle = $circle->draw();

$polygon = new Polygon();
$polygon->setSize_color(array(10 ,180,10 ,380, 130, 380), "purple");
$svgPolygon = $polygon->draw();
$polygon_2 = new Polygon_2();
$polygon_2->setSize_color(array(150, 120, 110,200, 120, 140, 150, 160, 160, 220), "green");
$svgPolygon_2 = $polygon_2->draw();



//////////////////////////////////////
// Affichage : inclusion du template /
//////////////////////////////////////
include 'index.phtml';