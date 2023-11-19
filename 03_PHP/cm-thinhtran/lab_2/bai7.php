<?php
    $anonymous = function(array $array, int $filterlength): array {
        return array_filter($array, function ($element) use ($filterlength) {
            return (strlen($element) <= $filterlength);
        });
    };
    $array = ["mouse", "cat", "dog"];
    $filterLength = 4;
    print_r($anonymous($array, $filterLength));
