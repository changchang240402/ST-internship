<?php

$removeValue = function ($array, $filterLength) {
    return array_filter($array, function($item) use ($filterLength) {
        return strlen($item) <= $filterLength;
    });
};

$array = ["mouse", "cat", "dog","mouse"];
$filterLength = 4;

$array= $removeValue($array, $filterLength);
print_r($array);
