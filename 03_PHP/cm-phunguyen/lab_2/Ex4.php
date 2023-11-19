<?php
function checkFormat($string)
{
    if (empty($string)) {
        throw new Exception("Biến empty", 400);
    }
    if (!is_string($string)) {
        throw new Exception("Biến không phải kiểu String", 500);
    }
    if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
        return 'email';
    }
    if (filter_var($string, FILTER_VALIDATE_URL)) {
        return 'url';
    }
    throw new Exception("Không phù hợp với định dạng Email hoặc URL", 422);
}
try {
    $string = 2;
    $result = checkFormat($string);
    echo $result;
} catch (Exception $e) {
    echo 'Message: ', $e->getMessage();
    echo ' - Code: ', $e->getCode();
}
