<?php
function isWeekend($appointmentDateTime)
{
    $appointmentDate = $appointmentDateTime->format('Y-m-d');
    $appointmentDay = $appointmentDateTime->format('d');
    if ($appointmentDay == '20') {
        $dayOfWeekApp = $appointmentDateTime->format('w');
        if ($dayOfWeekApp == '0') {
            echo "Bạn có lịch hẹn vào hôm nay!";
        } else {
            $nearestSunDay = date('d-m-Y', strtotime('next Sunday', strtotime($appointmentDateTime)));
            echo "Lịch hẹn sẽ đổi lại ngày " . $nearestSunDay . ".";
        }
    } else {
        echo "Không phải ngày 20";
        $interval = 0;
        if ($appointmentDay >= '20') {
            $dayNumberOfMonth = date('t', strtotime($appointmentDate));
            $interval = 20 + $dayNumberOfMonth - $appointmentDay;
        } else {
            $interval = 20 - $appointmentDay;
        }
        echo "\n";
        echo "Khoảng thời gian đến ngày 20 gần nhất là: " . $interval . " ngày.";
    }
}
$currentDateTime = new DateTime('now');
print_r(isWeekend($currentDateTime));
