<?php
$lits = array('jan', 'feb', 'march', 'april', 'april', 'may');
$deleteItem = 'april';

function removeSpecificElement($arr, $del)
{
    $newArr = array_unique($arr);
    $key = array_search($del, $newArr);
    if (!is_null($key)) {
        unset($newArr[$key]);
    }
    return $newArr;
}
var_dump(removeSpecificElement($lits, $deleteItem));
