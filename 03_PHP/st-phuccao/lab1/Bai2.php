<?php

function removeSpace($sentence)
{
    // Chia chuỗi thành các từ riêng biệt
    $words = explode(" ", $sentence);
    // Loại bỏ các từ trống
    $words = array_filter($words, "strlen");
    // Ghép lại các từ bằng một khoảng trắng
    $corrected = implode(" ", $words);
    return $corrected;
}
function removeSpaceUsingRegrex($sentence) {
    $corrected = preg_replace('/\s+/', ' ', $sentence);
    return trim($corrected);
}
echo removeSpaceUsingRegrex("The film   starts    at      midnight. ");
echo "<br/>";
echo removeSpaceUsingRegrex("The     waves were crashing  on the     shore.   ");
echo "<br/>";
echo removeSpaceUsingRegrex(" Always look on    the bright   side of  life.");
