<?php
// ====================================================================
// PHP Array (Repeating Letter)
function doubleChar($str)
{
    $result = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $result .= $str[$i] . $str[$i];
    }
    return $result;
}

// Cách này thêm để làm quen với Syntax của PHP
function doubleChar2($str)
{
    if (strlen($str) === 0) {
        return "";
    }
    $str_arr = str_split($str);
    return implode(array_map(function ($char) {
        return $char . $char;
    }, $str_arr));
}
