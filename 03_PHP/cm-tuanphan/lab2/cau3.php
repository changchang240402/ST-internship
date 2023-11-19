<?php
    $items = [];
    function type_detect_callback($item){
        if (is_string($item)) {
            return "string";
        }
        if (is_int($item)){
            return "integer";
        }
        if (is_float($item)){
            return "float";
        }
        if (is_bool($item)){
            return "bool";
        }
        if (is_array($item)) {
            return "array";
        }
        if (is_null($item)) {
            return "extra code to handle";
        }
    }
    print_r(array_count_values(array_map("type_detect_callback", $items)));

    
    