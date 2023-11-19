<?php
function typeHint($data, $filter) {
    if(is_int($data)) {
        return $data;
    }
    if(is_float($data)) {
        return round($data, 0);
    }
    if(is_string($data)) {
        return strlen($data);
    }
    if(is_array($data)) {
        if (is_string($filter)) {
            return array_filter($data, function ($var) use($filter) {
                return ($var == $filter);
            });   
        }
        else {
            return count($data);
        }
    }
}

$data = 3.14159;
$filter = null;
$result = typeHint($data, $filter);
print_r($result);

