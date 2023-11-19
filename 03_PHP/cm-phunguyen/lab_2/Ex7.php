<?php
$array = ['mouse', 'cat', 'dog'];
$filterLength = 4;

$resultArray = function ($array, $n) {
    if ($n >= 0) {
        foreach ($array as $key => $value) {
            if (strlen($value) > $n) {
                unset($array[$key]);
            }
        }
    }
    return $array;
};
print_r($resultArray($array, $filterLength));
