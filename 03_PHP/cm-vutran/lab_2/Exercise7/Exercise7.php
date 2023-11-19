<?php
$array = ["mouse", "cat", "dog", "fish"];
$filterLength = 3;

//solution 1
$arrayTemp = array_filter($array, function ($item) use ($filterLength) {
    return strlen($item) <= $filterLength;
});

print_r($arrayTemp);

//solution 2
$handleFilter = function ($array) use ($filterLength) {
    $arrayTemp = array();
    foreach ($array as $value) {
        if(strlen($value) <= $filterLength) {
            $arrayTemp[] = $value;
        }
    }
    return $arrayTemp;
};

print_r($handleFilter($array));
