<?php
$array = ["mouse", "cat", "dog"];

// Loại bỏ các giá trị trong $array có độ dài lớn hơn $filterLength
$removeLongStr = function ($array, int $filterLength) {
    return array_filter($array, function ($value) use ($filterLength) {
        return strlen($value) <= $filterLength;
    });
};

print_r($removeLongStr($array, 4));
