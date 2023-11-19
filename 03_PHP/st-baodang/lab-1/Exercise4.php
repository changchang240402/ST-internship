<?php

// ====================================================================
// PHP Array (Remove specific element by value from array)
$list = array('jan', 'feb', 'march', 'april', 'may', 'april');
$deleteItem = 'april';

// Using array_diff to return remaining array
function removeValue($array, ...$item)
{
    return array_diff($array, $item);
}

// Using array_search & loop to delete each item sequentially.
function removeValue2($array, $item)
{
    while ($key = array_search($item, $array)) {
        unset($array[$key]);
    }
    return $array;
}

function removeValue3($array, $item)
{
    foreach ($array as $key => $value) {
        if ($value === $item) {
            unset($array[$key]);
        }
    }
    return $array;
}
