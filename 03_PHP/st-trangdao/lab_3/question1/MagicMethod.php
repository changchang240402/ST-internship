<?php

class Vehicle2
{
    private $brand;
    private $model;
    private $year;

    public function __set($key, $value)
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        } else {
            die('Không tồn tại thuộc tính');
        }
    }

    public function __get($key)
    {
        if (property_exists($this, $key)) {
            return $this->$key;
        } else {
            die('Không tồn tại thuộc tính');
        }
    }
}

$class1 = new Vehicle2();
//set
$class1->brand = 'Yamaha';
$class1->model = 'Nhật Bản';
$class1->year = '2023';
//get
echo $class1->brand . PHP_EOL;
echo $class1->model . PHP_EOL;
echo $class1->year . PHP_EOL;
