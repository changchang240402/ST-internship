<?php
function checkString(string $b)
{
    if (empty($b)) {
        throw new Exception("Biến truyền vào là rỗng ", 400);
    }
    if (!is_string($b)) {
        throw new Exception("Biến truyền vào không phải kiểu string", 500);
    }

    if (filter_var($b, FILTER_VALIDATE_EMAIL) !== $b && filter_var($b, FILTER_VALIDATE_URL) !== $b) {
        throw new Exception("Biến truyền vào không xác thực", 442);
    }
}
try {
    checkString("thuytrangdao240402@gmail..com");
} catch (\Exception $e) {
    echo $e->getCode();
    echo "\n";
    echo $e->getMessage();
    echo "\n";
}
try {
    checkString("http:home.com");
} catch (\Exception $e) {
    echo $e->getCode();
    echo "\n";
    echo $e->getMessage();
    echo "\n";
}
try {
    checkString("thuytrangdao240402@gmail.com");
} catch (\Exception $e) {
    echo $e->getCode();
    echo "\n";
    echo $e->getMessage();
    echo "\n";
}