<?php

    $validType = ["string", "integer", "double", "boolean", "array", "NULL"];

    $items = [1,1,2.0, "string", [1], true, null, null];
    function countDataType(array $items): array {
        global $validType;
        $result = array();
        foreach(array_map("gettype", $items) as $type){
            if(in_array($type, $validType))
                $result[$type] = isset($result[$type]) ? ($result[$type] + 1) : 1;
        }
        return $result;
    }
    print_r(countDataType($items));
