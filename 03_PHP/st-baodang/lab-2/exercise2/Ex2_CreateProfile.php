<?php
// Tạo file myprofile.txt lưu các thông tin: Name, Info
function createProfileFile($name, $info)
{
    $file = __DIR__ . "/myprofile.txt";
    if (file_exists($file)) {
        unlink($file);
    }
    $resource = fopen($file, 'x');
    fwrite($resource, "$name\n");
    fwrite($resource, "$info\n");
    fclose($resource);
}

createProfileFile("Quang Bảo", "Dancing on the Moon");
