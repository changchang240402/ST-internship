<?php
    function countInArray(array $data, string $filter = null): int {
        return count(array_filter($data,function ($element) use ($filter) {
            return strval($element) === strval($filter);
        }));
    }

    function typeHint(int|float|string|array $data, string $filter = null) : int {
        if( is_int($data)){
            return $data;
        }
        if( is_double($data)){
            return round($data);
        }
        if( is_string($data)){
            return strlen($data);
        }
        if( is_array($data)){
            if(is_string($filter)){
                return countInArray($data, $filter);
            }
            return count($data);
        }
    }

    $data = [1,"null","null",4];
    $filter = "null";
    print_r(typeHint($data, $filter));
