<?php
function validateString($input)
{
    if (!$input) {
        throw new Exception('Biến truyền vào rỗng', 400);
    }

    if (!is_string($input)) {
        throw new Exception('Biến truyền vào không phải kiểu String', 500);
    }

    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return 'Email';
    }
    if (filter_var($input, FILTER_VALIDATE_URL)) {
        return 'URL';
    }
    throw new Exception('Error Other', 422);
}

function Input($input)
{
    try {
        $result = validateString($input);
        echo "Result is: $result";
    } catch (Exception $e) {
        $message = $e->getMessage();
        $code = $e->getCode();
        echo "Error: $message, Code Error: $code";
    }
}
$input = "http://www.geeksforgeeks.org";
$input = "duyquang@gmail.com";
$input = "aaaaaaaaaa";
Input($input);
