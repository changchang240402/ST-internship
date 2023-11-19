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

    public function __get($key)
    {
        if (property_exists($this, $key)) {
            return $this->$key;
        }
        return null;
    }

    public function __set($key, $value)
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        }
    }

    public function __toString()
    {
        return "{brand=$this->brand,model=$this->model,year=$this->year}";
    }
}

$vehicle = new Vehicle("Mes", "MEX132", "2024");
echo $vehicle->__get("brand") . PHP_EOL;
echo $vehicle->__set("brand", "Mercedes");
echo $vehicle->__get("brand");
echo $vehicle->__toString();
