<?php
function name(int|float|string|array $data, string $filter = null)
{
    switch (gettype($data)) {
        case 'integer':
            return $data;
        case 'double':
            return round($data, 0);
        case 'string':
            return strlen($data);
        case 'array':
            if (empty($filter)) {
                return count($data);
            }
            return count(
                array_filter(
                    $data,
                    function ($item) use ($filter) {
                        return strpos($item, $filter) !== false;
                    }
                )
            );
        default:
            return "Không tồn tại ";
    }
}

$data = [23, 12, 10];
echo name($data) . "\n";

$data1 = [23, 12, 10];
$filter1 = 223;
echo name($data1, $filter1) . "\n";

$data2 = 5.9;
echo name($data2) . "\n";

$data3 = "ajsheeird";
echo name($data3) . "\n";

$data4 = "ajsheeird";
echo name($data4) . "\n";

$data5 = 10;
$filter5 = 'aksj';
echo name($data5, $filter5) . "\n";

$data6 = null;
$filter6 = null;
echo name($data6, $filter6) . "\n";