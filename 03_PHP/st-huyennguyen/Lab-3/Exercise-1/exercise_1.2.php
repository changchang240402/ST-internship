<?php

class Vehicle2
{
    private $brand;
    private $model;
    private $year;

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }
}

$car = new Vehicle2("Car");
$car->setBrand("Ferrari");
$car->setModel("SF90 spider");
$car->setYear(2023);
echo $car->getBrand(), PHP_EOL;
echo $car->getModel(), PHP_EOL;
echo $car->getYear(), PHP_EOL;
