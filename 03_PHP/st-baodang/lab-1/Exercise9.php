<?php
// Sử dụng IF ELSE để check 1 biến khác null
function checkNull($variable)
{
    if (is_null($variable)) {
        echo "Biến truyền vào NULL";
    } else {
        echo "Biến truyền vào khác NULL";
    }
}
