<?php
// ====================================================================
// Write a function to calculate the Electricity
/**
 * For first 50	kWh 		- 1728 đồng/kWh
 * For next 50	kWh 		- 1786 đồng/kWh
 * For next 100	kWh		    - 2074 đồng/kWh
 * For next 100	kWh		    - 2612 đồng/kWh
 * For next 100	kWh		    - 2919 đồng/kWh
 * For until about next 	- 3015 đồng/kWh
 * $bill = $units * cost (for first 50kWh = 50 * 1728)
 */
function calculateBill(int $unit)
{
    $result = 0;
    switch (true) {
        case $unit > 400:
            $result += ($unit - 400) * 3015;
            $unit = 400;
        case $unit > 300:
            $result += ($unit - 300) * 2919;
            $unit = 300;
        case $unit > 200:
            $result += ($unit - 200) * 2612;
            $unit = 200;
        case $unit > 100:
            $result += ($unit - 100) * 2074;
            $unit = 100;
        case $unit > 50:
            $result += ($unit - 50) * 1786;
            $unit = 50;
        default:
            $result += ($unit) * 1728;
    }
    return $result;
}

function calculateBill2(int $unit)
{
    $electricity = [
        400 => 3015,
        300 => 2919,
        200 => 2612,
        100 => 2074,
        50 => 1786,
        0 => 1728
    ];
    $result = 0;

    foreach ($electricity as $unitLevel => $price) {
        if ($unit > $unitLevel) {
            $result += ($unit - $unitLevel) * $price;
            $unit = $unitLevel;
        }
    }
    return $result;
}
