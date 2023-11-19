<?php
// ====================================================================
// PHP Array (check if an Array is a subnet of another Array)
$array = array('jan', 'feb', 'march', 'april', 'may');
$anotherArray = array('jan', 'may', 'may');

function isSubArray($array, $subArray)
{
    return count(array_intersect($subArray, $array)) === count($subArray);
}

function isSubArray2($array, $subArray)
{
    return empty(array_diff($subArray, $array));
}
