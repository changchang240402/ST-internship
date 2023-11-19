<?php
// URL Regex
$urlRegex = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

// Xác minh biến $str
function validate($str)
{
    if (empty($str)) {
        throw new Exception("Biến truyền vào rỗng", 400);
    }
    if (!is_string($str)) {
        throw new Exception("Biến truyền vào không phải kiểu String", 500);
    }
    if (!filter_var($str, FILTER_VALIDATE_EMAIL) && !preg_match($GLOBALS['urlRegex'], $str)) {
        throw new Exception("Xác minh thất bại", 422);
    }
}

// Xử lý các Exception
function handleException($input)
{
    try {
        validate($input);
    } catch (\Exception $e) {
        echo "Input: $input" . "\n";
        echo $e->getMessage() . "\n";
        echo $e->getCode() . "\n";
    } finally {
        echo "\n";
    }
}

handleException("ddquangbao@gmail.com.");
handleException("https://google.com");
handleException("htt:google.com");
handleException(1);
handleException("");
