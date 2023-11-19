<?php

interface Resizable
{
    public function resize($percentage);
}

abstract class Shape
{
    abstract public function calculateArea();
}

class Rectangle extends Shape implements Resizable
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea()
    {
        return $this->width * $this->height;
    }

    public function resize($percentage)
    {
        $this->width *= (1 + $percentage / 100);
        $this->height *= (1 + $percentage / 100);
    }
}

$rectangle = new Rectangle(4, 6);
echo "Rectangle Area: " . $rectangle->calculateArea(), PHP_EOL;
$rectangle->resize(10);
echo "Resized Rectangle Area: " . $rectangle->calculateArea(), PHP_EOL;
