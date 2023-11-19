<?php
function getDataType($item)
{
    return gettype($item);
}

// Solution 1:
function countDataType(array $items)
{
    $result = [];
    if (!empty($items)) {
        $getDataType = array_map("getDataType", $items);
        $result = array_count_values($getDataType);
    }
    return $result;
}

$result = countDataType([1, 2.0, 'Huyen ne', 'string', [1], true, null]);
print_r($result);

// Solution 2:
function countDataType2(array $items)
{
    if (empty($items)) {
        return [];
    }

    $dataType = array_map("getDataType", $items);
    $result = [];
    foreach ($dataType as $value) {
        if (!isset($result[$value])) {
            $result[$value] = 0;
        }
        $result[$value] += 1;
    }
    return $result;
}
$result = countDataType2([1, 2.0, 'Huyen ne', 'string', [1], true, null]);
print_r($result);
