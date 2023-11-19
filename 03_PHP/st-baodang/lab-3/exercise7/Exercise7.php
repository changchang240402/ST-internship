<?php

// Method 1
$vehicle = new class
{
    private $brand = "Mes";
    private $model = "MEX132";
    private $year = 2024;

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
};

// Method 2
function anonymousClass($brand, $model, $year)
{
    return new class($brand, $model, $year)
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
    };
}

echo $vehicle->__get("brand") . PHP_EOL;
echo $vehicle->__set("brand", "Mercedes");
echo $vehicle->__get("brand") . PHP_EOL;

$c = anonymousClass("Mes2", "MEX133", 2024);
echo $c->__get("brand") . PHP_EOL;
echo $c->__set("brand", "Mercedes");
echo $c->__get("brand");
