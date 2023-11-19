<?php
//solution 1
function calculateElectricityBill($units) {
    $totalBill = 0;

    if ($units <= 50) {
        $totalBill = $units * 1728;
    } elseif ($units <= 100) {
        $totalBill = 50 * 1728 + ($units - 50) * 1786;
    } elseif ($units <= 200) {
        $totalBill = 50 * 1728 + 50 * 1786 + ($units - 100) * 2074;
    } elseif ($units <= 300) {
        $totalBill = 50 * 1728 + 50 * 1786 + 100 * 2074 + ($units - 200) * 2612;
    } elseif ($units <= 400) {
        $totalBill = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + ($units - 300) * 2919;
    } else {
        $totalBill = 50 * 1728 + 50 * 1786 + 100 * 2074 + 100 * 2612 + 100 * 2919 + ($units - 400) * 3015;
    }

    return $totalBill;
}

//solution 2
function calculateElectricityBill2($units) {
    $costRange = [
        ['range' => 50, 'cost' => 1728],
        ['range' => 50, 'cost' => 1786],
        ['range' => 100, 'cost' => 2074],
        ['range' => 100, 'cost' => 2612],
        ['range' => 100, 'cost' => 2919],
    ];
    $totalBill = 0;

    foreach ($costRange as $range) {
        $rangeUnits = min($units, $range['range']);
        $totalBill += $rangeUnits * $range['cost'];
        $units -= $rangeUnits;

        if ($units <= 0) {
            break;
        }
    }
    if ($units > 0) {
        $totalBill += $units * 3015;
    }
    return $totalBill;
}
$units = 600;

$billAmount = calculateElectricityBill($units);
echo "Solution 1|your electricity bill for $units kWh is: $billAmount VND\n";

$billAmount = calculateElectricityBill2($units);
echo "Solution 2|your electricity bill for $units kWh is: $billAmount VND\n";
