<?php

/*Question 1*/
function recursive($n)
{
    if ($n < 0) {
        return  "Không tồn tại";
    } elseif ($n == 0) {
        return 3;
    } elseif ($n == 1) {
        return 5;
    } elseif ($n > 1) {
        return recursive($n - 2) + recursive($n - 1);
    }
}
// Test question 1
echo recursive(5) . "\n";

/*Question 2*/
function correctSpacing($sentence)
{
    return preg_replace('/\s+/', ' ', trim($sentence));
}
// Test question 2
echo correctSpacing("The film   starts       at      midnight. ") . "\n";
echo correctSpacing("The     waves were crashing  on the     shore.   ") . "\n";
echo correctSpacing(" Always look on    the bright   side of  life.") . "\n";

/*Question 3*/
function getFirstValue($array)
{
    return array_shift($array);
}
// Test question 3
echo getFirstValue([1, 0, 50]) . "\n";
echo getFirstValue([80, 5, 100]) . "\n";
echo getFirstValue([-500, 0, 50]) . "\n";

/*Question 4*/
$lits = array('jan', 'feb', 'march', 'april', 'may');
$delete_item = 'april';
// Use array_diff
function removeElement1($array, $item)
{
    return array_diff($array, [$item]);
}
// Test Question 4 C1
print_r(removeElement1($lits, $delete_item)) . "\n";

// Ues array_search
function removeElement2($array, $item)
{
    while ($key = array_search($item,$array)) {
        unset($array[$key]);
    }
    return $array;
}
// Test Question 4 C2
print_r(removeElement2($lits, $delete_item)) . "\n";

// Use foreach
function removeElement3($array, $item)
{
    foreach ($array as $key => $value) {
        if ($value === $item) {
            unset($array[$key]);
        }
    }
    return $array;
}
// Test Question 4 C3
print_r(removeElement3($lits, $delete_item)) . "\n";

/*Question 5*/
function doubleChar($str)
{
    $str1 = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $str1 .= $str[$i] . $str[$i];
    }
    return $str1;
}
// Test Question 5 
echo doubleChar("String") . "\n";
echo doubleChar("Hello World!") . "\n";
echo doubleChar("1234!_ ") . "\n";

/*Question 6*/
$array = array('jan', 'feb', 'march', 'april', 'may', 'may');
$another_array = array('jan', 'may');
// Use array_intersect
function checkSubnet1($array, $another_array)
{
    $array1 = array_intersect($another_array,$array);
    if (count($array1) === count($another_array)) {
        return true;
    }
    return false;  
}
// Test Question 6 c1 
echo checkSubnet1($array, $another_array) . "\n";

// Use array_diff
function checkSubnet2($array, $another_array)
{
    $array1 = array_diff($another_array, $array);
    if (empty($array1)) {
        return true;
    } else {
        return false;
    }
}
// Test Question 6 c2 
echo checkSubnet2($array, $another_array) . "\n";

// Use array_search
function checkSubnet3($array, $another_array)
{
    foreach ($another_array as $value) {
        if (array_search($value, $array) === false) {
            return false;
        }
    }
    return true;
}
// Test Question 6 c3 
echo checkSubnet3($array, $another_array) . "\n";

// Use in_array
function checkSubnet4($array, $another_array)
{
    foreach ($another_array as $value) {
        if (!in_array($value, $array)) {
            return false;
        }
    }
    return true;
}
// Test Question 6 c4 
echo checkSubnet4($array, $another_array) . "\n";

/*Question 7*/
// Question 7.1
// Use for
function evenValue1($min, $max)
{
    if ($min % 2 == 0 && $min <= $max) {
        echo $min . "\n";
        $min += 2;
    } else {
        $min += 1;
    }
    for ($min; $min <= $max; $min += 2) {
        echo $min . "\n";
    }
}
// Test Question 7.1 c1
echo evenValue1(20, 50) . "\n";

// Use do while
function evenValue2($min, $max)
{
    if ($min % 2 == 0 && $min <= $max) {
        echo $min . "\n";
        $min += 2;
    } else {
        $min += 1;
    }
    do {
        echo $min . "\n";
        $min += 2;
    } while ($min <= $max);
}
// Test Question 7.1 c2
echo evenValue2(31, 81) . "\n";

// Question 7.2
function numberOfDays($month, $year)
{
    $month31 = [1,3,5,7,8,10,12];
    $month30 = [4,6,9,11];
    switch (true) {
        case in_array($month,$month31):
            $result =  "Tháng $month của $year có 31 ngày";
            break;
        case in_array($month,$month30):
            $result =  "Tháng $month của $year có 30 ngày";
            break;
        case in_array($month,[2]):
            if ($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0) {
                $result =  "Tháng $month của $year có 29 ngày";
            } else {
                $result =  "Tháng $month của $year có 28 ngày";
            }
            break;
        default:
            $result =  "Không tồn tại";
    }
    return $result;
}
// Test Question 7.2
echo numberOfDays(2, 2000) . "\n";
echo numberOfDays(2, 2100) . "\n";
echo numberOfDays(1, 2023) . "\n";
echo numberOfDays(4, 2002) . "\n";
echo numberOfDays(13, 2002) . "\n";

//Question 7.3
function checkNull($variable)
{
    if (!is_null($variable)) {
        echo "Biến không phải là null và có giá trị là $variable";
    } else {
        echo "Biến là null";
    }
}
// Test Question 7.3
echo checkNull(null) . "\n";
echo checkNull(3) . "\n";

//Question 8
function calculateBill($units)
{
    $bill = 0;
    $price_tires = [[50, 1728], [50, 1786], [100, 2074], [100, 2612], [100, 2919]];
    foreach ($price_tires as $value) {
        list($tier, $cost) = $value;
        if ($units <= 0) {
            break;
        }
        $tier_cost = min($units, $tier) * $cost;
        $bill += $tier_cost;
        $units -= $tier;
    }
    if ($units > 0) {
        $bill += $units * 3015;
    }
    return $bill;
}
// Test Question 8
echo calculateBill(250) . "\n";
echo calculateBill(450) . "\n";
echo calculateBill(331) . "\n";

