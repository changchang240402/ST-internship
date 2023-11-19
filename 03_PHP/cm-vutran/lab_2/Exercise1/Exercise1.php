<?php
define('day', 20);

function isWeekend($date)
{
    return date('w', strtotime($date)) == 0;
}

function isDay20()
{
    return date('d') == day;
}

function distanceWithDay20()
{
    if (date('d') < day) {
        return day - date('d');
    }
    return day + date('t') - date('d');
}

function nearestSunDay()
{
    $nextSunday = date('Y-m-d', strtotime("next sunday"));
    return $nextSunday;
}

function checkSchedule($currentDate)
{
    echo "Ngày hiện tại: $currentDate \n";

    if (!isDay20()) {
        echo "Hôm nay không phải là ngày " .day .".\n";
        $distanceDay = distanceWithDay20();
        echo "Còn $distanceDay ngày nữa sẽ đến ngày " . day . " gần nhất\n";
    } else {
        echo "Hôm nay là ngày " . day .".\n";
        if (isWeekend($currentDate)) {
            echo "Hôm nay là cuối tuần. Bạn có lịch hẹn vào ngày hôm nay.";
        } else {
            $sundayDate = nearestSunDay();
            echo "Lịch hẹn sẽ dời đến ngày $sundayDate";
        }
    }
}

$currentDate = date('Y-m-d');
checkSchedule($currentDate);
