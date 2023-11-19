<?php
function filterArray($array, $filterLength)
{
    $result = array_filter($array, function ($item) use ($filterLength) {
        if (strlen($item) <= $filterLength) {
            return $item;
        }
    });
    return $result;
}
$array = ["mouse", "cat", "dog", "bird", "panda", "ox", "pig"];
$filterLength = 4;
print_r(filterArray($array, $filterLength));


function filterArray2($array, $filterLength)
{
    $deleteArr = array_filter($array, function ($item) use ($filterLength) {
        if (strlen($item) > $filterLength) {
            return $item;
        }
    });
    $result = array_diff($array, $deleteArr);
    return $result;
}

print_r(filterArray2($array, $filterLength));
