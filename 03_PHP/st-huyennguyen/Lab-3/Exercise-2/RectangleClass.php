<?php

class Rectangle extends Shape implements Resizable
{
    private $height;
    private $width;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Function: resize rectangle
     * Change the size of the rectangle with coefficient $width, $height(datatype int|float)
     * Default $width = 0, $height = 0 : the size does not change 
     * With $width > 0: (new) $this->width = (old) $this->width * (coefficient) $width
     * $height > 0: (new) $this->height = (old) $this->height * (coefficient) $height
     */
    public function resize(float|int $width = 0, float|int $height = 0)
    {
        if ($width > 0) {
            $this->width *= $width;
        }
        if ($height > 0) {
            $this->height *= $height;
        }
        return $this;
    }

    public function calculateArea()
    {
        return $this->width * $this->height;
    }
}
