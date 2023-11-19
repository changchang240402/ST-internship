<?php

$items = [1, 2.0, 'string', [1], true, null, 2];
function counDataType($items)
{
    return array_count_values(array_map('gettype', $items));
}
print_r(counDataType($items));
