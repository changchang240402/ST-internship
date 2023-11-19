<?php
function checkSubArray($array, $anotherArray) {
    $result = array_intersect($array, $anotherArray);
    return count($anotherArray) === count($result);
}
$array = array('jan', 'feb', 'march', 'april', 'may');
$anotherArray = array('jan', 'may',);
echo checkSubArray($array, $anotherArray) ? 'True' : 'False';