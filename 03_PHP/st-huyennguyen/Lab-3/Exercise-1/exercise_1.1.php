<?php

class Vehicle
{
    private $brand;
    private $model;
    private $year;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}

$car = new Vehicle("Car");
$car->brand = "Ferrari";
$car->model =  "SF90 spider";
$car->year = 2023;
echo $car->brand, PHP_EOL;
echo $car->model, PHP_EOL;
echo $car->year, PHP_EOL;
