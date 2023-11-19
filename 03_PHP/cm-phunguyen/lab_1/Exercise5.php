<?php
function doubleChar($str)
{
    $pieces = str_split($str);
    $resultArr = array();
    foreach ($pieces as &$value) {
        array_push($resultArr, $value, $value);
    }
    $resultStr = implode($resultArr);
    return $resultStr;
}
echo doubleChar('string');
