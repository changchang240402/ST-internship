<?php
$func = function ($array, $filterLeghth) {
	return array_filter($array, function ($value) use ($filterLeghth) {
		return strlen($value) <= $filterLeghth;
	});
};
$array = ["black", "blue", "red", "green", "pink"];
print_r($func($array, 4));
