<?php
require('Interface.php');

class Square extends Shape implements Resizable
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    /**
     * Resize square's side.
     */
    public function resize(float $side = 0)
    {

        if ($side > 0) {
            $this->side = $side;
        } else {
            throw new Exception("Vui lòng nhập đầu vào hợp lệ");
        }
    }

    public function calculateArea()
    {
        return $this->side ** 2;
    }
}

$square = new Square(20);
echo $square->calculateArea() . PHP_EOL;
$square->resize(5);
echo $square->calculateArea() . PHP_EOL;
$square->resize(-1);
echo $square->calculateArea() . PHP_EOL;
