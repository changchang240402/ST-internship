<?php

$profileContent = "Tên: Cao Hữu Phúc\n";
$profileContent .= "Giới thiệu bản thân: Xin chào, tôi là Cao Hữu Phúc và tôi rất thích lập trình.\n";

// Mở tệp để ghi
$myfile = fopen("myprofile.txt", "w") or die("Unable to open file!");

// Ghi nội dung vào tệp
fwrite($myfile, $profileContent);
    
// Đóng tệp sau khi ghi
fclose($myfile);
