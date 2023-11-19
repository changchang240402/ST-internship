<?php

// Solution 1 :
function calculate_bill_1(int $units)
{
    $total_bill = 0;

    if ($units <= 50) {
        $total_bill = $units * 1728; // 1728 đồng/kWh
    } elseif ($units <= 100) {
        $total_bill = 50 * 1728 + ($units - 50) * 1786; // Cho 50 kWh đầu 1728 đồng/kWh, cho 50 kWh tiếp theo 1786 đồng/kWh
    } elseif ($units <= 200) {
        $total_bill = 50 * 1728 + 50 * 1786 + ($units - 100) * 2074;
    } elseif ($units <= 300) {
        $total_bill =
            50 * 1728 + 50 * 1786 + 100 * 2074 + ($units - 200) * 2612;
        $total_bill =
            50 * 1728 +
            50 * 1786 +
            100 * 2074 +
            100 * 2612 +
            ($units - 300) * 2919;
    } else {
        $total_bill =
            50 * 1728 +
            50 * 1786 +
            100 * 2074 +
            100 * 2612 +
            100 * 2919 +
            ($units - 400) * 3015;
    }
    return $total_bill;
}

$units = 40;
$bill = calculate_bill($units);
echo "Hóa đơn tiền điện cho $units kWh là: $bill đồng";

//Solution 2:
function calculate_bill(int $units)
{
    // Định nghĩa mảng giới hạn và giá trị tương ứng
    $rates = [
        ["range" => 50, "limit" => 50, "value" => 1728],
        ["range" => 50, "limit" => 100, "value" => 1786],
        ["range" => 100, "limit" => 200, "value" => 2074],
        ["range" => 100, "limit" => 300, "value" => 2612],
        ["range" => 100, "limit" => 400, "value" => 2919],
        ["range" => null, "limit" => null, "value" => 3015],
    ];

    $total_bill = 0;
    $remaining_units = $units;

    // Duyệt qua mảng giới hạn và tính tổng hóa đơn
    foreach ($rates as $rate) {
        if ($remaining_units <= 0) {
            break;
        }
        $range = $rate["range"];
        $limit = $rate["limit"];
        $value = $rate["value"];
        if ($limit === null || $remaining_units <= $limit) {
            $total_bill += ($remaining_units % $limit) * $value;
            break;
        }
        $total_bill += $range * $value;
        echo $total_bill;
    }
    return $total_bill;
}

$units = 40;
$bill = calculate_bill($units);
echo "Hóa đơn tiền điện cho $units kWh là: $bill đồng";
