<?php

//Solution 1 : Cach truyen thong
function countDataType1(array $items)
{
    $result = [];
    foreach ($items as $item) {
        $dataType = gettype($item);
        if (array_key_exists($dataType, $result)) {
            $result[$dataType]++;
        } else {
            $result[$dataType] = 1;
        }
    }

    return $result;
}

//Solution 2 : Su dung ham co san
function countDataType(array $items)
{
    $count = array_count_values(array_map('gettype', $items));
    
    $allowedTypes = ["string", "integer", "double", "boolean", "array", "NULL"];

    $result = array_intersect_key($count, array_flip($allowedTypes));

    return $result;
}

// Input
$items = [1, 2.0, "string", [1], true, null,[1,2]];

// Get the count of data types
$result = countDataType1($items);

// Output
print_r($result);
