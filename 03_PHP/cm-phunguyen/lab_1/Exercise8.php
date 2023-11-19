<?php
function calculateBill2(int $units)
{
    $bill = 0;
    $costRange = [
        ['range' => 400, 'cost' => 3015],
        ['range' => 300, 'cost' => 2919],
        ['range' => 200, 'cost' => 2612],
        ['range' => 100, 'cost' => 2074],
        ['range' => 50, 'cost' => 1786],
        ['range' => 0, 'cost' => 1728]
    ];
    if ($units < 0) {
        return 'Nhập giá trị lớn hơn 0';
    }
    foreach ($costRange as $range) {
        if ($units > $range['range']) {
            $diff = $units - $range['range'];
            $bill = $bill + $range['cost'] * $diff;
            $units = $units - $diff;
        }
    }
    return $bill;
};
print_r(calculateBill2(501));
