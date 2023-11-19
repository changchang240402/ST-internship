<?php

class Circle extends Shape implements Resizable
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Function: resize radius
     * Change the size of the circle radius with coefficient $amount(datatype int|float)
     * Default $amount = 0 : the size does not change 
     * With $amount > 0: $radius = $radius * $amount
     */
    public function resize(float|int $amount = 0)
    {
        if ($amount > 0) {
            return $this->radius *= $amount;
        }
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }
}
