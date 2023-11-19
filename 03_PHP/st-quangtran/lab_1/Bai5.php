<?php 
// Question 5: Repeat letter
function doubleChar($str) {
    $newString = "";
    for($i = 0; $i < strlen($str); $i++) {
        $newString .= $str[$i] . $str[$i];
    }
    return $newString;
}
echo doubleChar("String") . "\n"; 
echo doubleChar("Hello World!") . "\n"; 
echo doubleChar("1234!_ ") . "\n";
?>
