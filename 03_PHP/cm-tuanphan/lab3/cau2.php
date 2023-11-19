<?php

interface Resizable
{
    public function resize($factor);
}

abstract class Shape
{
    abstract public function calculateArea();
}

class Square extends Shape implements Resizable
{
    private $factor;

    // Constructor to initialize the side length of the square.
    public function __construct($factor)
    {
        $this->factor = $factor;
    }

    // Implement the 'resize' method from the Resizable interface.
    public function resize($factor)
    {
        $this->factor = $factor;
    }

    // Implement the 'calculateArea' method to calculate the area of the square.
    public function calculateArea()
    {
        return $this->factor * $this->factor;
    }
}

// Create an instance of the Square class with an initial side length of 5.
$square = new Square(5);
echo "Square Area: " . $square->calculateArea() . PHP_EOL;
$square->resize(10);
echo "Square Area: " . $square->calculateArea() . PHP_EOL;
