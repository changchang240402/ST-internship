<?php
// Kiểm tra $date có phải là ngày chủ nhật không?
function isWeekend(string $date)
{
    return date('D',strtotime($date)) === "Sun";
}

// Kiểm tra xem hôm nay có lịch hẹn không
function checkMeeting()
{
    $meetingDay = 20;
    if (date('d') != $meetingDay) {
        $day = date('d') < $meetingDay ? $meetingDay - date('d') : $meetingDay + date('t') - date('d');
        echo "Cách lần gặp kế tiếp còn $day ngày";
    } elseif (date('D') === "Sun") {
        echo "Có lịch hẹn vào ngày hôm nay";
    } else {
        $nextSunday = date('d-M-Y', strtotime("next sunday"));
        echo "Lịch hẹn sẽ dời đến ngày $nextSunday";
    }
}
