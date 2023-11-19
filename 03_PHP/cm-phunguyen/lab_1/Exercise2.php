<?php

// Cách 1:
function correctSpacing1($sentence)
{
    $pattern = "/\s+/";
    echo preg_replace($pattern, ' ', trim($sentence, ' '));
}

// Cách 2: 
function correctSpacing2($sentence)
{
    $pattern = explode(" ", $sentence);
    $pattern = array_filter($pattern, 'strlen');
    return implode(" ", $pattern);
}

// Cách 3:
function correctSpacing3($sentence)
{
    $pattern = explode(" ", $sentence);
    $resultArr = array();
    foreach ($pattern as $key => $value) {
        if ($value !== "")
            $resultArr[] = ($value);
    }
    return implode(" ", $resultArr);
}
