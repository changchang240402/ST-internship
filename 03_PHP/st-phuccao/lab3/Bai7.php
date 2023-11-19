<?php

$A = new class("A","B",2021) {
    private $brand;
    private $model;
    private $year;

    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function displayDetails()
    {
        echo $this->brand.', '. $this->model.', '. $this->year;
    }

    public function __toString()
    {
        return $this->brand.', '. $this->model.', '. $this->year;
    }
};

$A->displayDetails();
echo $A;
