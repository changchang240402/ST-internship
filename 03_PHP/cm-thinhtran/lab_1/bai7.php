<?php
	function getEvenValuesUsingFor($min, $max){
		if ($min % 2 == 0 && $min <= $max) {
			echo $min . "\n";
			$min += 2;
		} else {
			$min += 1;
		}
		for ($min; $min <= $max; $min += 2) {
			echo $min . "\n";
		}
	}

	function getEvenValuesUsingDoWhile($min, $max){
		if ($min % 2 == 0 && $min <= $max) {
			echo $min . "\n";
			$min += 2;
		} else {
			$min += 1;
		}
		do {
			echo $min . "\n";
			$min += 2;
		} while ($min <= $max);
	}

	function isLeapYear($year){
		return ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) ;
	}

	function getAmountOfDaysOfMonth($year, $month){
		switch ($month) {
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				print_r(31);
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				print_r(30);
				break;
			case 2:
				print_r((isLeapYear($year) ? 29 : 28));
				break;
			default:
				print_r("Invalid month");
		}
	}

	function isNull($check){
		return $check == null;
	}

	$min = 0;
	$max = 9;
	print_r("Get even number:\n");
	print_r(getEvenValuesUsingFor($min, $max));
	print_r("\n");
	print_r(getEvenValuesUsingDoWhile($min, $max));

	print_r("\nAmount of days: ");
	print_r(getAmountOfDaysOfMonth(2023, 9));

	print_r("\nIs null: ");
	print_r(isNull(null));

?>