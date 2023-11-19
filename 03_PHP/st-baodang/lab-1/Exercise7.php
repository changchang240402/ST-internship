<?php
// ====================================================================
// PHP IF ELSE, FOR DO WHILE, SWITCH
// Sử dụng FOR and DO WHILE in ra giá trị chẵn của 1 khoảng giá trị min max cho trước
function evenValue($min, $max)
{
    if ($min % 2 !== 0 && $min <= $max) {
        $min++;
    }
    for ($i = $min; $i <= $max; $i += 2) {
        echo "$i ";
    }
}

function evenValue2($min, $max)
{
    if ($min % 2 !== 0 && $min <= $max) {
        $min++;
    }
    do {
        echo "$min ";
        $min += 2;
    } while ($min <= $max);
}
