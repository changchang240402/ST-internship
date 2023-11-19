<?php
// Question 7: PHP IF ELSE, FOR DO WHILE, SWITCH
// 1. Use FOR and DO WHILE to print the even value of a given min max range
// 1.1 Use For
function printEvenNumberFor($min, $max)
{
    for ($i = $min; $i <= $max; $i++) {
        if($i % 2 === 0) {
            echo $i . ' ';
        }
    }
}
printEvenNumberFor(1, 100);
// 1.2 Use While
function printEvenNumberDoWhile($min, $max)
{
    do {
        if($min % 2 === 0) {
            echo $min . ' ';
        }
        $min++;
    } while($min <= $max);
}
printEvenNumberDoWhile(1, 100);

// 2. print day of month use Switch Case
function getDaysOfMonth($month, $year)
{
    switch($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $days = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $days = 30;
            break;
        case 2:
            $isLeapYear = ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
            $days = 28;
            if ($isLeapYear) {
                $days = 29;
            }
            break;
        default:
    }
    return $days;
}
$days = getDaysOfMonth(2, 2014);
if ($days) {
    echo "Number of days in the month: {$days}" . "\n";
} else {
    echo 'Not Valid' . "\n";
}

// 3. Check variable not null
function isCheckNull($variable)
{
    if(is_null($variable)) {
        echo 'Variable is null';
    } else {
        echo 'Variable is not null';
    }
}
echo isCheckNull(null) . "\n";
echo isCheckNull(55) . "\n";
