<?php 
// Question 1: PHP using recursive function print 1 -> 10
function recursiveFactorial($n) {
    if($n == 1) {
        return 1;
    }
    return($n * recursiveFactorial($n - 1));
}
echo recursiveFactorial(4);
?>
