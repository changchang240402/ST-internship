<?php 
// Solution 1:
function calculateBill(int $units) {
    $charges = [1728, 1786, 2074, 2612, 2919, 3015];
    $range = [50, 50, 100, 100, 100, PHP_INT_MAX];
    $totalPrice = 0;
    for($i = 0; $i <= count($charges); $i++) {
        if($units <= $range[$i]) {
            $totalPrice += $charges[$i] * $units;
            break;
        } else {
            $totalPrice += $charges[$i] * $range[$i];
            $units -= $range[$i];
        }
    }
    return $totalPrice;
}
// Solution 2:
function calculateBill2(int $units) {
    $costRange = [
        ['range' => 400, 'cost' => 3015, 'util' => 0],
        ['range' => 300, 'cost' => 2919, 'util' => 0],
        ['range' => 200, 'cost' => 2612, 'util' => 0],
        ['range' => 100, 'cost' => 2074, 'util' => 0],
        ['range' => 50, 'cost' => 1786, 'util' => 0],
        ['range' => 0, 'cost' => 1728, 'util' => 0],
    ];
    $bill = 0;
    if ($units < 0) {
        return 'Nhập giá trị lớn hơn 0';
    }
    foreach($costRange as $range){
        if($units > $range['range']) {
            $range['util'] = $units - $range['range'];
            $bill = $bill + $range['cost'] * $range['util'] ;
            $units = $units - $range['util'] ;
        }
    }
    return $bill;
}

echo calculateBill2(70);
echo calculateBill(70);
?>
