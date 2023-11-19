<?php

include 'InterfaceAndAbstract.php';

class Trapezoid extends Shape implements Resizable
{
    private $length;
    private $width;
    private $height;

    public function resize(float $length = 0, float $width = 0, float $height = 0)
    {
        if (!($length > 0) || !($width > 0) || !($height > 0)) {
            throw new Exception("Không tồn tại giá trị");
        }
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea()
    {
        return ($this->length + $this->width) * $this->height / 2;
    }
}

$class1 = new Trapezoid();
$class1->resize(40, 12, 2);
echo $class1->calculateArea() . PHP_EOL;
$class1->resize(40, -13, 2);
echo $class1->calculateArea() . PHP_EOL;
