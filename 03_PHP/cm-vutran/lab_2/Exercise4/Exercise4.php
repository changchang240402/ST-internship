<?php
function checkStringFormat($input)
{
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return "Email";
    }

    if (filter_var($input, FILTER_VALIDATE_URL)) {
        return "URL";
    }

    if (empty($input)) {
        throw new Exception("Biến empty", 400);
    }

    if (!is_string($input)) {
        throw new Exception("Biến không phải kiểu string", 500);
    }

    throw new Exception("Còn lại", 422);
}

function checkString($input)
{
    try {
        echo checkStringFormat($input)."\n";
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage() . " " . $e->getCode()."\n";
    }
}

checkString('https://stackoverflow.com/');
checkString('tranthanhvu7939@gmail.com');
checkString(2);
checkString(0);
