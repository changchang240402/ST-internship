<?php

$ex1 = new class
{
    function show()
    {
        echo "Anonymous class\n";
    }
};

$ex1->show();

$ex2 = new class('BMW', 'BMW X6', 2010)
{
    private $brand;
    private $model;
    private $year;

    function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    function details()
    {
        return "$this->brand - $this->model - $this->year";
    }

    function __toString()
    {
        return "$this->brand - $this->model - $this->year";;
    }
};

echo $ex2 . "\n";
echo $ex2->details();
