<?php
	function isSubnetArray($array, $array_check){
		return sizeof($array_check) == sizeof(array_intersect($array_check, $array)) ;
	}

	$array = array('jan', 'feb', 'march', 'april', 'may');
	$array_check = array('jan', 'may', 'may');

	print_r(isSubnetArray($array, $array_check));

?>