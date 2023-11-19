<?php 
// Question 4: Remove specific element by value from array
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';

// Solution 1: Use array_diff
function removeElementArrayDiff($array, $item) {
    $newArray = array_unique($array);
    return array_diff($newArray,[$item]);
}
print_r(removeElementArrayDiff($lits, $delete_item));

// Solution 2: Use array_search
function removeElementArraySearch($array, $item) {
    $newArray = array_unique($array);
    $key = array_search($item, $newArray);
    if(!$key) {
        unset($newArray[$key]);
    }
    return $newArray;
}
print_r(removeElementArraySearch($lits, $delete_item));

// Solution 3: Use Foreach
function removeElementForeach($array, $item) {
    foreach($array as $key => $value) {
        if($value == $item) {
            unset($array[$key]);
        }
    }
    return $array;
}
print_r(removeElementForeach($lits, $delete_item));
