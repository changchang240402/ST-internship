<?php
function writeFile($fileName)
{
    $content = 'Hello, I am Tran Duy Quang. I am programmer.';
    $file = fopen($fileName, 'w');
    fwrite($file, $content);
    fclose($file);
}
$fileName = 'myprofile.txt';
writeFile($fileName);
