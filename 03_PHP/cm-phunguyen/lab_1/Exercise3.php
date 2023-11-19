<?php
function getFirstValue($array)
{
    return array_shift($array);
}
echo getFirstValue([]);
