<?php

function getFirstValue($array)
{
    if (empty($array)) {
        return null;
    }
    return $array[0];
}
echo getFirstValue([1, 2, 3]);
echo "<br/>";
echo getFirstValue([80, 5, 100]);
echo "<br/>";
echo getFirstValue([-500, 0, 50]);
