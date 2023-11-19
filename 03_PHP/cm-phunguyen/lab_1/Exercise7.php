<?php
//Bài1.
//Cách 1: Dùng for
function printEvenNum1($min, $max)
{
    $evenNum = array();
    for ($i = $min; $i <= $max; $i++) {
        if ($i % 2 == 0)
            $evenNum[] = $i;
    }
    return $evenNum;
}

//Cách 2: Dùng Do While
function printEvenNum2($min, $max)
{
    $evenNum = array();
    do {
        if ($max % 2 == 0)
            $evenNum[] = $max;
        $max--;
    } while ($min <= $max);
    return $evenNum;
}

//Bài2:
function dayInMonth($month, $year)
{
    $month31 = [1, 3, 5, 7, 8, 10, 12];
    $month32 = [4, 6, 9, 11];
    $monthSpecial = [2];
    switch (true) {
        case in_array($month, $month31):
            $day = 31;
            break;
        case in_array($month, $month32):
            $day = 30;
            break;
        case in_array($month, $monthSpecial):
            $checkYear = ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0));
            if ($checkYear == true) {
                $day = 29;
                break;
            } else
                $day = 28;
            break;
        default:
            return "Invalid Month!";
            break;
    }
    return $day;
}

//Bài 3:
function checkNullVar($var)
{
    if (!is_null($var))
        return "Variable is not null!";
    return "Variable is null!";
}
