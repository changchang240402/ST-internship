<?php
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');

//Cách 1: Sử dụng array_diff
function checkSubnet1($arr, $subArr)
{
    $key = array_diff($subArr, $arr);
    if (empty($key))
        return true;
    return false;
}

//Cách 2: Sử dụng array_intersect
function checkSubnet2($arr, $subArr)
{
    $key = array_intersect($subArr, $arr);
    if ((count($key) === count($subArr)))
        return true;
    return false;
}
