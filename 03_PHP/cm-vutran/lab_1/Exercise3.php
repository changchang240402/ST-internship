<?php
function getFirstValue($array) {
    return empty($array) ? 'Array is empty': $array[0];
        
}
echo getFirstValue([]);
echo "\n";
echo getFirstValue([1, 2, 3]);