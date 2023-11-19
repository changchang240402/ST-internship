<?php
    function checkString(string $string){
        if (filter_var($string, FILTER_VALIDATE_URL) || filter_var($string, FILTER_VALIDATE_EMAIL)) {
            return "$string is a valid";
        }
        if (!is_string($string)) {
            throw new Exception("Value is not string - Code 500");
        }
        if (empty($string)) {
            throw new Exception("Value is empty - Code 400");
        }
        throw new Exception("Others error - Code 422");

    }
    $string = "https://www.w3schools.com";
    echo checkString($string);
