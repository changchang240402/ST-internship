<?php

class Vehicle
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
}

$vehice = new Vehicle("BMW", "BMW X6", 2023);
echo "Normal method: " . $vehice->details();
echo "\nMagic method: " . $vehice;
