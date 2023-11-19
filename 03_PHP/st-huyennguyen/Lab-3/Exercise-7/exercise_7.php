<?php

$newVehicle = new class
{
    private $brand = "Ferrari";
    private $model = "SF90 spider";
    private $year = 2023;

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
};

echo $newVehicle->__get("brand"), PHP_EOL;
$newVehicle->__set("brand", "Mercedes");
echo $newVehicle->__get("brand"), PHP_EOL;
