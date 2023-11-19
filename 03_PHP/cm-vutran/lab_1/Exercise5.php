<?php
function doubleChar($str){
    $arr = str_split($str);
    foreach($arr as &$value){
        $value = $value.$value;
    }
    return implode($arr);
}
echo doubleChar('String!_ ');
