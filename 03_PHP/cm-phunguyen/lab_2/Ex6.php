<?php
function returnValue(int|float|string|array $data, string $filter = null): int
{
    if (is_int($data)) {
        return $data;
    }
    if (is_float($data)) {
        return round($data, 0);
    }
    if (is_string($data)) {
        return strlen($data);
    }
    if (is_array($data)) {
        if (in_array($filter, $data)) {
            return count(array_filter($data, function ($v) use ($filter) {
                return ($v === $filter);
            }));
        } else {
            return count($data);
        }
    }
}
$entry = ['foo', false, -1, null, '', '0', 0];
print_r(returnValue($entry), '0');
