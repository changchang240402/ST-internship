<?php

interface Resizable
{
    function resize($factor);
}

abstract class Shape
{
    abstract function calculateArea();
}

class Circle extends Shape implements Resizable
{
    private $radius;

    function __construct($radius)
    {
        $this->radius = $radius;
    }

    function calculateArea()
    {
        return M_PI * pow($this->radius, 2);
    }

    function resize($factor)
    {
        $this->radius *= $factor;
    }
}

class Rectangle extends Shape implements Resizable
{
    private $width;
    private $height;

    function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    function calculateArea()
    {
        return $this->width * $this->height;
    }

    function resize($factor)
    {
        $this->width *= $factor;
        $this->height *= $factor;
    }
}


$circle = new Circle(10);
echo "Circle Area: " . $circle->calculateArea() . "\n";
$circle->resize(2);
echo "Resized Circle Area: " . $circle->calculateArea() . "\n";

$rectangle = new Rectangle(2, 8);
echo "Rectangle Area: " . $rectangle->calculateArea() . "\n";
$rectangle->resize(2.5);
echo "Resized Rectangle Area: " . $rectangle->calculateArea() . "\n";
