<?php
// Solution 1: switch - case
// check filter is empty
function filterData($data, $filter)
{
    if (!empty($filter)) {
        return count(array_filter($data, $filter));
    }
    return count($data);
}

function checkDataType(int|float|string|array $data, string $filter): int
{
    $result = 0;
    switch (gettype($data)) {
        case 'integer':
            $result = $data;
            break;
        case 'double':
            $result = round($data, 0);
            break;
        case 'string':
            $result = strlen($data);
            break;
        case 'array':
            $result = filterData($data, $filter);
            break;
        default:
            break;
    }
    return $result;
}
// callback function test filter
function evenItem($variable)
{
    return !(strlen($variable) & 1);
}

// Solution 2: match usage
function checkDataType2(int|float|string|array $data, string $filter): int
{
    $result = match (gettype($data)) {
        'integer' => $data,
        'double' => round($data, 0),
        'string' => strlen($data),
        'array' => filterData($data, $filter),
    };
    return $result;
}
$data = ["Test", "Test ne", "Test nua", "Test mai"];
$filter = 'evenItem';
echo checkDataType($data, $filter) . "\n";
echo checkDataType2($data, $filter);
