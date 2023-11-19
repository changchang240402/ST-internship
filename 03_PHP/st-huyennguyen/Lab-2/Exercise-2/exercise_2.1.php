<?php
function createFile($name, $description)
{
    $myProfile = fopen(__DIR__ . "/myprofile.txt", "w");
    fwrite($myProfile, $name);
    fwrite($myProfile, $description);
    fclose($myProfile);
}

$name = "My fullname is Nguyen Thi Cam Huyen\n";
$description = "I'm 22 years old. I like reading, drawing and crocheting.\n";
createFile($name, $description);
