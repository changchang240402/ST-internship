<?php
    function isWeekend(DateTime $date): bool {
        return $date->format("w") == 0;
    }

    function getNearestSunday(DateTime $date): DateTime {
        $dateNew = clone $date;
        if($dateNew->format("w") == 0) {
            return $dateNew;
        }
        $dateAdd = 7-$dateNew->format("w");
        return $dateNew->modify("+$dateAdd day");
    }

    function validateMeetDate(DateTime $date, string|int $meetDay){
        switch (true) {
			case $date->format('d') < $meetDay:
				echo $meetDay - $date->format('d') . " ngày nữa đến ngày $meetDay.\n";
				break;
			case $date->format('d') > $meetDay:
				echo $date->format('t') - $date->format('d') + $meetDay . " ngày nữa đến ngày $meetDay kế tiếp.\n";
				break;
			case $date->format('N') === '7':
				echo "Have meet today!!\n";
				break;
			default:
				echo "Lịch hẹn sẽ dời đến ngày " . getNearestSunday($date)->format("Y-m-d") . "\n";
		}
    }

    $dateInString = "2023-09-10";
    $date = new DateTime($dateInString);
    $meetDay = 20;
    echo "Ngày ". $date->format("Y-m-d")." có phải là chủ nhật: ".isWeekend($date)."\n";
    validateMeetDate($date, $meetDay);
