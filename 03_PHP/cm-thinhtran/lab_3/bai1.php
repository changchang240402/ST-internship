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
        return $this->brand . " " . $this->model . " " . $this->year;
    }

    public function log()
    {
        return $this->brand . " " . $this->model . " " . $this->year;
    }
}

$vehicle1 = new Vehicle("brand1", "model1", "year1");
echo $vehicle1;
echo "\n";
echo $vehicle1->log();
