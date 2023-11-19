<?php

//Method 1: Using array_diff()
$list = ["jan", "feb", "march", "april", "may"];
$delete_item = "april";
function removeItem1($list,$delete_item)
{
    return array_diff($list, [$delete_item]);
}

//Method 2: Using array_search()
function removeItem2($list,$delete_item)
{
    while ($key = array_search($delete_item, $list)) {
        unset($list[$key]);
    }
    return $list;
}

//Method 3 :
function removeItem3($list,$delete_item)
{
    foreach ($list as $key => $value) {
        if ($value == $delete_item) {
            unset($list[$key]);
        }
    }
    return $list;
}

