<?php

class Vehicle
{
    public $brand;
    public $model;
    public $year;

    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function __toString()
    {
        return "Brand: " . $this->brand . PHP_EOL.
            "Model: " . $this->model . PHP_EOL .
            "Year: " . $this->year;
    }
    
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    
    public function displayVehicleDetails()
    {
        return "Brand: " . $this->brand . PHP_EOL.
            "Model: " . $this->model . PHP_EOL .
            "Year: " . $this->year;
    }
}
