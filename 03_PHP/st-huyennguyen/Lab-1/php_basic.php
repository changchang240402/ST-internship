<?php
// Write a function have to use recursive function
function recursive($i)
{
    if ($i < 5) {
        echo "Hello World!\n";
        $i++;
        return recursive($i);
    }
}
recursive(0);

// All words should be separated by one space and trim it
function correctSpacing($sentence)
{
    $result = preg_replace('/\s+/', ' ', $sentence);
    return trim($result);
}
echo correctSpacing("The film   starts       at      midnight. ") . "\n";
echo correctSpacing("The     waves were crashing  on the     shore.   ") . "\n";
echo correctSpacing(" Always look on    the bright   side of  life.") . "\n";

// Create a function that takes an array containing only numbers and return the element
function getFirstValue($array)
{
    return array_shift($array);
}
echo "Giá trị đầu tiên của mảng là " . getFirstValue([1, 2, 3]) . "\n";
echo "Giá trị đầu tiên của mảng là " . getFirstValue([80, 5, 100]) . "\n";
echo "Giá trị đầu tiên của mảng là " . getFirstValue([-500, 0, 50]) . "\n";

// Write a program to remove an specific element by value from array in PHP
// Xoa cac phan tu trung khop
function deleteItem($array, $deleteItem)
{
    while ($key = array_search($deleteItem, $array)) {
        unset($array[$key]);
    }
    return $array;
}

// Array_diff: tra ve cac phan tu khac nhau
function deleteItem2($array, ...$deleteItem)
{
    return array_diff($array, $deleteItem);
}

$list = array('jan', 'feb', 'march', 'april', 'may', 'april');
$deleteItem = 'april';
echo var_dump(deleteItem($list, $deleteItem));

// Create a function that takes a string and returns a string in which each character is repeated once
function doubleChar($str)
{
    $result = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $result .= str_repeat($str[$i], 2);
    }
    return $result;
}
echo doubleChar("String") . "\n";
echo doubleChar("Hello World!") . "\n";
echo doubleChar("1234!_ ") . "\n";

// How to check if an Array is a subnet of another Array?
function subnetArr($array, $anotherArray)
{
    $newArray = array_unique($array);
    $newAnother = array_unique($anotherArray);
    $checkSub = array_intersect($newArray, $newAnother);
    if (count($checkSub) == count($newAnother)) {
        return true;
    }
    return false;
}

$array = array('jan', 'feb', 'march', 'april', 'may', 'may');
$anotherArray = array('jan', 'may', 'nov');
if (subnetArr($array, $anotherArray) == true) {
    echo "true\n";
} else {
    echo "false\n";
}

// Sử dụng FOR and DO WHILE in ra giá trị chẵn của 1 khoảng giá trị min max cho trước
// For + if
function evenNumber($min, $max)
{
    if ($min % 2 == 0 && $min <= $max) {
        echo "$min ";
        $min += 2;
    } else {
        $min += 1;
    }
    for ($min; $min <= $max; $min += 2) {
        echo "$min ";
    }
}
evenNumber(10, 20);
echo "\n";

function evenNumber2($min, $max)
{
    for ($min; $min <= $max; $min++) {
        if ($min % 2 == 0) {
            echo "$min ";
        }
    }
}

// Do while
function evenNumber3($min, $max)
{
    if ($min % 2 == 0 && $min <= $max) {
        echo "$min ";
        $min += 2;
    } else {
        $min += 1;
    }
    do {
        echo "$min ";
        $min += 2;
    } while ($min <= $max);
}

function evenNumber4($min, $max)
{
    do {
        if ($min % 2 == 0) {
            echo "$min ";
        }
        $min++;
    } while ($min <= $max);
}
evenNumber3(10, 47);
echo "\n";


// Sử dụng SWITCH CASE để in ra số ngày trong tháng 
// switch case with or condition:
function dayOfMonth($month, $year)
{
    $checkLeapYear = ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
    $day = 0;
    switch ($month) {
        case 2:
            $day = $checkLeapYear ? 29 : 28;
            break;
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $day = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $day = 30;
            break;
        default:
            $day = -1;
    }
    return $day;
}
$month = 2;
$year = 2024;
$day = dayOfMonth($month, $year);
if ($day == -1) {
    echo "Không có tháng $month\n";
} else {
    echo "Tháng $month có $day ngày\n";
}

// switch case check in array
function dayOfMonth2($month, $year)
{
    $checkLeapYear = ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
    $oddMonth = ["1", "3", "5", "7", "8", "10", "12"];
    $evenMonth = ["4", "6", "9", "11"];
    $day = 0;
    switch (true) {
        case $month == 2:
            $day = $checkLeapYear ? 29 : 28;
            break;
        case in_array($month, $oddMonth):
            $day = 31;
            break;
        case in_array($month, $evenMonth):
            $day = 30;
            break;
        default:
            $day = -1;
    }
    return $day;
}
$month = 11;
$year = 2024;
$day = dayOfMonth($month, $year);
if ($day == -1) {
    echo "Không có tháng $month\n";
} else {
    echo "Tháng $month có $day ngày\n";
}

// Sử dụng IF ELSE để check 1 biến khác null 
function checkNull($var)
{
    if (is_null($var)) {
        return "Đây là giá trị Null\n";
    }
    return "$var không phải là giá trị Null\n";
}
echo checkNull(520);
echo checkNull(null);

// Write a function to calculate the electricity bill use if-else conditions or switch case.
function calculateBill(int $units)
{
    $cost = 0;
    switch (true) {
        case $units > 400:
            $cost += ($units - 400) * 3015;
            $units = 400;
        case $units > 300:
            $cost += ($units - 300) * 2919;
            $units = 300;
        case $units > 200:
            $cost += ($units - 200) * 2612;
            $units = 200;
        case $units > 100:
            $cost += ($units - 100) * 2074;
            $units = 100;
        case $units > 50:
            $cost += ($units - 50) * 1786;
            $units = 50;
        default:
            $cost += $units * 1728;
            break;
    }
    return $cost;
}
echo "Chi phí phải trả là " . calculateBill(50) . " đồng\n";
echo "Chi phí phải trả là " . calculateBill(650) . " đồng\n";
