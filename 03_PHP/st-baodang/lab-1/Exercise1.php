<?php
// PHP using recursive function
function recursive($num)
{

    $num += 1;
    if ($num < 10) {
        echo "$num ";
        recursive($num);
    }
    $num -= 1;
}

recursive(0);
