<?php
// ====================================================================
// PHP Array Return the First Element in an Array

function getFirstValue($array = [])
{
    return empty($array) ? false : $array[0];
}

// Assume that the [0] index value is not set.
// BigO(1) - Using temp memory
function getFirstValue2($array)
{
    $newArray = array_reverse($array);
    return array_pop($newArray);
}

// BigO(n) - Using array_shift
function getFirstValue3($array)
{
    return array_shift($array);
}
