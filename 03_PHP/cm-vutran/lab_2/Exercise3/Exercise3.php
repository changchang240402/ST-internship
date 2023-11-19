<?php
function getTypeOfValue($value)
{
    return gettype($value);
}

function arrayCountValues($array)
{
    $arrayTemp = array();
    foreach ($array as $value) {
        $arrayTemp[$value] = isset($arrayTemp[$value]) ? $arrayTemp[$value]+1 : 1;
    }
    return $arrayTemp;
}

function countDataTypes($items)
{
    $countArray = array_map('getTypeOfValue', $items);
    return arrayCountValues($countArray);
}

$items = [];
print_r(countDataTypes($items));
