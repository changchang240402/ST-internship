<?php

$vehicle = new class("Tesla", "Model O", 2019)
{
    private $brand;
    private $model;
    private $year;

    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function __toString()
    {
        return $this->brand . " " . $this->model . " " . $this->year .
        " -- Magic Method from Anonymous Class\n";
    }

    public function toString()
    {
        return $this->brand . " " . $this->model . " " . $this->year .
        " -- Normal Method from Anonymous Class";
    }
};

echo $vehicle;
echo $vehicle->toString();
