<?php
// Sử dụng SWITCH CASE để in ra số ngày trong tháng
function dayOfMonth($month, $year)
{
    $oddMonth = [1, 3, 5, 7, 8, 10, 12];
    $evenMonth = [4, 6, 9, 11];
    $isLeapYear = ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);

    switch (true) {
        case in_array($month, $oddMonth):
            $result = 31;
            break;
        case in_array($month, $evenMonth):
            $result = 30;
            break;
        case $month === 2:
            $result = $isLeapYear ? 29 : 28;
            break;
        default:
            $result = -1;
    }
    return $result;
}

// Sử dụng (match)
function dayOfMonth2($month, $year)
{
    $isLeapYear = ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    $result = match ($month) {
        1, 3, 5, 7, 8, 10, 12 => 31,
        4, 6, 9, 11 => 30,
        2 => $isLeapYear ? 29 : 28,
        default => -1
    };
    return $result;
}
