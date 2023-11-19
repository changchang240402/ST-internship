<?php

function processData(int | float | string | array $data, string $filter = null) : int
{
    if (is_int($data)) {
        return $data;
    } elseif (is_float($data)) {
        return round($data);
    } elseif (is_string($data)) {
        return strlen($data);
    } elseif (is_array($data)) {
        if ($filter !== null) {
            $filteredArray = array_filter($data, function ($item) use ($filter) {
                return strpos($item, $filter) !== false;
            });
            return count($filteredArray);
        }
        return count($data);
    } else {
        throw new InvalidArgumentException("Không hỗ trợ kiểu dữ liệu này");
    }
}

$data = 123;
$result = processData($data);
echo "Kết quả: $result"; 

$data = 123.456;
$result = processData($data);
echo "Kết quả: $result"; 

$data = "Hello, world!";
$result = processData($data);
echo "Kết quả: $result"; 

$data = ["apple", "banana","date", "cherry", "date"];
$filter = "date";
$result = processData($data, $filter);
echo "Kết quả: $result"; 

$data = ["apple", "banana", "cherry", "date"];
$result = processData($data);
echo "Kết quả: $result"; 
