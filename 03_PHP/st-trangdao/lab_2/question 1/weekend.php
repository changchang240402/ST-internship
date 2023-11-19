<?php
function isWeekend(string $d)
{
    if (strtotime($d)) {
        return date('l', strtotime($d)) === 'Sunday';
    }
}
function isWeekend1(DateTime $d)
{
    if ($d->format('l') === 'Sunday') {
        return true;
    }
}
function checkDay20AndMeeting()
{
    $a = 0;
    if (date('d') !== '20') {
        echo "Ngày hôm nay không phải ngày 20. \n";
        if (date('d') < 20) {
            $a = 20 - date('d');
        } else {
            $a = date('t') - date('d') + 20;
        }
        echo "Còn $a ngày nữa đến ngày 20 kế tiếp.\n";
    } elseif (date('l') === 'Sunday') {
        echo "Có lịch hẹn vào ngày hôm nay.\n";
    } else {
        $nextSunday = date('d-m-Y', strtotime("next Sunday"));
        $b = 7 - date('N');
        echo "Lịch hẹn sẽ dời đến $nextSunday . Còn $b ngày nữa đến lịch hẹn.\n";
    }
}
function checkDay20AndMeeting2()
{
    switch (true) {
    case date('d') < 20:
        echo "Còn " . 20 - date('d') . " ngày nữa đến ngày 20 kế tiếp.\n";
        break;
    case date('d') > 20:
        echo "Còn " . date('t') - date('d') + 20 . " ngày nữa đến ngày 20 kế tiếp.\n";
        break;
    case date('N') === '7':
        echo "Có lịch hẹn vào ngày hôm nay.\n";
        break;
    default:
        echo "Lịch hẹn sẽ dời đến " . date('d-m-Y', strtotime("next Sunday")) . " . Còn " . 7 - date('N') . " ngày nữa đến lịch hẹn.\n";
    }
}
