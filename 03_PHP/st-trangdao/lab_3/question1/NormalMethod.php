<?php

class Vehicle1
{
    private $brand;
    private $model;
    private $year;

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }
}

$class = new Vehicle1();
//set
$class->setBrand('Toyota');
$class->setModel('Nhật Bản');
$class->setYear('2022');
//get
echo $class->getBrand() . PHP_EOL;
echo $class->getModel() . PHP_EOL;
echo $class->getYear() . PHP_EOL;
