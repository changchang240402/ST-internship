<?php 
// Question 6: How to check if an Array is a subnet of another Array?
$array = array('jan', 'feb', 'march', 'april', 'may');
$another_array = array('jan', 'may');
function isSubArray($array, $another_array) {
    $intersection = array_intersect($another_array, $array);
    if(count($intersection) === count($another_array)){
        return true;
    }
}
echo isSubArray($array,$another_array) . "\n";
?>
