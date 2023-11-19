<?php 
$myfile = fopen("../be-intern-2023-labs/03_PHP/st-trangdao/lab_2/question 2/myprofile.txt", "w") or die("Unable to open file!");
$txt = "Trang\n";
fwrite($myfile, $txt);
$txt = "Tôi 22 tuổi và đến từ Ninh Bình\n";
fwrite($myfile, $txt);
fclose($myfile);
