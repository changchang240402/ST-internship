<?php
// Date time, include and require
include("Utils.php");

$date = date('Y-m-d', strtotime("next Sunday"));
echo isWeekend($date) ? "Là cuối tuần" : "Không phải cuối tuần";
echo "\n";


checkMeeting();
