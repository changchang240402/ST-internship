<?php
$myfile = fopen("myprofile.txt", "w") or die("Unable to open file!");

$name = "Trần Thanh Vũ\n";
$description = "Backend intern, student at university of education";

fwrite($myfile, $name);
fwrite($myfile, $description);
fclose($myfile);
