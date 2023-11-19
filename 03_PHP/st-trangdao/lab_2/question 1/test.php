<?php
//use include
include 'weekend.php';

$date = date('Y-m-d', strtotime("last Sunday"));
echo isWeekend($date) ? "Vậy ngày đó là chủ nhật\n" : "Ngày đó không phải là chủ nhật\n";
echo isWeekend1(new DateTime('2023-07-19')) ? "Vậy ngày đó là chủ nhật\n" : "Ngày đó không phải là chủ nhật\n";
checkDay20AndMeeting();
checkDay20AndMeeting2();