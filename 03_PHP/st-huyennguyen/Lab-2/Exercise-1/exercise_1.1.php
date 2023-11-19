<?php
function isWeekend($date)
{
    $checkWeekend = date_format($date, "D");
    if ($checkWeekend == "Sun") {
        return true;
    }
    return false;
}
