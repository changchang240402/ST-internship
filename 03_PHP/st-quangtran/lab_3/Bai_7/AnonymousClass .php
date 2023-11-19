<?php

$myVehicle = new class("Toyota", "Camry", 2022)
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

    public function displayDetail()
    {
        return "Brand: " . $this->brand . "\n" .
            "Model: " . $this->model . "\n" .
            "Year: " . $this->year . "\n";
    }

    public function __toString()
    {
        return "Brand: " . $this->brand . "\n" .
            "Model: " . $this->model . "\n" .
            "Year: " . $this->year . "\n";
    }
};

echo $myVehicle;
echo $myVehicle->displayDetail();
