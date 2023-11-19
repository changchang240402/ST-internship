<?php
$array = ["mouse", "cat", "dog", "elephant", "lion"];
$filterLength = 4;

// solution 1:
$filteredArray = array_filter($array, function ($item) use ($filterLength) {
    return strlen($item) <= $filterLength;
});

// Solution 2:
$handleFilterArray = function ($array, $filterLength) {
    foreach ($array as $key => $value) {
        if (strlen($value) > $filterLength) {
            unset($array[$key]);
        }
    }
    return $array;
};

print_r($filteredArray);
print_r($handleFilterArray($array, $filterLength));
