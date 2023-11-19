<?php
function countDataType(array $item)
{
	if (empty($item)) {
		return "[]";
	}
	$b = array_map("gettype", $item);
	$c = ["string", "integer", "double", "boolean", "array", "NULL"];
	return array_count_values(array_intersect($b, $c));
}
$item = [1, 10 / 3, "tre", [0, 1, 2], null, true];
print_r(countDataType($item));