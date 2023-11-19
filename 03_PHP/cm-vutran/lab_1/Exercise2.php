<?php
function correctSpacing($sentence) {
    $words = explode(' ', $sentence);
    $cleanedWords = array_filter($words, 'strlen');
    $output = implode(' ', $cleanedWords);
    return $output;
}

echo correctSpacing("The film    starts  at midnight.   ");