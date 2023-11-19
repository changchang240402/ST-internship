<?php

class Vehicle
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
        return $this->brand . " " . $this->model . " " . $this->year . " -- Magic Method \n";
    }

    public function toString()
    {
        return $this->brand . " " . $this->model . " " . $this->year . " -- Normal Method";
    }
}

$vehicle = new Vehicle("Tesla", "Model O", 2019);
echo $vehicle;
echo $vehicle->toString();
