<?php 
// Question 2: Fix the Spacing
function correctSpacing($string) {
    $words = explode(' ', $string);
    $filteredWords = array_filter($words, 'strlen');
    $result = implode(' ', $filteredWords);
    return $result;
}
echo correctSpacing("The film   starts       at      midnight. ") . "\n";
echo correctSpacing("The     waves were crashing  on the     shore.   ") . "\n";
echo correctSpacing(" Always look on    the bright   side of  life.") . "\n";
?>
