<?php

include 'InterfaceAndAbstract.php';

class Square extends Shape implements Resizable
{
    private $a;

    public function resize(float $a = 0)
    {
        if (!($a > 0)) {
            throw new Exception("Không tồn tại giá trị");
        }
        $this->a = $a;
    }

    public function calculateArea()
    {
        return pow($this->a, 2);
    }
}

$class = new Square();
$class->resize(40) . PHP_EOL;
echo $class->calculateArea();
$class->resize(-40);
echo $class->calculateArea() . PHP_EOL;
