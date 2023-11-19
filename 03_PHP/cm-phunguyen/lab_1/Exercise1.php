<?php
function recursive($s)
{
    if ($s < 0)
        return -1;
    if ($s == 0)
        return 1;
    else
        return (recursive($s - 1) * $s);
}
