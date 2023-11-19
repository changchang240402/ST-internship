<?php
require_once 'CheckCalendar.php';
const dayMeeting = 20;

function checkCalendar()
{
    $today = date('d');
    if ($today == dayMeeting) {
        echo "Hôm nay là ngày 20!" . "\n";
    } else {
        $daysUntil20th = daysUntilNext20th();
        if ($daysUntil20th > 0) {
            echo "Hôm nay không phải là ngày 20. Còn $daysUntil20th ngày đến ngày 20 gần nhất." . "\n";
        } else {
            if (isWeekend(date('Y-m-d'))) {
                echo "Hôm nay là cuối tuần, hãy nhớ lịch hẹn vào ngày hôm nay!" . "\n";
            } else {
                $nextSunday = getNextSunday();
                echo "Lịch hẹn sẽ dời đến ngày $nextSunday." . "\n";
            }
        }
    }
}
checkCalendar();
