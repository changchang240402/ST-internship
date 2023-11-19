<?php

function doubleChar($str)
{
    $rs = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $rs = $rs . $str[$i] . $str[$i];
    }
    return $rs;
}
