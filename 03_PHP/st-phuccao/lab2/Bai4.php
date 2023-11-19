<?php
function isNullOrEmpty($input)
{
    return empty($input);
}

function isNotString($input)
{
    return !is_string($input);
}

function isValidEmail($input)
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function isValidURL($input)
{
    return filter_var($input, FILTER_VALIDATE_URL);
}

function checkString($input)
{
    if (isNullOrEmpty($input)) {
        throw new Exception("Biến empty", 400);
    }

    if (isNotString($input)) {
        throw new Exception("Biến không phải kiểu string", 500);
    }

    if (isValidEmail($input)) {
        return "Đây là một địa chỉ Email hợp lệ.";
    }

    if (isValidURL($input)) {
        return "Đây là một URL hợp lệ.";
    }

    throw new Exception("Còn lại", 422);
}


try {
    $input = " "; 
    $result = checkString($input);
    echo $result;
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage() . " - Mã lỗi: " . $e->getCode();
}
