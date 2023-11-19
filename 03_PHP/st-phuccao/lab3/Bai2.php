<?php

interface Resizable
{
    public function resize(float $percentage) : void;
}

abstract class Shape
{
    abstract public function calculateArea() : float;
}

class Circle extends Shape implements Resizable
{
    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function resize(float $percentage) : void
    {
        $this->r *= $percentage / 100;
    }

    public function calculateArea() : float
    {
        return M_PI * pow($this->r, 2);
    }
}

class Rectangle extends Shape implements Resizable
{
    private $w;
    private $h;

    public function __construct(float $w, float $h)
    {
        $this->w = $w;
        $this->h = $h;
    }

    public function resize(float $percentage) : void
    {
        $this->w *= $percentage / 100;
        $this->h *= $percentage / 100;
    }

    public function calculateArea() : float
    {
        return $this->w * $this->h;
    }
}
