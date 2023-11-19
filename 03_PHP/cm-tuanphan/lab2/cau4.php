<?php

function checkFormatCorrection($input){
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return "Valid email";
    }

    if (filter_var($input, FILTER_VALIDATE_URL)) {
        return "Valid URL";
    }

    if (empty($input)) {
        throw new Exception("Biến empty", 400);
    }

    if (!is_string($input)) {
        throw new Exception("Biến không phải kiểu string", 500);
    }

    throw new Exception("Còn lại", 422);
}

try {
    checkFormatCorrection("Test");
} catch (Exception $e) {
    echo "Exception caught: " . $e->getMessage() . " (Code: " . $e->getCode() . ")";
}
?>

