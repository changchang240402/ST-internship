<?php

function isWeekend(string $date)
{
    return date('N', strtotime($date))==7;
}

function checkSchedule($currentDate)
{
    // Lấy ngày trong tháng hiện tại
    $dayOfMonth = (int) $currentDate->format("d");
    // Kiểm tra xem ngày hiện tại có phải là ngày 20 không
    if ($dayOfMonth != 20) {
        echo "Hôm nay là ngày $dayOfMonth, không phải ngày 20 của tháng.\n";
        if ($dayOfMonth < 20) {
            // Lấy ngày 20 của tháng hiện tại
            $next20th = new DateTime($currentDate->format("Y-m-20"));
        } else {
            // Lấy ngày 20 của tháng tiếp theo
            $next20th = new DateTime(date("Y-m-20", strtotime("+1 month")));
        }
        // Tính số ngày còn lại
        $interval = $currentDate->diff($next20th);
        $daysLeft = $interval->days;
        echo "Số ngày còn lại đến ngày 20 gần nhất : " . $daysLeft . " ngày.\n";
    } else {
        if (isWeekend($currentDate->format('Y-m-d'))) {
            echo "Hôm nay bạn có lịch hẹn.\n";
        } else {
            $remainingDays = 7 - $currentDate->format("w");
            $nextSundayTimestamp = $currentDate->getTimestamp() + $remainingDays * 24 * 60 * 60;
            $nextSundayFormatted = date("Y-m-d", $nextSundayTimestamp);
            echo "Lịch hẹn sẽ dời đến ngày $nextSundayFormatted.";
        }
    }
}

// Tạo một đối tượng DateTime từ một ngày
$dateToCheck = '2023-09-17';
// Kiểm tra ngày có phải cuối tuần hay không
if (isWeekend($dateToCheck)) {
    echo "Ngày " . $dateToCheck. " là ngày cuối tuần.\n";
} else {
    echo "Ngày " . $dateToCheck. " không phải là ngày cuối tuần.\n";
}

// Lấy ngày hiện tại
$currentDate = new DateTime();

checkSchedule($currentDate);
