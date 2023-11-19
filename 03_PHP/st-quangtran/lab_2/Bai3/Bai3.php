<?php
function countDataType(array $items)
{
    if (!$items) {
        return $items;
    }
    $dataTypeCounts = array_reduce($items, function ($carry, $item) {
        $dataType = gettype($item);
        $carry[$dataType] = isset($carry[$dataType]) ? $carry[$dataType] + 1 : 1;
        return $carry;
    }, []);
    return $dataTypeCounts;
}

// $items = [1, "hello", true, 2, "world", false];
$items = [];
$result = countDataType($items);
print_r($result);
