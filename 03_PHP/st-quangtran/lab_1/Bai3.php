<?php 
// Question 3: Return the First Element in an Array?
function getFirstValue($array) {
    return array_shift($array);
}
echo getFirstValue([1, 0, 50]) . "\n";
echo getFirstValue([80, 5, 100]) . "\n";
echo getFirstValue([-500, 0, 50]) . "\n";
echo getFirstValue([]);
?>
