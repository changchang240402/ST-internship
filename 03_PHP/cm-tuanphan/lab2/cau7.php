<?php

$array = ["mouse", "cat", "dog"];
$filterLength = 4;

$itemRemoval = function($arr, $filterLength) {
    return array_filter($arr, fn($item) => strlen($item) <= $filterLength);
};
print_r($itemRemoval($array, $filterLength));

