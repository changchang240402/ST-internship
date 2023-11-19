<?php

interface Resizeable
{
    public function resize();
}

abstract class Shape
{
    abstract protected function calculateArea();
}

class Class1 extends Shape implements Resizeable
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function resize()
    {
        $this->a = $this->a / 2;
        $this->b = $this->b / 2;
    }

    public function calculateArea()
    {
        return $this->a * $this->b;
    }

    public function __toString()
    {
        return $this->a . " " . $this->b;
    }
}

class Class2 extends Shape implements Resizeable
{
    private $a;
    private $b;
    private $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function resize()
    {
        $this->a = $this->a / 2;
        $this->b = $this->b / 2;
    }

    public function calculateArea()
    {
        return $this->a * $this->b * $this->c;
    }

    public function __toString()
    {
        return $this->a . " " . $this->b . " " . $this->c;
    }
}

$class1 = new Class1(1, 2);
$class2 = new Class2(1, 2, 3);

echo PHP_EOL . "Origin: " . $class1;
$class1->resize();
echo PHP_EOL . "After resize: " . $class1;
echo PHP_EOL . "Area: " . $class1->calculateArea();

echo PHP_EOL . "Origin: " . $class2;
$class2->resize();
echo PHP_EOL . "After resize: " . $class2;
echo PHP_EOL . "Area: " . $class2->calculateArea();
